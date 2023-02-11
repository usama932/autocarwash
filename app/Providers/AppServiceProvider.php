<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Reward;
use App\Models\Review;


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
        $services = Service::all();
        $vehicles = Vehicle::all();
        $review = Review::where('is_feature','yes')->get();
        

        View::share('services', $services);
        View::share('vehicles', $vehicles);
        View::share('review' , $review );
    }
}
