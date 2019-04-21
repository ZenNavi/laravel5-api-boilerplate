<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use Intervention\Image\Facades\Image;
use rdx\filemanager\FileManager;

class AttachmentController extends Controller
{
    /**
     * @var BaseModel The primary model associated with this controller
     */
    public static $model = Attachment::class;

    /**
     * @var BaseModel The parent model of the model, in the case of a child rest controller
     */
    public static $parentModel = null;

    /**
     * @var null|BaseTransformer The transformer this controller should use, if overriding the model & default
     */
    public static $transformer = null;

    public function upload(Request $request, FileManager $files)
    {
        $file = $request->allFiles();

        foreach($file as $f) {
            $filesize = filesize($f->getPathname());
            $filetype = $f->getMimeType();
            if($request->get('clob') === 'true'){
                Image::make($f->getRealPath())->resize($request->get('max_width'), $request->get('min_height'), function ($constraint) {
                    $constraint->aspectRatio();
                })->save();
            }
        }

        $managed = $files->saveFile($request['file']);
        $uploaded = Attachment::create([
            'origin_name'=>$managed->filename,
            'saved_name'=>$managed->filepath,
            'filesize'=>$filesize,
            'filetype'=>$filetype,
            'meta'=>''
        ]);
        $uploaded->save();

        return [
            'success'=>true,
            'error'=>'',
            'url'=>url("/attachment/download/{$uploaded->id}"),
            'data'=>$uploaded
        ];
    }

    public function download($id) {
        $file = Attachment::find($id);
        return response()->download(storage_path("uploads/{$file->saved_name}"), $file->orgin_name);
    }
}
