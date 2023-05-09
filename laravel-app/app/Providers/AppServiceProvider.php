<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function boot(): void
    {
        // ...
    
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
    }



    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
 
}
