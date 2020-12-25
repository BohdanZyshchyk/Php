<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('account.register.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ],
            [
                'name.required'=> "Ім'я побовязкове поле",
                'email.required'=> "Пошта є побовязкове поле",
                'email.email'=> "Не коретно вказано пошту",
                'password.required'=> "Вкажіть поле пароль",
                'password.confirmed'=> "Паролі не співпадають"
            ]
        );

        $user = User::create(request(['name', 'email', 'password']));
        auth()->login($user);

        return redirect()->to('/');
    }
}
