<?php

namespace App\Policies;

use App\Models\Auth\User;
use App\Models\Field\Consumption\ConsumptionProductionMean;

class ConsumptionProductionMeanPolicy
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
    public function view(User $user, ConsumptionProductionMean $consumptionProductionMean): bool
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
    public function update(User $user, ConsumptionProductionMean $consumptionProductionMean): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ConsumptionProductionMean $consumptionProductionMean): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ConsumptionProductionMean $consumptionProductionMean): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ConsumptionProductionMean $consumptionProductionMean): bool
    {
        //
    }
}
