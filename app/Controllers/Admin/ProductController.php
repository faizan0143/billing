<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductModel;
use App\Models\CategoryModel; 

class ProductController extends BaseController
{
    public function index()
    {
        $title = "View All Products Name";
        $top_title = "View All Products Name";

        $model = new ProductModel();
        $res = $model->getAllProduct();
        return view('admin/products/view', compact('title','top_title','res'));
    }

    public function create(){
        $title = "Create Product Name";
        $top_title = "Create Product Name";
        
        $model = new CategoryModel();
        $res = $model->where('status', 1)->findAll();
        return view('admin/products/create', compact('title','top_title','res'));
    }

    public function store(){
        $res = "Create Product Name";
         $re = "Create Product Name";
        
         $model = new CategoryModel();
        $res1 = $model->where('status', 1)->findAll();

        $validation = $this->validate([
            'product_name' => [
                'rules' => 'trim|required|is_unique[products.product_name]',
                'errors' => [
                    'required' => 'Product Name is required..',
                    'is_unique' => 'Duplicate Product Name..'
                ]
            ],
            'category_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Select category..',
                ]
            ]
        ]);

        if (!$validation) {
            return view('admin/products/create', ['validation' => $this->validator, 'title' => $res, 'top_title' => $re, 'res' => $res1]);
        } else {

            $data = [
                'product_name' => ucwords($this->request->getPost('product_name')),
                'category_id' => $this->request->getPost('category_id'),
                'status' => $this->request->getPost('status'),
            ];

            $model = new ProductModel();
            $res = $model->save($data);

            if ($res) {
                return redirect()->to('admin/products/name/view')->with('success', 'Product Name created successfully');
            } else {
                return redirect()->to('admin/products/name/create')->with('fail', 'Product Name not created');
            }
        }

    }

    public function edit($product_id){

        $res['title'] = "Edit Product Name";
        $res['top_title'] = "Edit Product Name";
        
        $model = new ProductModel();
        
        $model1 = new CategoryModel();
        $res['res1'] = $model1->findAll();
        
        $res['res'] = $model->where('product_id', $product_id)->first();
        return view('admin/products/edit', $res);
    }

    public function update($product_id){

        $res = "Edit Product Name";
        $re = "Edit Product Name";
        
         $model1 = new CategoryModel();
        $res1 = $model1->findAll();

        $model = new ProductModel();
        $result = $model->where('product_id', $product_id)->first();

       if($result['product_name'] == $this->request->getPost('product_name')){
            $validation = $this->validate([
            'product_name' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Product Name is required..',
                ]
            ],
            'category_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Select category..',
                ]
            ]
        ]);
       }else{
            $validation = $this->validate([
            'product_name' => [
                'rules' => 'trim|required|is_unique[products.product_name]',
                'errors' => [
                    'required' => 'Product Name is required..',
                     'is_unique' => 'Duplicate Product Name..'
                ]
            ],
            'category_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Select category..',
                ]
            ]
        ]);
       }

        if (!$validation) {
            return view('admin/products/edit', ['validation' => $this->validator, 'title' => $res, 'top_title' => $re, 'res' => $result, 'res1' => $res1]);
        } else {

            $data = [
                'product_name' => ucwords($this->request->getPost('product_name')),
                'category_id' => $this->request->getPost('category_id'),
                'status' => $this->request->getPost('status'),
            ];

            $model = new ProductModel();
            $res = $model->update($product_id, $data);

            if ($res) {
                return redirect()->to('admin/products/name/view')->with('success', 'Product Name updated successfully');
            } else {
                return redirect()->back()->with('fail', 'Product Name not updated');
            }
        }
    }

    public function delete($product_id)
    {
        $model = new ProductModel();
        $product = $model->where('product_id', $product_id)->first();

        if (empty($product)) {
            return redirect()->to('admin/products/name/view')->with('fail', 'No Records Found..');
        }
        $model = new ProductModel();
        $model->where('product_id', $product_id)->delete();
        return redirect()->to('admin/products/name/view')->with('fail', 'Record Deleted Successfully..');
    }
}
