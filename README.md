## Support tickets system package for Laravel
A simple helpdesk tickets system for Laravel 5.1 which integrats smoothly with Laravel default users and auth system

### Current status:
A simple support tickets system as a laravel package with three main users roles users, agents, and admins.
Laravel users can create tickets (in which ticket will be auto assigned to an agent) and keep track of their tickets status.

Agents can view and modify their own assigned tickets and communicate with ticket issuers throught ticket comments.

Also very simple configurations where administrators can add agents, create custom statuses, categories/departments, priorities, and manage tickets and comments.


### To Do:
1. Forms validation
2. Tickets filters and search
3. Dashboard stats and graphs
3. Users email notifications

## Installation
**First Make sure you have got all dependents working:**

1. [Laravel 5.1](http://laravel.com/docs/5.1#installation)
2. [Users table](http://laravel.com/docs/5.1/authentication)
3. [LaravelCollective HTML](http://laravelcollective.com/docs/5.1/html#installation)

**To install this package:**

Run this code via your terminal
```shell
	composer require kordy/ticketit:0.0.*
```

After install it, you have to add this line on your `config/app.php` on Service Providers lines.
```php
	Kordy\Ticketit\TicketitServiceProvider::class
```

Install database tables by running the migrate artisan command 
```php
	php artisan migrate --path=vendor/kordy/ticketit/src/migrations
```

## Configuration
**You may publish all files at once**

```shell
	php artisan vendor:publish --provider="Kordy\Ticketit\TicketitServiceProvider"
```

**Or you may publish by tags**

Publish the config file (It will generate new file at `config/ticketit.php`. Edit necessary lines.)
```shell
	php artisan vendor:publish --provider="Kordy\Ticketit\TicketitServiceProvider" --tag="config"
```
Publish the views (It will generate views files at `resources/views/vendor/kordy/ticketit/`. Edit necessary lines.)
```shell
	php artisan vendor:publish --provider="Kordy\Ticketit\TicketitServiceProvider" --tag="views"
```

**After publishing the config file config/ticketit.php , edit it for your settings.**

**Be sure to implement these views sections in your master template in order to integrate with the ticketit views:**

Page section for passing the current page title
```blade
<header> ...
<title>My website - @yield('page')</title>
</header>
```
Content section for the content
```blade
<body> ...
@yield('content')
...
</body>
```

Footer section for passing the jquery scripts, so make sure it is called after you call the jquery
```blade
<body> ...
@yield('content')
...
<script src="/js/jquery.min.js"></script>
..
@yield('footer')
</body>
```

### Screenshots
[Screenshots of current features](https://github.com/thekordy/ticketit/issues/3)
