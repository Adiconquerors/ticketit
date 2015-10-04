## Support tickets system package for Laravel
A simple helpdesk tickets system for Laravel 5.1 which integrates smoothly with Laravel default users and auth system. 
It will integrate into your current Laravel project within minutes, and you can offer your customers and your team a nice support ticket system. 

### Features:
1. Three main users roles users, agents, and admins
2. Users can create tickets, keep track of their tickets status, giving comments, and even close their own tickets (configurable)
3. Auto assigning to agents, the system searches for agents in specific department and auto select the agent with lowest queue
4. Simple admin panel 
5. Localization

[Full features list (12+)](https://github.com/thekordy/ticketit/wiki/v0.1.0-features)

### Support:
[Review features requests, give your feedback, suggest features, report issues](https://github.com/thekordy/ticketit/issues)

## Installation
**First Make sure you have got all dependents working:**

1. [Laravel 5.1](http://laravel.com/docs/5.1#installation)
2. [Users table](http://laravel.com/docs/5.1/authentication)
3. [LaravelCollective HTML](http://laravelcollective.com/docs/5.1/html#installation)
4. [Laravel email configuration](http://laravel.com/docs/5.1/mail#sending-mail)

**To install this package:**

Run this code via your terminal
```shell
	composer require kordy/ticketit
```

After install it, you have to add this line on your `config/app.php` on Service Providers lines.
```php
	Kordy\Ticketit\TicketitServiceProvider::class,
```

Install database tables by running the migrate artisan command 
```php
	php artisan migrate --path=vendor/kordy/ticketit/src/Migrations
```

## Configuration
[Initial configurations and settings](https://github.com/thekordy/ticketit/wiki/Ticketit-initial-configuration)

### Documentation
[Ticketit Wiki](https://github.com/thekordy/ticketit/wiki)

### Live Demo
A live demo is hosted by fusion design at http://ticketit.fusiondesign.me

### Screenshots
[Screenshots of current features](https://github.com/thekordy/ticketit/issues/3)
