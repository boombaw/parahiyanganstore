<?php 
namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\AuthModel;

class Auth extends BaseController 
{
    public $path = "pages/auth";

    function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function login()
    {
        if (session('username')) {
            return redirect()->route('dashboard');
        }
    	$data = [
    		'validation' => \Config\Services::validation()
    	];
        echo view($this->path."/login", $data);
    }

    public function auth()
    {
    	$session = session();

    	$validation =  \Config\Services::validation();
        $validation->setRuleGroup('auth');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        if (!empty($errors)) {
        	return redirect()->route('login')
        					 ->withInput()
        					 ->with('validation', $validation);
        }
            
        $username = trim(esc($this->request->getVar('username')));
        $password = trim(esc($this->request->getVar('password')));
        // admin
        // adminpstore123

        $password = md5(md5($password));

        $user = $this->authModel->where('username', $username)
                                ->where('password', $password)
                                ->where('is_active', 1)
                                ->get();
        if (is_null($user->getRow())) {
            return redirect()->route('login')
                ->withInput()
                ->with('pesan', 'Pengguna atau Kata Sandi Salah');
        }

    	$data = [
    		'username' => $this->request->getVar('username'),
    		'logged_in' => TRUE,
    	];
    	$session->set($data);

    	return redirect()->route('dashboard');
    }

    public function logout()
    {
    	session()->destroy();
    	return redirect()->route('login');
    }
}