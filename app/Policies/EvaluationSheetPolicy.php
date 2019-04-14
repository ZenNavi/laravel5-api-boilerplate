<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EvaluationSheet;

class EvaluationSheetPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create EvaluationSheet.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the EvaluationSheet.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheet  $evaluationSheet
     * @return mixed
     */
    public function view(User $user, EvaluationSheet $evaluationSheet)
    {
        return $this->own($user, $evaluationSheet);
    }

    /**
     * Determine whether the user can update the EvaluationSheet.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheet  $evaluationSheet
     * @return mixed
     */
    public function update(User $user, EvaluationSheet $evaluationSheet)
    {
        return $this->own($user, $evaluationSheet);
    }

    /**
     * Determine whether the user can delete the EvaluationSheet.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheet  $evaluationSheet
     * @return mixed
     */
    public function delete(User $user, EvaluationSheet $evaluationSheet)
    {
        return $this->own($user, $evaluationSheet);
    }

    /**
     * Determine whether the user owns the EvaluationSheet.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheet  $evaluationSheet
     * @return mixed
     */
    public function own(User $user, EvaluationSheet $evaluationSheet) {
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
