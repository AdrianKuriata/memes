<?php

namespace Memes\Policies;

use Memes\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function viewAdmin(User $user)
    {
        return $user->is_admin;
    }
}
