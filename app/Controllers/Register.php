<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GoldModel;
 
class Register extends BaseController
{
 
    public function __construct(){
        helper(['form']);
    
    }
 
    public function index()
    {
        $data = [];
        return view('register', $data);
    }
   
    public function register()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[sotc_users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
        ];
           
 
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
          
        $userModel = new UserModel();
        $userId = $userModel->insert($userData);

        if ($userId) {
            // Now create a corresponding entry in sotc_goldcount
            $goldData = [
                'user_id' => $userId,
                'gold_count' => 0, // Example initial gold count
            ];

            $goldModel = new GoldModel();
            $goldModel->insert($goldData);

            // Optionally, redirect to login page or wherever needed
            return redirect()->to('/login')->with('success', 'Account created successfully! Please log in.');
        } else {
            // Handle registration failure
            return redirect()->back()->withInput()->with('error', 'Failed to register. Please try again.');
        }


    }
}



  