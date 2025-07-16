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
                'user' => fn () => Auth::user(),
            ],
            'data_hoje' => fn () => Carbon::now()->format('d/m/Y'),
        ]);
    }
}
