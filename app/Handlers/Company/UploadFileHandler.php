<?php


namespace App\Handlers\Company;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class ImageUploadHandler
 * @package App\Handlers\Company
 */
class UploadFileHandler
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @return string|null
     */
    protected function uploadImage(): ?string
    {
        if ($cover = $this->request->file('logo')) {

            $extension  = $cover->getClientOriginalExtension();
            $fileName   = $cover->getFilename() . '.' . $extension;

            Storage::disk('public')->put($fileName, File::get($cover));

            return $fileName;
        }

        return null;
    }

    /**
     * @param $image
     * @return bool
     */
    protected function removeImage($image): bool
    {
        return Storage::delete('/public' . $image);
    }
}