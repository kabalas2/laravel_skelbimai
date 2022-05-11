<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view)
        {
            if (Auth::check()) {
                $notReaded = Message::where('reseiver_id',Auth::id())->where('seen', 0)->count();
                $notReaded = $notReaded > 0 ? ' ('.$notReaded.')' : '';
                view()->share('notRead', $notReaded);
            }

        });
    }
}
