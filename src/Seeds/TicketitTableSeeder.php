<?php
namespace Kordy\Ticketit\Seeds;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TicketitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $email_domain = '@example.com';

        // create agents
        for ($x = 1; $x <= 3; $x++) {
            $user_info = $this->randomUser();
            $user_email = 'agent'.$x.$email_domain;
            $user = new \App\User();
            $user->name = ucfirst($user_info['first']).' '.ucfirst($user_info['last']);
            $user->email = $user_email;
            $user->ticketit_agent = 1;
            $user->password = Hash::make('123321');
            $user->save();
        }

        $statuses = [
            'Pending' => '#e69900',
            'Solved' => '#15a000',
            'Bug' => '#f40700'
        ];

        // create tickets statuses
        foreach ($statuses as $name => $color) {
            $status = \Kordy\Ticketit\Models\Status::create([
                'name' => $name,
                'color' => $color
            ]);
        }

        $categories = [
            'Technical' => '#0014f4',
            'Billing' => '#2b9900',
            'Customer Services' => '#7e0099'
        ];

        $agents = \Kordy\Ticketit\Models\Agent::agentsLists();
        $counter = 0;
        // create tickets statuses
        foreach ($categories as $name => $color) {
            $category = \Kordy\Ticketit\Models\Category::create([
                'name' => $name,
                'color' => $color
            ]);
            $agent = array_slice($agents, $counter, 1, true);
            $category->agents()->attach(key($agent));
            $counter++;
        }

        $priorities = [
            'Low' => '#069900',
            'Normal' => '#e1d200',
            'Critical' => '#e10000'
        ];

        // create tickets statuses
        foreach ($priorities as $name => $color) {
            $priority = \Kordy\Ticketit\Models\Priority::create([
                'name' => $name,
                'color' => $color
            ]);
        }

        // create users
        for ($u = 1; $u <= 10; $u++) {
            $user_info = $this->randomUser();
            $user_email = 'user'.$u.$email_domain;
            $user = new \App\User();
            $user->name = ucfirst($user_info['first']).' '.ucfirst($user_info['last']);
            $user->email = $user_email;
            $user->password = Hash::make('123321');
            $user->save();

            for ($t = 0; $t <= 10; $t++) {

                $random_title_content = file_get_contents('http://loripsum.net/api/1/short/plaintext');
                $random_title_length = rand(-10, -50);
                $random_title = substr($random_title_content, $random_title_length);

                $random_content = file_get_contents('http://loripsum.net/api');

                $rand_category = rand(1, 3);
                $category = \Kordy\Ticketit\Models\Category::find($rand_category);
                $agent = $category->agents()->first();

                $rand_status = rand(1, 3);

                $ticket = new \Kordy\Ticketit\Models\Ticket();
                $ticket->subject = $random_title;
                $ticket->content = $random_content;
                $ticket->status_id = $rand_status;
                $ticket->priority_id = rand(1, 3);
                $ticket->user_id = $user->id;
                $ticket->agent_id = $agent->id;
                $ticket->category_id = $rand_category;
                $random_create = rand(1,90);
                $ticket->created_at = \Carbon\Carbon::now()->subDays($random_create);
                if($rand_status == 2) {
                    $random_complete = rand(1,7);
                    $created_date = new Carbon($ticket->created_at);
                    $ticket->completed_at = $created_date->addDays($random_complete);
                }
                $ticket->save();
            }
        }

    }

    /**
     * @return string
     */
    public function randomUser()
    {
        $random_content_json = file_get_contents('https://randomuser.me/api/');
        $random_content_djson = json_decode($random_content_json);
        $user['first'] = $random_content_djson->results[0]->user->name->first;
        $user['last'] = $random_content_djson->results[0]->user->name->last;
        $user['email'] = $random_content_djson->results[0]->user->email;
        return $user;
    }
}
