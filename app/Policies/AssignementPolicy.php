<?php

namespace App\Policies;

use App\Models\Assignement;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;

class AssignementPolicy
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
    public function view(User $user, Assignement $assignement): bool
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
    public function update(User $user, Assignement $assignement): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Assignement $assignement): bool
    {
        $jiri = Jiri::find($assignement->jiri_id);
        $project = Project::find($assignement->project_id);

        return $user->id === $jiri->user_id && $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Assignement $assignement): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Assignement $assignement): bool
    {
        //
    }
}
