<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach( config('global.permissions') as $privilege => $value) {
			//Gate a laravel class
			//we define the privilege name through gate
			//here we compare the given url permission with the admin permissions
			//if false denied
			//we use can:nameofpermission as a middleware in routes to use those permissions
			Gate::define($privilege , function(Admin $auth) use ($privilege) {
				return $auth->hasPrivilege($privilege);
			});
		}
    }
}
