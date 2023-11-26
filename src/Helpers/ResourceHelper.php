<?php

namespace Elattar\Prepare\Helpers;

class ResourceHelper
{
    public static function getFirstMediaOriginalUrl($object, string $relationName = 'avatar', string $defaultImageName = 'store.png'): ?string
    {
        return $object->relationLoaded($relationName)
            ? (
                $object->{$relationName}->first()->original_url
                ?? asset('/storage/default/' . $defaultImageName)
            )
            : null;
    }

    public static function getImagesObject($object, string $relationName, string $defaultFileName = 'store.png')
    {
        if ($object->relationLoaded($relationName)) {
            $images = [];

            $object->{$relationName}->map(
                function ($file) use (&$images) {
                    $images[] = ['id' => $file->id, 'url' => $file->original_url];
                }
            );

            if (!$images) {
                $images = [
                    ['id' => 0, 'url' => asset('/storage/default/' . $defaultFileName)],
                    ['id' => 0, 'url' => asset('/storage/default/' . $defaultFileName)],
                    ['id' => 0, 'url' => asset('/storage/default/' . $defaultFileName)],
                ];
            }

            return $images;
        }

        return null;
    }
}
