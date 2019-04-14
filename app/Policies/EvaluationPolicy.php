<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Evaluation;

class EvaluationPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create Evaluation.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Evaluation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function view(User $user, Evaluation $evaluation)
    {
        return $this->own($user, $evaluation);
    }

    /**
     * Determine whether the user can update the Evaluation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function update(User $user, Evaluation $evaluation)
    {
        return $this->own($user, $evaluation);
    }

    /**
     * Determine whether the user can delete the Evaluation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function delete(User $user, Evaluation $evaluation)
    {
        return $this->own($user, $evaluation);
    }

    /**
     * Determine whether the user owns the Evaluation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function own(User $user, Evaluation $evaluation) {
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
