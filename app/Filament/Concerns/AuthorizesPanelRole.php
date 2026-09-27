<?php

namespace App\Filament\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

trait AuthorizesPanelRole
{
    public static function canViewAny(): bool
    {
        return static::userCanAccess();
    }

    public static function canAccess(): bool
    {
        return static::userCanAccess();
    }

    public static function canCreate(): bool
    {
        return static::userCanAccess();
    }

    public static function canEdit(Model $record): bool
    {
        return static::userCanAccess();
    }

    public static function canDelete(Model $record): bool
    {
        return static::userCanAccess();
    }

    public static function canDeleteAny(): bool
    {
        return static::userCanAccess();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return static::userCanAccess();
    }

    protected static function userCanAccess(): bool
    {
        $user = auth()->user();

        if (! $user instanceof User) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        return in_array($user->role, static::allowedRoles(), true);
    }

    /**
     * @return list<string>
     */
    protected static function allowedRoles(): array
    {
        return ['admin'];
    }
}
