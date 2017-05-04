<?php

namespace KevinPijning\LaravelSearchable;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelSearchableServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $root = __DIR__.'/../';
        // Load views
        $this->loadViewsFrom($root . 'resources/views', 'kevinpijning');
        // Publish views
        $this->publishes([
            $root . 'resources/views' => base_path('resources/views/vendor/kevinpijning'),
        ]);


        Blade::directive('searchableform', function(){
            return "<?php echo view('kevinpijning::form')->render() ?>";
        });

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
