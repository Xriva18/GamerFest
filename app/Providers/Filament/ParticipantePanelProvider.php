<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
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
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Illuminate\Auth\Access\AuthorizationException;

class ParticipantePanelProvider extends PanelProvider
{
    public function canView($user): bool
    {
        // Verificar el rol_id del modelo Users
        if ($user->rol_id !== 4) {
            throw new AuthorizationException('No tienes permiso para acceder al panel de participante.');
        }
        dd($user);
        return true;
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('participante')
            ->path('participanteJuego')
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Participante/Resources'), for: 'App\\Filament\\Participante\\Resources')
            ->discoverPages(in: app_path('Filament/Participante/Pages'), for: 'App\\Filament\\Participante\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Participante/Widgets'), for: 'App\\Filament\\Participante\\Widgets')
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
            ])
            ->plugin(
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
            ); // Agrega el plugin BreezyCore;
    }
}
