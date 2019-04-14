<?php

namespace App\Models;

use App\Transformers\BaseTransformer;
use Ramsey\Uuid\Uuid;
use Specialtactics\L5Api\Models\RestfulModel;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class BaseModel extends RestfulModel
{

    /**
     * Boot the model
     *
     * Add various functionality in the model lifecycle hooks
     */
    public static function boot()
    {
        parent::boot();

        // Add functionality for creating a model
        static::creating(function (RestfulModel $model) {
            // If the PK(s) are missing, generate them
            $uuidKeyName = $model->getKeyName();

            if (!$model->incrementing && ! array_key_exists($uuidKeyName, $model->getAttributes())) {
                $model->$uuidKeyName = Uuid::uuid4()->toString();
            } else {
                $model->$uuidKeyName = null;
            }
        });

        // Add functionality for updating a model
        static::updating(function (RestfulModel $model) {
            // Disallow updating UUID keys
            if ($model->getAttribute($model->getKeyName()) != $model->getOriginal($model->getKeyName())) {
                throw new BadRequestHttpException('Updating the UUID of a resource is not allowed.');
            }

            // Disallow updating immutable attributes
            if (! empty($model->immutableAttributes)) {
                // For each immutable attribute, check if they have changed
                foreach ($model->immutableAttributes as $attributeName) {
                    if ($model->getOriginal($attributeName) != $model->getAttribute($attributeName)) {
                        throw new BadRequestHttpException('Updating the "'.camel_case($attributeName).'" attribute is not allowed.');
                    }
                }
            }
        });
    }

}
