<?php

namespace App\Providers;

use App\Http\Repositories\Eloquent\Events\EventRepository;
use App\Http\Repositories\Policies\EventCreateInterface;
use App\Http\Repositories\Policies\EventFetchInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EventCreateInterface::class, EventRepository::class);
        $this->app->bind(EventFetchInterface::class, EventRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
