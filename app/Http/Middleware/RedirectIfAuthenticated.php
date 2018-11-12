<?php

namespace App\Http\Middleware;

use Closure;

use App\Domains\Account\SessionAccountRepository;

use App\Exceptions\NotFoundException;

class RedirectIfAuthenticated
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
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        try {
            $account = $this->sessionRepo->find();
        } catch (NotFoundException $e) {
            return redirect('/signIn');
        }

        // ここで変数にユーザーを入れてもいいのか？ リクエストの中に入れちゃう？
        $request->account = $account;

        return $next($request);
    }
}
