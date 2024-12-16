<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    public function accessUserDashboard(User $user): bool
    {
        return $user->role === 'user';
    }

    public function accessAdminDashboard(User $user): bool
    {
        return $user->role === 'admin';
    }
}
