<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GoldModel;
use App\Models\EmissaryModel;

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
            $emissaryModel = new EmissaryModel();

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

            // Insert reference row into sotc_emmissaries table
            $emissaryModel->save([
                'user_id'    => $userId,
                'gold_hoarders' => 0, 
                'order_of_souls' => 0, 
                'merchant_alliance' => 0, 
                'reapers_bones' => 0, 
                'hunters_call' => 0, 
                'athenas_fortune' => 0, 
                'guardians_of_fortune' => 0, 
                'servants_of_the_flame' => 0, 
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
