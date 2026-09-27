<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_ADMIN = 'admin';

    public const ROLE_SOFTWARE = 'software';

    public const ROLE_MARKET = 'market';

    /**
     * @return array<string, string>
     */
    public static function roleOptions(): array
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_SOFTWARE => 'Software',
            self::ROLE_MARKET => 'Market',
        ];
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin() || $this->isSoftware() || $this->isMarket();
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN || blank($this->role);
    }

    public function isSoftware(): bool
    {
        return $this->role === self::ROLE_SOFTWARE;
    }

    public function isMarket(): bool
    {
        return $this->role === self::ROLE_MARKET;
    }

    public function canManageMarketplace(): bool
    {
        return $this->isAdmin() || $this->isMarket();
    }

    public function canManageSoftware(): bool
    {
        return $this->isAdmin() || $this->isSoftware();
    }
}
