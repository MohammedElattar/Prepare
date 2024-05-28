<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ImageService
{
    private HasMedia $model;
    private array $data;

    public function __construct($model, $data)
    {
        $this->model = $model;
        $this->data = $data;
    }

    public static function createInstance(HasMedia $model, array $data): ImageService
    {
        return new self($model, $data);
    }

    /**
     * store Just one media
     */
    public function storeOneMediaFromRequest(string $collectionName, string $requestFileName): void
    {
        if (isset($this->data[$requestFileName])) {
            (new FileOperationService())->storeImageFromRequest(
                $this->model,
                $collectionName,
                $requestFileName,
            );
        }
    }

    public function updateOneMedia(string $collectionName, string $requestFileName, string $resetMainImageCollectionName = 'registerMediaCollections'): void
    {
        if (isset($this->data[$requestFileName])) {
            info($this->model);
            $this->model->$resetMainImageCollectionName();

            $this->storeOneMediaFromRequest($collectionName, $requestFileName);
        }
    }

    /**
     * @param string $collectionName
     * @param string $deleteMediasRequest
     * @param string $otherMediasRequest
     * @param string $otherMediasRelationName
     * @return void
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function updateMultipleMedia(
        string $collectionName,
        string $deleteMediasRequest = '',
        string $otherMediasRequest = '',
        string $otherMediasRelationName = 'otherImages',
    ): void
    {
        $this->deleteMultipleMediaViaIds($deleteMediasRequest, $otherMediasRelationName);

        $this->storeMultipleMedia($collectionName, $otherMediasRequest);
    }

    /**
     * store many medias
     * @param string $collectionName
     * @param string $multipleMediaRequestKey
     * @return void
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function storeMultipleMedia(string $collectionName, string $multipleMediaRequestKey = 'other_images'): void
    {
        if (isset($this->data[$multipleMediaRequestKey])) {
            foreach ($this->data[$multipleMediaRequestKey] as $media) {
                $this->storeMediaFromFile($media, $collectionName);
            }
        }
    }

    /**
     * @param string $deletedMediaRequestKey
     * @param string $otherMediasRelationName
     * @return void
     */
    public function deleteMultipleMediaViaIds(string $deletedMediaRequestKey, string $otherMediasRelationName = 'otherImages'): void
    {
        if (isset($this->data[$deletedMediaRequestKey])) {
            $deletedMedias = array_unique($this->data[$deletedMediaRequestKey]);

            $this->model
                ->$otherMediasRelationName()
                ->whereIntegerInRaw('id', $deletedMedias)
                ->get()
                ->map(fn ($item) => $item->delete());
        }
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function storeMediaFromFile(UploadedFile $media, string $collectionName): void
    {
        $this
            ->model
            ->addMedia($media)
            ->usingFileName(Str::random().static::getMediaExtension($media))
            ->toMediaCollection($collectionName);
    }

    public static function getMediaExtension(UploadedFile $uploadedFile): string
    {
        $uploadedFileExtension = explode('/',$uploadedFile->getMimeType())[0];

        return match ($uploadedFileExtension) {
            'audio' => 'mp3',
            'image' => 'jpg',
            default => 'mp4',
        };
    }
}