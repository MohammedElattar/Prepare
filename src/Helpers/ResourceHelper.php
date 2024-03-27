<?php

namespace Elattar\Prepare\Helpers;

class ResourceHelper
{
    public static function getFirstMediaOriginalUrl($object, string $relationName = 'avatar', string $defaultImageName = 'store.png', bool $shouldReturnDefault = true): ?string
    {
        return $object->relationLoaded($relationName)
            ? (
                $object->{$relationName}->first()->original_url
                ?? $shouldReturnDefault ? asset('/storage/default/'.$defaultImageName) : null
            )
            : null;
    }

    public static function getMedia($collectionName, $thisValue, string $relationName = 'mediaPaths', string $defaultFile = 'store.png', bool $shouldReturnDefaultMedia = true)
    {
        $media = $thisValue->{$relationName}[
        $thisValue->{$relationName}->search(fn ($item) => $item->collection_name == $collectionName)
        ]
            ->original_url ?? null;

        return $media ?: ($shouldReturnDefaultMedia ? asset('/storage/default/store.png') : null);
    }

    public static function getImagesObject($object, string $relationName, string $defaultFileName = 'store.png', bool $shouldReturnDefault = true)
    {
        if ($object->relationLoaded($relationName)) {
            $images = [];

            $object->{$relationName}->map(
                function ($file) use (&$images) {
                    $images[] = ['id' => $file->id, 'url' => $file->original_url];
                }
            );

            return $images;
        }

        return null;
    }
}
