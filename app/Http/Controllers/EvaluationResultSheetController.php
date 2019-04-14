<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluationResultSheet;

class EvaluationResultSheetController extends Controller
{
    /**
     * @var BaseModel The primary model associated with this controller
     */
    public static $model = EvaluationResultSheet::class;

    /**
     * @var BaseModel The parent model of the model, in the case of a child rest controller
     */
    public static $parentModel = null;

    /**
     * @var null|BaseTransformer The transformer this controller should use, if overriding the model & default
     */
    public static $transformer = null;
}
