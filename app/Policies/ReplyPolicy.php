<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Reply $reply)
    {
        return $user->role === 'admin';
    }

    public function isClosed(User $user, Reply $reply)
    {
        return !$reply->thread->closed;
    }
}
