<?php
 
namespace App\Providers;
 
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
 
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
        //
        VerifyEmail::toMailUsing( function($notifiable, $url) {
            return (new MailMessage)
            // ->subject('Verifica tu cuenta en ' . env('APP_NAME'))
            ->subject( Lang::get('Verify Email Address in ' . env('APP_NAME') ))
            ->greeting('Hi ' . $notifiable->name . ':')
            ->line('Click to verify your account.')
            ->action('Verify Email', $url)
            ->line('If you did not send this verification, please ignore this email.')
            ->salutation( new HtmlString('Hi,Hola,你好 .<br>Says the Team' . '<strong>' . env('APP_NAME') . '</strong>'));
        });
 
    }
}