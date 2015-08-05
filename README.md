## Laravel Ticketit Package
A simple helpdesk tickets system for Laravel 5.1 which integrats smoothly with Laravel default users and auth system

## Notice:
**The package still in development and not ready yet.**

## Current fetures:
1. Ticket front end
2. Backend dashboard
2. Ticket custom statuses
3. Ticket custom priorities
4. Ticket custom categories
5. Assign Agents to categories
5. Auto agent assignement to new tickets (Search the ticket category agents and choose the agent with the lowest assigned tickets)
6. Ticket comments
7. Set the master view in ticketit config file, and the tickets system will integrate with it.
8. Views are using the bootstrap

## To Do:
1. Authorization for users, agents, administrators
2. Agents dashboard
3. Users email notifications

### Installation Guide
**First Make sure you have got all dependents working:**

1. Laravel 5.1
2. Users table
3. Auth
4. LaravelCollective HTML

**To install this package:**

Run this code via your terminal
```shell
	composer require kordy/ticketit dev-master
```

After install it, you have to add this line on your `config/app.php` on Service Providers lines.
```php
	Kordy\Ticketit\TicketitServiceProvider::class
```

Install database tables by running the migrate artisan command 
```php
	php artisan migrate --path=vendor/kordy/ticketit/src/migrations
```

### Configuration
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

## Screenshots
Views integrated in the master view
![ticketit-main](https://cloud.githubusercontent.com/assets/11343048/9098039/ab3fea18-3bc7-11e5-87e5-5655e8b86f9c.png)

My Tickets main user screen
![ticketit-main2](https://cloud.githubusercontent.com/assets/11343048/9098040/ab5705ea-3bc7-11e5-86fd-094572c946cd.png)

Ticket screen with comments (new comments update the ticket)
![ticketit-show](https://cloud.githubusercontent.com/assets/11343048/9098041/ab5c6abc-3bc7-11e5-9808-ba6511fbb259.png)

Admin and assign agents to categories
![ticketit-admin-agents](https://cloud.githubusercontent.com/assets/11343048/9098034/ab354ebe-3bc7-11e5-99d6-31b39228861b.png)

Admin custom categories
![ticketit-admin-category](https://cloud.githubusercontent.com/assets/11343048/9098035/ab37628a-3bc7-11e5-9185-9ced8a47d73e.png)

Admin custom priorities
![ticketit-admin-priority](https://cloud.githubusercontent.com/assets/11343048/9098036/ab3b6b00-3bc7-11e5-8d3e-35c43507b8a2.png)

Create custom status (same in creating custom categories and priorities)
![ticketit-admin-status-create](https://cloud.githubusercontent.com/assets/11343048/9098037/ab3e6db4-3bc7-11e5-9c60-1c9204dff69f.png)

Admin custom statuses
![ticketit-admin-status](https://cloud.githubusercontent.com/assets/11343048/9098038/ab3fd898-3bc7-11e5-958c-fb5c21505cc2.png)
