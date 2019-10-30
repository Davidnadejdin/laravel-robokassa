<?php

namespace Davidnadejdin\LaravelRobokassa;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RobokassaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/robokassa.php',
            'comments'
        );

        App::bind('laravelrobokassa', static function () {
            return new LaravelRobokassaClass();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/robokassa.php' => config_path('robokassa.php'),
        ], 'config');
    }
}
