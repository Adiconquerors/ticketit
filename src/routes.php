<?php
//Ticket public route
Route::resource(config('ticketit.main_route'), 'Kordy\Ticketit\Controllers\TicketsController');

//Ticket Comments public route
Route::resource(config('ticketit.main_route').'-comment', 'Kordy\Ticketit\Controllers\CommentsController');

//Ticket admin index route (ex. http://url/tickets-admin/)
Route::get(config('ticketit.admin_route'), 'Kordy\Ticketit\Controllers\AdminController@index');

//Ticket statuses admin routes (ex. http://url/tickets-admin/status)
Route::resource(config('ticketit.admin_route').'/status', 'Kordy\Ticketit\Controllers\StatusesController');

//Ticket priorities admin routes (ex. http://url/tickets-admin/priority)
Route::resource(config('ticketit.admin_route').'/priority', 'Kordy\Ticketit\Controllers\PrioritiesController');

//Agents management routes (ex. http://url/tickets-admin/agent)
Route::resource(config('ticketit.admin_route').'/agent', 'Kordy\Ticketit\Controllers\AgentsController');

//Agents management routes (ex. http://url/tickets-admin/agent)
Route::resource(config('ticketit.admin_route').'/category', 'Kordy\Ticketit\Controllers\CategoriesController');