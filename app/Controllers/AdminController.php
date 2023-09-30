<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function login()
    {
        helper(['form']);
        return view('adminlogg');
    }
    
    public function register()
    {
        helper(['form']);
        $data =[];
        return view('adminreg');
    }
    public function authreg()
    {
        helper(['form']);
        $rules =[
            'username' => 'required|min_length[1]|max_length[25]',
            'password' => 'required|min_length[1]|max_length[25]'
        ];
        if($this->validate($rules)){
            $adminModel = new AdminModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $adminModel->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('adminreg', $data);
        }
    }
    public function authlogin()
    {
        $session = session();
        $main = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $main->where('username', $username)->first();
        if($data){
            $pass = $data['password'];
            $authpass = password_verify($password, $pass);
            if ($authpass){
                $ses_data = [
                    'id' => $data ['id'],
                    'username' => $data['username'],
                    'isLoggedIn' => true,
                ];
                $session->set($ses_data);
                return redirect()->to('/register');
            }else{
                $session->setFlashdata('msg', 'Password is incorrect');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'There is no such Username');
            return redirect()->to('/login');
        }

    }
}
