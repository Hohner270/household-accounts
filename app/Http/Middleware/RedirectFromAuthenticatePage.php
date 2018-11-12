<?php

namespace App\Http\Middleware;

use Closure;

use App\Domains\Account\SessionAccountRepository;

use App\Exceptions\NotFoundException;

class RedirectFromAuthenticatePage
{
    private $sessionRepo;

    public function __construct(SessionAccountRepository $sessionRepo)
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
        try {
            $account = $this->sessionRepo->find();
        } catch (NotFoundException $e) {
            return $next($request);
        }

        return redirect('/');

    }
}
