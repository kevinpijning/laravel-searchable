#Searchable Laravel (5.*)
This package let you easily search through models by a Searchable trait. 

# Setup

## Composer
Pull this package in through Composer

```
{
    "require": {
        "kevinpijning/laravel-searchable": "dev-master"
    }
}
```

```$ composer update```

Add the package to your application service providers in config/app.php

```
'providers' => [

    App\Providers\RouteServiceProvider::class,

    /*
     * Third Party Service Providers...
     */
     KevinPijning\LaravelSearchable\LaravelSearchableServiceProvider::class,
],
```

Publish views

Publish the view:
```
php artisan vendor:publish
```


# Usage
Use Searchable trait inside your Eloquent model(s). Define $searchable array (see example code below). 
```
use KevinPijning\LaravelSearchable\Searchable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract 
{
	use Authenticatable, CanResetPassword, Searchable;
	...

	public $searchable = ['id',
	                    'name',
	                    'email',
	                    'created_at',
	                    'updated_at'];
	                    
	...
}
```

Searchable trait adds Searchable scope to the models so you can use it with paginate.

# Blade extension
There is one blade extension for you to use @searchableform

`@searchableform`

This will include a search bar to your page.

# Full example
## Routes
```
Route::get('users', ['as' => 'users.index', 'uses' => 'HomeController@index']);
```
## Controller
```
use App\User;

public function index()
{
    $users = User::searchable()->paginate(10);
    
    return view('user.index')->withUsers($users);
}
```

## View
Pagination included

```
@searchableform

@foreach($users as $user)
	{{ $user->name }}
@endforeach

{!! $users->appends(\Request::except('page'))->render() !!}

```