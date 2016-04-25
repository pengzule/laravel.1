<?php

namespace App\Providers;



use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('update-cart_item', function ($user, $cart_item) {
            return $user->id === $cart_item->member_id;
        });
	$gate->define('update-comment', function ($user, $comment) {
	   
            return ($user->email === $comment->user)&&(0 === $comment->is_active);
        });
	
    }
}
