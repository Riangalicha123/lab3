<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    private $users;

    function __construct(){
        helper(['form']);
        $this->users = new AdminModel();
    }

    public function index()
    {
        //
    }

    public function loginPage(){
        helper(['form']);
        return view('adminlogg');
    }

    public function signupPage(){
        helper(['form']);
        return view('adminreg');
    }

    public function register(){
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[4]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)){
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                'user_type' => 'Customer'
            ];
            $this->users->insert($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('adminreg',$data);
        }
    }

    public function Login(){
        helper(['form']);
        return view('adminlogg');
    }

    public function LoginAuth(){
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->users->where('email',$email)
                            ->first();
        if($data){
            $pass = $data['password'];
            $authenticatedPassword = password_verify($password,$pass);

            if($authenticatedPassword){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                if($data['user_type'] === 'Admins'){
                    return redirect()->to('products');
                }else if($data['user_type'] === 'Customer'){
                    return redirect()->to('/');
                }
            }else{
                $session->setFlashdata('msg','Password is incorrect');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg','Email does not exist');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy the user's session
        return redirect()->to('/'); // Redirect the user to the login page or any other page after logout
    }
}
