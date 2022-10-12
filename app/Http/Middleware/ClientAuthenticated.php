<?php

namespace App\Http\Middleware;

use Closure;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $client = \App\Models\Client::where('api_token', $request->api_token)->first();
        if ($client) {
            return $next($request);
        }
         else {
            return redirect(route('login'));
        }
    }
}
