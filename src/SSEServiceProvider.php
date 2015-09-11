<?php

namespace MAnfal\sse;

use Illuminate\Support\ServiceProvider;

class SSEServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['SSE'] = $this->app->share(function($app)
        {
            return SSE::class;
        });
    }
}
