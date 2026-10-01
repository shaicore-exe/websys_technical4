<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        $model = new UserModel();

        return view('users/user_list', [
            'userList' => $model->findAll()
        ]);
    }

    public function add()
    {
        return view('users/add_user');
    }

    public function save()
    {
        $validationRules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $newUser = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $model->insert($newUser);

        return redirect()
            ->to('/users')
            ->with('message', 'User added successfully.');
    }

    public function edit($id)
    {
        $model = new UserModel();

        return view('users/edit_user', [
            'selectedUser' => $model->find($id)
        ]);
    }

    public function saveChanges($id)
    {
        $validationRules = [
            'username'  => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
            'full_name' => 'required|max_length[100]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $updatedUser = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $profilePicture = $this->request->getFile('avatar');

        if ($profilePicture->getError() !== UPLOAD_ERR_NO_FILE) {
            $uploadRules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]'
            ];

            if (!$this->validate($uploadRules)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $savedFileName = $profilePicture->getRandomName();
            $originalFileName = 'original_' . $savedFileName;
            $avatarFolder = FCPATH . 'uploads/avatars/';

            $profilePicture->move($avatarFolder, $originalFileName);

            service('image')
                ->withFile($avatarFolder . $originalFileName)
                ->fit(300, 300, 'center')
                ->save($avatarFolder . $savedFileName);

            unlink($avatarFolder . $originalFileName);

            $updatedUser['avatar'] = $savedFileName;
        }

        $model = new UserModel();
        $model->update($id, $updatedUser);

        return redirect()
            ->to('/users')
            ->with('message', 'User updated successfully.');
    }
}
