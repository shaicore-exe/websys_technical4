<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
	public function index()
	{
		return view ('login');
	}

	public function authenticate()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$model = new UserModel();

		$user = $model->where('username', $username)->first();

		if ($user && password_verify($password, $user['password']))
		{
			session()->set([
				'user_id' => $user['id'],
				'username' => $user['username'],
				'isLoggedIn' => true
			]);

			return redirect()->to('/customers');
		}

		return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
	}

	public function logout()
	{
		session()->destroy();

		return redirect()->to('/login')->with('message', 'You have been logged out.');
	}

}