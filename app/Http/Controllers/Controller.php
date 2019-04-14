<?php

namespace App\Http\Controllers;

use App\Transformers\BaseTransformer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Specialtactics\L5Api\Http\Controllers\RestfulController as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Request to retrieve a collection of all items of this resource
     *
     * @return \Dingo\Api\Http\Response
     */
    public function getAll()
    {
        $model = new static::$model;

        $per_page = request('per_page');
        $query = $model::with($model::$localWith);
        $this->qualifyCollectionQuery($query);

        // Handle pagination, if applicable
        if( $per_page ) $model->setPerPage($per_page);

        $perPage = $model->getPerPage();
        if ($perPage) {
            $paginator = $query->paginate($perPage);
            return $this->response->paginator($paginator, $this->getTransformer());
        } else {
            $resources = $query->get();

            return $this->response->collection($resources, $this->getTransformer());
        }
    }
}
