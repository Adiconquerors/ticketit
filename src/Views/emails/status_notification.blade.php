{!! trans('ticketit::email/status_notification.data', [
    'name'        =>  $notification_owner->name,
    'subject'     =>  $ticket->subject,
    'old_status'  =>  $original_ticket->status->name,
    'new_status'  =>  $ticket->status->name
]) !!}

{!! link_to_route(config('ticketit.main_route').'.show', $ticket->subject, $ticket->id) !!}