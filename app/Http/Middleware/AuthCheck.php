<?php

namespace App\Http\Middleware;

use Closure;

use App\Domains\Account\SessionAccountRepository;

class AuthCheck
{
    private $sessionRepo;

    public function __construct(SessionAccountRepository $Repo)
    {
        $this->sessionRepo = $sessionRepo;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! empty($this->sessionRepo->find())) return redirect('/signIn');
        return $next($request);
    }
}
