<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[8]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $user = $model->where('email', $email)->first();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $this->setUserSession($user);
                    return redirect()->to('/dashboard');
                } else {
                    session()->setFlashdata('error', 'Invalid Password');
                }
            } else {
                session()->setFlashdata('error', 'Email not found');
            }
        } else {
            $data['validation'] = $this->validator;
            return view('login', $data);
        }

        return redirect()->to('/login');
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'email'     => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
