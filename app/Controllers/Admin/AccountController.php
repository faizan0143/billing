<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;
use App\Libraries\HashPassword;

class AccountController extends BaseController
{
    public function index()
    {
        $res['title'] = "Settings";
        $res['top_title'] = "Settings";

        $loggedAdmin = session()->get('loggedAdmin');
        $id = $loggedAdmin['id'];

        $model = new AdminModel();
        $res['res'] = $model->where('id', $id)->first();
        return view('admin/account', $res);
    }

    public function nameupdate()
    {

        $validation = $this->validate([
            'fname' => [
                'rules' => 'trim|required',
                'errors' =>  [
                    'required' => 'First Name is required field',
                ]
            ]
        ]);

        if (!$validation) {
            return view('/admin/account', ['validation' => $this->validator, 'title' => 'Settings', 'top_title' => 'Settings']);
        } else {

            $loggedAdmin = session()->get('loggedAdmin');
            // echo "<pre>"; print_r($loggedUser); die();
            $id = $loggedAdmin['id'];
            $model = new AdminModel();

            $data = [
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname')
            ];
            // echo "<pre>"; print_r($data); die();
            $res = $model->update($id, $data);

            if (!$res) {
                return redirect()->to('admin/account')->with('fail', 'Name updating failed');
            } else {
                return redirect()->to('admin/account')->with('success', 'Name updated successfully');
            }
        }
    }

    public function updatepassword()
    {

        $validation = $this->validate([
            'password' => [
                'rules' => 'trim|required|max_length[20]|min_length[5]',
                'errors' =>  [
                    'required' => 'Password is required field',
                ]
            ],
            'cpassword' => [
                'rules' => 'trim|required|max_length[20]|min_length[5]|matches[password]',
                'errors' =>  [
                    'required' => 'Confirm-Password is required',
                    'matches'  => 'Password & Confirm-Password not matched'
                ]
            ]
        ]);

        if (!$validation) {
            return view('/admin/account', ['validation' => $this->validator, 'title' => 'Settings', 'top_title' => 'Settings']);
        } else {
            $loggedAdmin = session()->get('loggedAdmin');
            // echo "<pre>"; print_r($loggedAdmin); die();
            $id = $loggedAdmin['id'];
            $model = new AdminModel();

            $password = $this->request->getPost('password');
            $pass = HashPassword::make($password);


            // echo "<pre>"; print_r($data); die();
            // $res = $model->where('id', $id)->set('password', $pass)->update();
            
            $data = [
                  'password' => $pass,
                  'real_pwd' => $password
                ];
                
                $res = $model->where('id', $id)
                            ->set($data)->update();

            if (!$res) {
                return redirect()->to('admin/account')->with('fails', 'Password updating failed');
            } else {
                return redirect()->to('admin/account')->with('successs', 'Password updated successfully');
            }
        }
    }
}
