<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use RuntimeException;
use Cornatul\Marketing\Base\Facades\MarketingPortal;

class RequireWorkspace
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle($request, Closure $next)
    {

        try {
            MarketingPortal::currentWorkspaceId();
        }
        catch(RuntimeException $exception) {
            if($request->is('api/*')) {
                return response('Unauthorized.', 401);
            }

            abort(404);
        }

        return $next($request);
    }
}
