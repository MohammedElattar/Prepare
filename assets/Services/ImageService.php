<?php

namespace App\Services;

use App\Helpers\MediaHelper;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class ImageService
{
    private HasMedia $model;
    private array $data;

    public function __construct($model, $data)
    {
        $this->model = $model;
        $this->data = $data;
    }

    /**
     * store Just one media
     */
    public function storeMedia(string $collectionName, string $mainMediaRequest): void
    {
        if (isset($this->data[$mainMediaRequest]) && $mainMediaRequest != null) {
            MediaHelper::storeImageFromRequest(
                $this->model,
                $mainMediaRequest,
                $collectionName,
            );
        }
    }

    /**
     * Update just one media, this function delete then add the new media
     * @param string $collectionName
     * @param string $mainMediaRequest
     * @return void
     */
    public function updateMedia(string $collectionName, string $mainMediaRequest): void
    {
        if (isset($this->data[$mainMediaRequest]) && $mainMediaRequest != null) {
            $this->model->registerMediaCollections();

            self::storeMedia($collectionName, $mainMediaRequest);
        }
    }

    /**
     * @param Model $model
     * @param array $data
     * @param string $collectionName
     * @param string $deleteMediasRequest
     * @param string $otherMediasRequest
     * @param string $otherMediasRelationName
     * @return void
     */
    public function updateMedias(
        Model $model,
        array $data,
        string $collectionName,
        string $deleteMediasRequest = '',
        string $otherMediasRequest = '',
        string $otherMediasRelationName = 'otherImages',
    ): void
    {
        self::deleteMediasWithIds($model, $data, $deleteMediasRequest, $otherMediasRelationName);

        self::addOtherMedias($model, $data,$collectionName, $otherMediasRequest);
    }

    /**
     * store many medias
     * @param Model $model
     * @param array $data
     * @param string $collectionName
     * @param string $otherImagesRequest
     * @return void
     */
    public static function addOtherMedias(Model $model, array $data, string $collectionName, string $otherMediasRequest): void
    {
        if (isset($data[$otherMediasRequest]) && $otherMediasRequest != null) {
            foreach ($data[$otherMediasRequest] as $image) {
                $model->addMedia($image)->toMediaCollection($collectionName,
                );
            }
        }
    }

    /**
     * @param Model $model
     * @param array $data
     * @param string $deleteMediasRequest
     * @param string $otherMediasRelationName
     * @return void
     */
    public static function deleteMediasWithIds(Model $model, array $data, string $deleteMediasRequest,string $otherMediasRelationName = 'otherImages'): void
    {
        if (isset($data[$deleteMediasRequest]) && $deleteMediasRequest != null) {
            $deletedMedias = array_unique($data[$deleteMediasRequest]);

            $model
                ->$otherMediasRelationName()
                ->whereIntegerInRaw('id', $deletedMedias)
                ->get()
                ->map(fn ($item) => $item->delete());
        }
    }
}
