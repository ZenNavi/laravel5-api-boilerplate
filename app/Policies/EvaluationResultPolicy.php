<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EvaluationResult;

class EvaluationResultPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create EvaluationResult.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the EvaluationResult.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResult  $evaluationResult
     * @return mixed
     */
    public function view(User $user, EvaluationResult $evaluationResult)
    {
        return $this->own($user, $evaluationResult);
    }

    /**
     * Determine whether the user can update the EvaluationResult.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResult  $evaluationResult
     * @return mixed
     */
    public function update(User $user, EvaluationResult $evaluationResult)
    {
        return $this->own($user, $evaluationResult);
    }

    /**
     * Determine whether the user can delete the EvaluationResult.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResult  $evaluationResult
     * @return mixed
     */
    public function delete(User $user, EvaluationResult $evaluationResult)
    {
        return $this->own($user, $evaluationResult);
    }

    /**
     * Determine whether the user owns the EvaluationResult.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResult  $evaluationResult
     * @return mixed
     */
    public function own(User $user, EvaluationResult $evaluationResult) {
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
