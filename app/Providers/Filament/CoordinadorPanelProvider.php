<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Illuminate\Auth\Access\AuthorizationException;

class CoordinadorPanelProvider extends PanelProvider
{
    public function canView($user): bool
    {
        // Verificar el rol_id del modelo Users
        if ($user->rol_id !== 2) {
            throw new AuthorizationException('No tienes permiso para acceder al panel de coordinador.');
        }
        dd($user);
        return true;
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('coordinador')
            ->path('coordinadorJuego')
            ->colors([
                'primary' => Color::Blue,
            ])
            ->font('roboto')
            ->discoverResources(in: app_path('Filament/Coordinador/Resources'), for: 'App\\Filament\\Coordinador\\Resources')
            ->discoverPages(in: app_path('Filament/Coordinador/Pages'), for: 'App\\Filament\\Coordinador\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Coordinador/Widgets'), for: 'App\\Filament\\Coordinador\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])->plugin(
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true, // Agrega el enlace "Mi Cuenta" en el menú del usuario
                        shouldRegisterNavigation: false, // No agrega un ítem de navegación principal para la página de perfil
                        navigationGroup: 'Settings', // Define el grupo de navegación para la página de perfil
                        hasAvatars: true, // Habilita soporte para avatar
                        slug: 'my-profile' // Establece el slug de la página de perfil
                    )
                    ->enableTwoFactorAuthentication(force: false)
                    //Desaactiva las secciones de información personal y cambio de contraseña
                    ->withoutMyProfileComponents([
                        'personal_info', // Desactiva la sección de información personal
                        'update_password', // Desactiva la sección de cambio de contraseña
                    ])
            ); // Agrega el plugin BreezyCore;;
    }
}
