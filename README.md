## Support tickets system package for Laravel v0.2.0
A simple helpdesk tickets system for Laravel 5.1 which integrates smoothly with Laravel default users and auth system. 
It will integrate into your current Laravel project within minutes, and you can offer your customers and your team a nice support ticket system. 

### Features:
1. Three main users roles users, agents, and admins
2. Users can create tickets, keep track of their tickets status, giving comments, and even close their own tickets (configurable)
3. Auto assigning to agents, the system searches for agents in specific department and auto select the agent with lowest queue
4. Simple admin panel 
5. Localization
6. Very simple installation and integration process

[Full features list (12+)](wiki/v0.1.0-features)
[New features introduced in v0.2.0](wiki/v0.2.0-dev-features-introduced)

## Installation
**First Make sure you have got all dependents working:**

1. [Laravel 5.1](http://laravel.com/docs/5.1#installation)
2. [Users table](http://laravel.com/docs/5.1/authentication)
3. [Laravel email configuration](http://laravel.com/docs/5.1/mail#sending-mail)

** Dependents that are getting installed and configured automatically by Ticketit (no action required from you)**
1. [LaravelCollective HTML](/laravelcollective/html)
2. [Laravel Datatables](/yajra/laravel-datatables)

**Installation:**

Run this code via your terminal
```shell
	composer require kordy/ticketit:0.*
```

After install it, you have to add this line on your `config/app.php` on Service Providers lines.
```php
	Kordy\Ticketit\TicketitServiceProvider::class,
```

Go ahead to http://your-project-url/tickets-install to finalize the installation


## Configuration
[Initial configurations and settings](https://github.com/thekordy/ticketit/wiki/Ticketit-initial-configuration)

### Documentation
[Ticketit Wiki](https://github.com/thekordy/ticketit/wiki)

### Support:
[Review features requests, give your feedback, suggest features, report issues](https://github.com/thekordy/ticketit/issues)

### Live Demo
A live demo is hosted by fusion design at http://ticketit.fusiondesign.me

### Screenshots
[Screenshots of current features](https://github.com/thekordy/ticketit/issues/3)
