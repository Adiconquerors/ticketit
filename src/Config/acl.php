<?php

$policies = [
    'user'          => 'Kordy\Ticketit\Policies\TicketPolicies@isUser',
    'owner'         => 'Kordy\Ticketit\Policies\TicketPolicies@isOwner',
    'agent'         => 'Kordy\Ticketit\Policies\TicketPolicies@isAgent',
    'assigned'      => 'Kordy\Ticketit\Policies\TicketPolicies@isAssigned',
    'assigned_team' => 'Kordy\Ticketit\Policies\TicketPolicies@isAssignedTeam',
    'category_team' => 'Kordy\Ticketit\Policies\TicketPolicies@isCategoryTeam',
    'administrator' => 'Kordy\Ticketit\Policies\TicketPolicies@isAdministrator',
];

return [

    /*
    |--------------------------------------------------------------------------
    | Abilities and permissions
    |--------------------------------------------------------------------------
    |
    | These permissions are effective if 'auzo-tools' handler is enabled in
    | 'config/core.php' in ACL handler option.
    |
    | Note: Administrators have access to all resources, so they bypass all
    | authorization checks.
    |
    | For each ability, choose from restriction policies functions:
    |
    | user: any authenticated user
    | owner: the user who created the ticket
    | agent: any agent
    | assigned: the agent who is assigned to the ticket
    | assignedTeam: agents who are in the same category as the assigned agent
    | categoryTeam: agents who are assigned to specific category (cat id must
    |                be available in the request)
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Before policies
    |--------------------------------------------------------------------------
    |
    | This check is done before any other, use it to bypass administrators from
    | any authorization checking.
    |
    */

    'before' => [
        $policies['administrator'],
    ],

    'abilities' => [

        /*
        |--------------------------------------------------------------------------
        | Own Tickets index
        |--------------------------------------------------------------------------
        |
        | For the current logged in user to get a list of tickets created to him
        | (by ticket user_id field)
        |
        */

        'ticketit.index.own.all' => [
            $policies['user'],
        ],

        'ticketit.index.own.open' => [
            $policies['user'],
        ],

        'ticketit.index.own.closed' => [
            $policies['user'],
        ],

        /*
        |--------------------------------------------------------------------------
        | Category Tickets index
        |--------------------------------------------------------------------------
        |
        | Get all tickets for specific category
        | (by ticket category_id field)
        |
        | Only $policies['user'], $policies['agent'] and $policies['categoryTeam']
        | are applicable.
        |
        */

        'ticketit.index.category.all' => [
            $policies['category_team'],
        ],

        'ticketit.index.category.open' => [
            $policies['category_team'],
        ],

        'ticketit.index.category.closed' => [
            $policies['category_team'],
        ],
    ],
];
