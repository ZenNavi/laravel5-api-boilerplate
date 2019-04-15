<?php

namespace App\Transformers;

use Specialtactics\L5Api\Models\RestfulModel;
use Specialtactics\L5Api\Transformers\RestfulTransformer;

class BaseTransformer extends RestfulTransformer
{
    /**
     * Filter out some attributes immediately
     *
     * Some attributes we never want to expose to an API consumer, for security and separation of concerns reasons
     * Feel free to override this function as necessary
     *
     * @return array Array of attributes to filter out
     */
    protected function getFilteredOutAttributes()
    {
        $filterOutAttributes = array_merge(
            $this->model->getHidden(),
            [
                'deleted_at',
            ]
        );

        return array_unique($filterOutAttributes);
    }


    /**
     * Transform an eloquent object into a jsonable array
     *
     * @param RestfulModel $model
     * @return array
     */
    public function transformRestfulModel(RestfulModel $model)
    {
        $this->model = $model;

        // Begin the transformation!
        $transformed = $model->toArray();

        /**
         * Filter out attributes we don't want to expose to the API
         */
        $filterOutAttributes = $this->getFilteredOutAttributes();

        $transformed = array_filter($transformed, function ($key) use ($filterOutAttributes) {
            return ! in_array($key, $filterOutAttributes);
        }, ARRAY_FILTER_USE_KEY);

        /*
         * Format all dates as Iso8601 strings, this includes the created_at and updated_at columns
         */
        foreach ($model->getDates() as $dateColumn) {
            if (! empty($model->$dateColumn) && ! in_array($dateColumn, $filterOutAttributes)) {
                $transformed[$dateColumn] = $model->$dateColumn->toIso8601String();
            }
        }

        /**
         * Primary Key transformation - all PKs to be called "id"
         */
        $transformed = array_merge(
            ['id' => $model->getKey()],
            $transformed
        );

        /** auto_increment 는 삭제 하지 않는다. */
        if( ! $model->incrementing  && ! array_key_exists($model->getKeyName(), $model->getAttributes())) {
           unset($transformed[$model->getKeyName()]);
        }

        /*
         * Transform the model keys' case
         */
        $transformed = $this->transformKeysCase($transformed);

        /**
         * Get the relations for this object and transform them
         */
        $transformed = $this->transformRelations($transformed);

        return $transformed;
    }
}
