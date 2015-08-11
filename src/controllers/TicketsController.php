<?php
namespace Kordy\Ticketit\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Kordy\Ticketit\Models;

class TicketsController extends Controller {

    public function __construct()
    {
        $this->middleware('Kordy\Ticketit\Middleware\IsAgentMiddleware', ['only' => ['edit']]);
    }

    /**
     * Display a listing of tickets related to user.
     *
     * @return Response
     */
    public function index()
    {
        if(Models\Agent::isAdmin()) {
            $tickets = Models\Ticket::orderBy('updated_at', 'desc')->get();
        }
        elseif (Models\Agent::isAgent()) {
            $agent = Models\Agent::find(\Auth::user()->id);
            $tickets = $agent->agentTickets()->orderBy('updated_at', 'desc')->get();
        }
        else {
            $user = Models\Agent::find(\Auth::user()->id);
            $tickets = $user->userTickets()->orderBy('updated_at', 'desc')->get();
        }
        return view('Ticketit::index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $priorities = Models\Priority::lists('name', 'id');
        $categories = Models\Category::lists('name', 'id');
        return view('Ticketit::tickets.create', compact('priorities', 'categories'));
    }

    /**
     * Store a newly created ticket and auto assign an agent for it
     *
     * @param  Request  $request
     * @return Response redirect to index
     */
    public function store(Request $request)
    {
        $ticket = new Models\Ticket;
        $ticket->subject = $request->input('subject');
        $ticket->content = $request->input('content');
        $ticket->priority_id = $request->input('priority_id');
        $ticket->category_id = $request->input('category_id');
        $ticket->status_id = config('ticketit.default_status_id');
        $ticket->user_id = \Auth::user()->id;
        $ticket->agent_id = $this->chooseAgent($request->input('category_id'));

        $ticket->save();

        Session::flash('status', "The ticket has been created!");

        return redirect()->action('\Kordy\Ticketit\Controllers\TicketsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $ticket = Models\Ticket::find($id);
        $status_lists = Models\Status::lists('name', 'id');
        $priority_lists = Models\Priority::lists('name', 'id');
        $category_lists = Models\Category::lists('name', 'id');
        $agent_lists = array_merge(['auto' => 'Auto Select'], Models\Agent::agentsList($ticket->category_id)->toArray());
        return view('Ticketit::tickets.show',
            compact('ticket', 'status_lists', 'priority_lists', 'category_lists', 'agent_lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get the agent with the lowest tickets assigned in specific category
     * @param integer $cat_id
     * @return integer $selected_agent_id
     */
    public function chooseAgent($cat_id)
    {
        $cat_id = strval($cat_id);
        $agents = Models\Agent::all();
        $count = 0;
        $lowest_tickets = 1000000;
        foreach ($agents as $agent) {
            if ($count == 0) {
                $lowest_tickets = $agent->agentTickets->where('category_id', $cat_id)->count();
                $selected_agent_id = $agent->id;
            }
            else {
                $tickets_count = $agent->agentTickets->where('category_id', $cat_id)->count();
                if ($tickets_count < $lowest_tickets) {
                    $lowest_tickets = $tickets_count;
                    $selected_agent_id = $agent->id;
                }
            }
            $count++;
        }
        return $selected_agent_id;
    }
}

