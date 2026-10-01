<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        $model = new CustomerModel();

        return view('customers/customer_list', [
            'customerList' => $model->findAll()
        ]);
    }

    public function add()
    {
        return view('customers/add_customer');
    }

    public function save()
    {
        $validationRules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new CustomerModel();

        $newCustomer = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email')
        ];

        $model->insert($newCustomer);

        return redirect()
            ->to('/customers')
            ->with('message', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $model = new CustomerModel();

        return view('customers/edit_customer', [
            'selectedCustomer' => $model->find($id)
        ]);
    }

    public function saveChanges($id)
    {
        $validationRules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new CustomerModel();

        $updatedCustomer = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email')
        ];

        $model->update($id, $updatedCustomer);

        return redirect()
            ->to('/customers')
            ->with('message', 'Customer updated successfully.');
    }
}
