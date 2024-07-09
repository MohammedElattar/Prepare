<?php

namespace App\Traits;

use App\Helpers\GeneralHelper;
use Illuminate\Support\Str;

trait GeneralTrait
{
    public function loginIfTokenExists()
    {
        $bearerToken = $this->passedToken();

        if ($bearerToken) {
            $this->middleware(GeneralHelper::authMiddleware());
        }
    }

    public function passedToken()
    {
        return Str::replace(
            'Bearer',
            '',
            request()->header('Authorization')
        );
    }
}
