<?php

namespace App\Services;

use Illuminate\Support\Str;

class FileOperationService
{
    /**
     * Store Image From Request
     */
    public function storeImageFromRequest(
        object $class,
        string $collectionName = 'default',
        string $fileName = 'img',
        string $storedFileName = null
    ): object {
        return json_decode($class
            ->addMediaFromRequest($fileName)
            ->usingFileName($storedFileName ?: Str::random() . '.png')
            ->toMediaCollection($collectionName));
    }

    public function storeFileFromRequest(
        object $class,
        string $requestFileName = 'media',
        string $storedFileName = null,
        string $collectionName = 'default',
    ) {

        $storedFileName = ($storedFileName ?: Str::random(15)) . '.';
        $uploadedFileExtension = explode('/', request()->file($requestFileName)->getMimeType())[0];
        // append the right extension
        switch ($uploadedFileExtension) {
            case 'audio':

                $storedFileName .= 'mp3';
                break;

            case 'image':

                $storedFileName .= 'jpg';
                break;

            default:
                $storedFileName .= 'mp4';
                break;

        }

        return json_decode($class
            ->addMediaFromRequest($requestFileName)
            ->usingFileName($storedFileName)
            ->toMediaCollection($collectionName));
    }

    public function addMedia(
        $model,
        $file,
        $mediaCollection,
        $extension = 'png',
    ) {
        return json_decode(
            $model
                ->addMedia($file)
                ->usingFileName(Str::random() . ".$extension")
                ->toMediaCollection($mediaCollection)
        );
    }
}
