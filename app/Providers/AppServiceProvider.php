<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Traits\Constants;
use Illuminate\Foundation\Console\ModelMakeCommand;

class AppServiceProvider extends ServiceProvider
{

    use Constants;
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
        Schema::defaultStringLength(191);

        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });

        \DB::connection()->getPdo();
        view()->composer('*',function($view){

            $view->with([
                'logo_img' => route('homepage').env('ASSET_URL').'/logo.png',
                'favicon_img' => route('homepage').env('ASSET_URL').'/logo.png',
                'web_source' => route('homepage').env('ASSET_URL').'/web',
                'admin_source' => route('homepage').env('ASSET_URL').'/dashboard',
                'userRole' => $this->bloggerRole,
                'bloggerRole' => $this->bloggerRole,
                'instructorRole' => $this->instructorRole,
                'subAdminRole' => $this->subAdminRole,
                'adminRole' => $this->adminRole,
                'activeStatus' => $this->activeStatus,
                'pendingStatus' => $this->pendingStatus,
                'inactiveStatus' => $this->inactiveStatus,
            ]);
        });

    }
}
