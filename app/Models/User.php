<?php

namespace App\Models;

use App\Utils\JwtTrait;
use Illuminate\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements JWTSubject, AuthenticatableContract
{
    use JwtTrait, Authenticatable;

    const DEFAULT_ID = 1;
}
