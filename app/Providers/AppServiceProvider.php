<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Responses\LogoutResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\Filament\CoordinadorPanelProvider;
use App\Providers\Filament\TesoreroPanelProvider;
use App\Providers\Filament\ParticipantePanelProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(AdminPanelProvider::class);
        $this->app->singleton(CoordinadorPanelProvider::class);
        $this->app->singleton(TesoreroPanelProvider::class);
        $this->app->singleton(ParticipantePanelProvider::class);
        // Vincula la interfaz con la implementación personalizada
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    
}
