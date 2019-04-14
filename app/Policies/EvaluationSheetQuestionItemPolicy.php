<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EvaluationSheetQuestionItem;

class EvaluationSheetQuestionItemPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create EvaluationSheetQuestionItem.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the EvaluationSheetQuestionItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheetQuestionItem  $evaluationSheetQuestionItem
     * @return mixed
     */
    public function view(User $user, EvaluationSheetQuestionItem $evaluationSheetQuestionItem)
    {
        return $this->own($user, $evaluationSheetQuestionItem);
    }

    /**
     * Determine whether the user can update the EvaluationSheetQuestionItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheetQuestionItem  $evaluationSheetQuestionItem
     * @return mixed
     */
    public function update(User $user, EvaluationSheetQuestionItem $evaluationSheetQuestionItem)
    {
        return $this->own($user, $evaluationSheetQuestionItem);
    }

    /**
     * Determine whether the user can delete the EvaluationSheetQuestionItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheetQuestionItem  $evaluationSheetQuestionItem
     * @return mixed
     */
    public function delete(User $user, EvaluationSheetQuestionItem $evaluationSheetQuestionItem)
    {
        return $this->own($user, $evaluationSheetQuestionItem);
    }

    /**
     * Determine whether the user owns the EvaluationSheetQuestionItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EvaluationSheetQuestionItem  $evaluationSheetQuestionItem
     * @return mixed
     */
    public function own(User $user, EvaluationSheetQuestionItem $evaluationSheetQuestionItem) {
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
