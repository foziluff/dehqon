<?php

namespace App\Policies;

use App\Models\Auth\User;
use App\Models\Culture\CultureSeason;
use Illuminate\Auth\Access\Response;

class CultureSeasonPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CultureSeason $cultureSeason): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CultureSeason $cultureSeason): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CultureSeason $cultureSeason): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CultureSeason $cultureSeason): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CultureSeason $cultureSeason): bool
    {
        //
    }
}