<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::share('message', Message::where('receiver_id', auth()?->id())->where('conversation_id', null)->where('status', 'Unreaded')->get());

        // $message = Message::where('receiver_id', auth()?->id())->where('conversation_id', null)->where('status', 'Unreaded')->get();
        // dd($message);

        View::composer('components.admin-navbar', function ($view){
            // $message = Message::where('receiver_id', auth()?->id())->where('conversation_id', null)->where('status', 'Unreaded')->get();

            $view->with('message', Message::where('receiver_id', auth()?->id())->where('conversation_id', null)->where('status', 'Unreaded')->get());
        });
    }
}
