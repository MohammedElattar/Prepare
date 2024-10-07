<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Debug\ShouldntReport;

class BaseExceptionClass extends Exception implements ShouldntReport {}
