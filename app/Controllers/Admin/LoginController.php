<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;
use App\Libraries\HashPassword;

class LoginController extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }

    public function auth()
    {
        $rules = [
            'username' => 'trim|required',
            'password' => 'trim|required|max_length[20]|min_length[5]',
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($data, $rules)) {
            return view('admin/login');
        } else {

            $username = $this->request->getPost('username');
            $model = new AdminModel();
            $result = $model->where('username', $username)->first();
            // echo "<pre>";
            // print_r($result);
            // die();

            if (empty($result)) {
                return redirect()->to('admin/login')->with('fail', 'username incorrect..');
            } elseif ($result['status'] == 0) {
                return redirect()->to('admin/login')->with('fail', 'Account Inactive..');
            } else {
                $password = $this->request->getPost('password');
                $checkPassword = HashPassword::check($password, $result['password']);

                if ($checkPassword == false) {
                    return redirect()->to('admin/login')->with('fail', 'password incorrect..');
                } else {
                    $adminData = $result;
                    session()->set('loggedAdmin', $adminData);
                    return redirect()->to('admin/dashboard');
                }
            }
        }
    }

    public function logout()
    {
        if (session()->has('loggedAdmin')) {
            session()->remove('loggedAdmin');
            return redirect()->to('admin/login?access=out')->with('fail', 'Logged out successfully');
        }
    }
}
