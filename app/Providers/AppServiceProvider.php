<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        //Retorna informações abaixo em todas as páginas.
        Inertia::share([
            'auth' => [
                'user' => function () {
                    $user = Auth::user();
    
                    if (!$user) {
                        return null;
                    }
    
    
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'type' => $user->type,
                        'profile' => $user->{$user->type}, // ex: $user->professional
                    ];
                },
            ],
            'data_hoje' => fn () => Carbon::now()->format('d/m/Y'),
        ]);
    }
}
