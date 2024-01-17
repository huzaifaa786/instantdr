<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class OrMiddleware extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('api')->check()) {
            return $this->auth->shouldUse('api');
        }else if($this->auth->guard('doctor_api')->check()){
            return $this->auth->shouldUse('doctor_api');
        }

        parent::authenticate($request, $guards);
    }
}
