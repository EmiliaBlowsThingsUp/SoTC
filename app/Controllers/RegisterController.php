<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GoldModel;

class RegisterController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function index()
    {
        return view('register');
    }

    public function register()
    {
        $rules = [
            'username' => 'required|min_length[4]|max_length[255]|is_unique[sotc_users.username]',
            'email'    => 'required|min_length[4]|max_length[255]|valid_email|is_unique[sotc_users.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'confirm_password' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $goldModel = new GoldModel();

            $userData = [
                'username'   => $this->request->getPost('username'),
                'email'      => $this->request->getPost('email'),
                'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Insert user data into sotc_users table
            $userModel->save($userData);

            // Get the ID of the newly created user
            $userId = $userModel->getInsertID();

            // Insert reference row into sotc_goldcount table
            $goldModel->save([
                'user_id'    => $userId,
                'gold_count' => 0, // Assuming initial gold count is 0
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            // Redirect to login after successful registration
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }
}
