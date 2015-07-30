<?php
namespace Kordy\Ticketit\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kordy\Ticketit\Models\Status;

class StatusesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('Ticketit::admin.status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Ticketit::admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $status = new Status;
        $status->create(['name' => $request->name, 'color' => $request->color]);

        Session::flash('status', "The status $request->name has been created!");

        return redirect()->action('\Kordy\Ticketit\Controllers\StatusesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return "All status related tickets here";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('Ticketit::admin.status.edit', compact('status'));
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
        $status = Status::findOrFail($id);
        $status->update(['name' => $request->name, 'color' => $request->color]);

        Session::flash('status', "The status $request->name has been modified!");

        return redirect()->action('\Kordy\Ticketit\Controllers\StatusesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $name = $status->name;
        $status->delete();

        Session::flash('status', "The status $name has been modified!");

        return redirect()->action('\Kordy\Ticketit\Controllers\StatusesController@index');
    }
}