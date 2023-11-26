<?php

namespace Elattar\Prepare\Traits;

trait ModelExists
{
    public function recordExists($model, $modelId, array &$errors, string $errorKey = 'foreign_id', string $messageKey = 'that_record')
    {
        $yourModel = $model->whereId($modelId)->first();

        if (!$yourModel) {
            $errors[$errorKey] = translate_error_message($messageKey, 'not_exists');

            return $errors;
        }

        return $yourModel;
    }
}
