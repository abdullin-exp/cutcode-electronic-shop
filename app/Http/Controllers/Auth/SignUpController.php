<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpFormRequest;
use Domain\Auth\Contracts\RegisterNewUserContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 *
 */
class SignUpController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function page(): Factory|View|Application
    {
        return view('auth.sign-up');
    }

    public function handle(SignUpFormRequest $request, RegisterNewUserContract $action): RedirectResponse
    {
//        Можно обернуть в try/catch
//        TODO make DTOs
        $action(
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
        );

        return redirect()->intended(route('home'));
    }
}
