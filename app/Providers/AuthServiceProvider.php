<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable,$url){
            return (new MailMessage)
                ->subject('Validar correo electronico')
                ->view(
                    'emails.validarCorreo',
                    [
                        'url' => $url
                    ]
                );
        });

        ResetPassword::createUrlUsing(function ($user, string $token){
            return 'https://example.com/reset-password?token='.$token;
        });
    }
}
