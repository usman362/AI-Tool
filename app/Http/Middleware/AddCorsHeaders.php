<?php

namespace App\Http\Middleware;
use Symfony\Component\Mime\MimeTypes;

use Closure;

class AddCorsHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response;

        // Check if the response is an instance of BinaryFileResponse (e.g., file download)
        if ($response instanceof \Symfony\Component\HttpFoundation\BinaryFileResponse) {
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
            
            // Use Symfony's MimeType class to set the proper Content-Type
            $mimeType = MimeTypes::getDefault()->guessMimeType($response->getFile()->getPathname());
            $response->headers->set('Content-Type', $mimeType ?: 'application/octet-stream');
        }
    
        return $response;
    }
}