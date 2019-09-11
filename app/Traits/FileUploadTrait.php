<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use File;

trait FileUploadTrait
{
    protected $pathUpload   = 'uploads';

    protected $rule = 'image|max:2048|mimes:jpeg,png,jpg'; //'required|file|image|max:2048|mimes:jpeg,png,jpg'

    public function saveImage($file, $folderUpload = 'default')
    {
        #validate file image
        $this->validateFileAction($file);

        $namaFile = time().'_'.str_replace(' ', '_', $file->getClientOriginalName());

        $pathFile = $this->pathUpload.DIRECTORY_SEPARATOR.$folderUpload;
        
        $file->move($pathFile,$namaFile);

        return $pathFile.DIRECTORY_SEPARATOR.$namaFile;
        
    }

    private function validateFileAction($file)
    {

        $rules = array('fileupload' => $this->rule);
        $file  = array('fileupload' => $file);

        $fileValidator = Validator::make($file, $rules);

        if ($fileValidator->fails()) {

            $messages = $fileValidator->messages();

            return redirect()->back()->withInput(request()->all())
                ->withErrors($messages);

        }
    }

    public function deleteImage($filePath)
    {
        if(File::exists($filePath)) {
            File::delete($filePath);
        }
    }
}