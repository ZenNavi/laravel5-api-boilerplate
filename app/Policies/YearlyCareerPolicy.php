<?php

namespace App\Policies;

use App\Models\User;
use App\Models\YearlyCareer;

class YearlyCareerPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create YearlyCareer.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the YearlyCareer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\YearlyCareer  $yearlyCareer
     * @return mixed
     */
    public function view(User $user, YearlyCareer $yearlyCareer)
    {
        return $this->own($user, $yearlyCareer);
    }

    /**
     * Determine whether the user can update the YearlyCareer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\YearlyCareer  $yearlyCareer
     * @return mixed
     */
    public function update(User $user, YearlyCareer $yearlyCareer)
    {
        return $this->own($user, $yearlyCareer);
    }

    /**
     * Determine whether the user can delete the YearlyCareer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\YearlyCareer  $yearlyCareer
     * @return mixed
     */
    public function delete(User $user, YearlyCareer $yearlyCareer)
    {
        return $this->own($user, $yearlyCareer);
    }

    /**
     * Determine whether the user owns the YearlyCareer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\YearlyCareer  $yearlyCareer
     * @return mixed
     */
    public function own(User $user, YearlyCareer $yearlyCareer) {
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
