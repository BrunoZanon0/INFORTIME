<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginLivewire extends Component
{
    public $email;
    public $password;


    public function logando()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        } else {
            session()->flash('message_erro', 'Email ou senha inválida!');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
