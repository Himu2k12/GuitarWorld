<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gateContract)
    {
        $this->registerPolicies($gateContract);

        $gateContract->define('isAdmin', function ($user){
            return $user->role == 'admin';

        });
        $gateContract->define('isBrand', function ($user){
            return $user->role == 'brand';

        });
        $gateContract->define('isDealer', function ($user){
            return $user->role == 'dealer';

        });
        $gateContract->define('isCustomer', function ($user){
            return $user->role == 'customer';

        });
        $gateContract->define('isArtist', function ($user){
            return $user->role == 'artist';

        });
        //
    }
}
