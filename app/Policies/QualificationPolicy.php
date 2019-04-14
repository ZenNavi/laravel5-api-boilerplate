<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Qualification;

class QualificationPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create Qualification.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Qualification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Qualification  $qualification
     * @return mixed
     */
    public function view(User $user, Qualification $qualification)
    {
        return $this->own($user, $qualification);
    }

    /**
     * Determine whether the user can update the Qualification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Qualification  $qualification
     * @return mixed
     */
    public function update(User $user, Qualification $qualification)
    {
        return $this->own($user, $qualification);
    }

    /**
     * Determine whether the user can delete the Qualification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Qualification  $qualification
     * @return mixed
     */
    public function delete(User $user, Qualification $qualification)
    {
        return $this->own($user, $qualification);
    }

    /**
     * Determine whether the user owns the Qualification.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Qualification  $qualification
     * @return mixed
     */
    public function own(User $user, Qualification $qualification) {
        //
    }

    /**
     * This function can be used to add conditions to the query builder,
     * which will specify the user's ownership of the model for the get collection query of this model
     *
     * @param \App\Models\User $user A user object against which to construct the query. By default, the currently logged in user is used.
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    public function qualifyCollectionQueryWithUser(User $user, $query)
    {
        return $query;
    }
}
