<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens;

    const DEFAULT_ID = 1;
}
