<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\HttpFoundation\Response;

class LaravelRequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $output = new ConsoleOutput();
        $output->writeln($request->method() . ' : ' . $request->path() . ' -- ' . $response->getStatusCode() . ' ' . Response::$statusTexts[$response->getStatusCode()]);
        return $response;
    }
}