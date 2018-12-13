<?php

namespace App\Http\Middleware;

use Closure;

use App\Domains\Account\SessionAccountRepository;

use App\Exceptions\NotFoundException;

class RedirectFromAuthenticatePage
{
    /**
     * @var SessionAccountRepository $sessionAccountRepo
     */
    private $sessionAccountRepo;

    /**
     * @param SessionAccountRepository $sessionAccountRepo
     */
    public function __construct(SessionAccountRepository $sessionAccountRepo)
    {
        $this->sessionAccountRepo = $sessionAccountRepo;
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
            $account = $this->sessionAccountRepo->find();
        } catch (NotFoundException $e) {
            return $next($request);
        }

        return redirect('/');

    }
}
