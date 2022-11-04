<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Login\AttemptLoginUser;
use App\Http\Requests\Login\AttemptRequest;
use App\Support\Facades\Messages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View|RedirectResponse
    {
        return Auth::check() ?
            redirect()->route('welcome') :
            view('pages.login.index');
    }

    public function attempt(AttemptRequest $request): array
    {
        if (AttemptLoginUser::run($request->validated())) {
            return [
                'success' => route('welcome'),
            ];
        } else {
            return [
                'messages' => Messages::danger(trans('auth.failed'))->get(),
            ];
        }
    }
}
