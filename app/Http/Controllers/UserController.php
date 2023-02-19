<?php

namespace App\Http\Controllers;

use App\Enums\Currency;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ConverterInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('user.index')->with(compact('users'));
    }

    public function show(User $user, ConverterInterface $converter): View
    {
        $currencies = $converter->convert($user->currency->name, $user->rate);

        return view('user.show')->with(compact('user', 'currencies'));
    }

    public function create(): View
    {
        $currencies = Currency::getCurrencies();

        return view('user.create')->with(compact('currencies'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect(route('users.index'));
    }
}
