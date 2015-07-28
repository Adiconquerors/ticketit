## Laravel Ticketit Package
A simple helpdesk support tickets system for Laravel 5.1

### Installation Guide
**First Make sure you have got all dependents working:**
1. Laravel 5.1
2. Users table
3. Auth
4. LaravelCollective HTML

**To install this package:**
1. you can run this code via your terminal
```shell
	composer require kordy/ticket dev-master
```

2. After install it, you have to add this line on your `config/app.php` on Service Providers lines.
```php
	Kordy\Ticketit\TicketitServiceProvider::class
```

3. Install database tables by running the migrate artisan command 
```php
	php artisan migrate --path=vendor/kordy/ticketit/src/migrations
```

### Configuration
**You may publish all files at once**
```shell
	php artisan vendor:publish --provider="Kordy\Ticketit\TicketitServiceProvider"
```

**Or you may publish by tags**
1. Publish the config file (It will generate new file at `config/ticketit.php`. Edit necessary lines.)
```shell
	php artisan vendor:publish --provider="Kordy\Ticketit\TicketitServiceProvider" --tag="config"
```
2. Publish the views (It will generate views files at `resources/views/vendor/kordy/ticketit/`. Edit necessary lines.)
```shell
	php artisan vendor:publish --provider="Kordy\Ticketit\TicketitServiceProvider" --tag="views"
```
**Be sure to offer the views sections to integrate with the ticketit views:**
1. Page section for passing the current page title
```blade
<header> ...
<title>My website - @yield('page')</title>
</header>
```
2. Content section for the content
```blade
<body> ...
@yield('content')
...
</body>
```

3. Footer section for passing the jquery scripts, so make sure it is called after you call the jquery
```blade
<body> ...
@yield('content')
...
<script src="/js/jquery.min.js"></script>
..
@yield('footer')
</body>
```
