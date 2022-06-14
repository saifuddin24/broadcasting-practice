<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminPrivileges extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next )
    {
        $this->authenticate( $request, [ 'sunctum' ] );

        if( $request->user('sunctum' ) ) {
            return $next($request);
        }

        if( $request->wantsJson() ) {
            return response( [ 'message' => 'Un authorized access' ] , 403);
        }

    }
}
