<?php

namespace App\Controllers;

use App\Models\User;
use App\Libraries\Auth;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;



class AuthController extends BaseController
{
    public function loginView()
    {
        return view('auth/login');
    }

    public function login()
    {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $User = new User();
            $user = $User->where('email', $email)->first();
            // dd(Time::now()->getTimestamp() );

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'first_name' => $user['first_name'],
                    'role' => $user['role'],
                    'isLoggedIn' => true
                ]);
            $User->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);
                return redirect()->to(base_url('api/admin/dashboard'));
            } else {
                return redirect()->back()->with('error', 'Invalid login credentials');
            }
    }

    public function registerView()
    {
        return view('auth/register');
    }

    public function register()
    {
            $User = new User();

            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getPost('role'),
            ];

            if ($this->request->getFile('profile_image')->isValid()) {
                $profileImage = $this->request->getFile('profile_image');
                $profileImage->move(WRITEPATH . 'uploads');
                $data['profile_image'] = $profileImage->getName();
            }

            $User->save($data);
            return redirect()->to('api/auth/login')->with('success', 'Registration successful, please login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('api/auth/login'));
    }
}
