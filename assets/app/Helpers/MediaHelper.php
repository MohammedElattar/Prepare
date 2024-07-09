<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class MediaHelper
{
    public static function mediaRelationship(Model $model, string $collectionName = 'default', array $additionalSelectedColumns = [])
    {
        return $model
            ->media()
            ->where('collection_name', $collectionName)
            ->select(
                array_merge(
                    ['id', 'model_id', 'disk', 'file_name', 'mime_type'],
                    $additionalSelectedColumns
                )
            );
    }
}
