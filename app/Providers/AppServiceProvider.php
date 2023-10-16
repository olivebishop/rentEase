<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // Import Gate
use App\Policies\TenantPolicy;
use App\Models\Tenant;

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
        // This line defines policies for the actions 'makePayment' and 'viewRooms'
        Gate::define('makePayment', [TenantPolicy::class, 'makePayment']);
        Gate::define('viewRooms', [TenantPolicy::class, 'viewRooms']);
    }
}
