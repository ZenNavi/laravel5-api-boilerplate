<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EvaluationResultSheetAnswerItem;

class EvaluationResultSheetAnswerItemPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create EvaluationResultSheetAnswerItem.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the EvaluationResultSheetAnswerItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResultSheetAnswerItem  $evaluationResultSheetAnswerItem
     * @return mixed
     */
    public function view(User $user, EvaluationResultSheetAnswerItem $evaluationResultSheetAnswerItem)
    {
        return $this->own($user, $evaluationResultSheetAnswerItem);
    }

    /**
     * Determine whether the user can update the EvaluationResultSheetAnswerItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResultSheetAnswerItem  $evaluationResultSheetAnswerItem
     * @return mixed
     */
    public function update(User $user, EvaluationResultSheetAnswerItem $evaluationResultSheetAnswerItem)
    {
        return $this->own($user, $evaluationResultSheetAnswerItem);
    }

    /**
     * Determine whether the user can delete the EvaluationResultSheetAnswerItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResultSheetAnswerItem  $evaluationResultSheetAnswerItem
     * @return mixed
     */
    public function delete(User $user, EvaluationResultSheetAnswerItem $evaluationResultSheetAnswerItem)
    {
        return $this->own($user, $evaluationResultSheetAnswerItem);
    }

    /**
     * Determine whether the user owns the EvaluationResultSheetAnswerItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationResultSheetAnswerItem  $evaluationResultSheetAnswerItem
     * @return mixed
     */
    public function own(User $user, EvaluationResultSheetAnswerItem $evaluationResultSheetAnswerItem) {
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
