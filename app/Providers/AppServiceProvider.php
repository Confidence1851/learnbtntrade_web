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

            // if(\DB::connection()->getDatabaseName()){
            //     // if(Schema::hasTable('settings')){
            //     //     $general_settings = Setting::first();
            //         // if(empty($general_settings)){
            //         //     $general_settings = Setting::create([
            //         //         'min_investment' => 25,
            //         //         'min_withdrawal' => 10,
            //         //         'withdrawal_rate' => 0.05,
            //         //         'transfer_rate' => 0.02,
            //         //         'fifteen_percent_min' => 75,
            //         //     ]);
            //         // }
            //         $view->with([
            //             // "general_settings" => $general_settings ,
            //             'web_source' => env('ASSET_URL').'/web',
            //             'admin_source' => env('ASSET_URL').'/'."dashboard",
            //         ]);
            //     // }
            // }
            $view->with([
                'logo_img' => url('logo.png'),
                'favicon_img' => url('logo.png'),
                'web_source' => url(env('ASSET_URL').'/web'),
                'admin_source' => url(env('ASSET_URL')."/dashboard"),
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
