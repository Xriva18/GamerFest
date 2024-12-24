<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Illuminate\Support\Facades\Storage;
use Filament\Models\Contracts\HasAvatar;

class User extends Authenticatable implements HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use TwoFactorAuthenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'apellido',
        'universidad',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    # Add this method to the User model avatar_url
    /**
     * Get the URL for the user's avatar.
     *
     * @return ?string
     */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::disk('public')->url($this->avatar_url) : null;
    }

}
