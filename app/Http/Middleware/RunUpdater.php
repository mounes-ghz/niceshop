<?php

namespace NiceShop\Http\Middleware;

use Closure;
use NiceShop\Updater;
use Illuminate\Http\Request;

class RunUpdater
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (config('app.installed') && file_exists(storage_path('app/update'))) {
            Updater::run();
        }

        return $next($request);
    }
}
