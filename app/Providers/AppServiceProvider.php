<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// use App\Models\Service;
// use App\Models\Vehicle;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $services = Service::all();
        // $vehicles = Vehicle::all();

        // View::share('services', $services);
        // View::share('vehicles', $vehicles);
    }
}
