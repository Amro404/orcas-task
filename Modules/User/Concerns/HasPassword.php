<?php


namespace Modules\User\Concerns;


use Modules\User\Models\User;

trait HasPassword
{
    public static function bootHasPassword(): void
    {
        static::creating(function (User $user) {
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        });
    }

}
