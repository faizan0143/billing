<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductModel; 
use App\Models\CategoryModel; 

class CategoryController extends BaseController
{
    public function index()
    {
        $title = "View All Categories";
        $top_title = "View All Categories";

        $model = new CategoryModel();
        $res = $model->findAll();
        return view('admin/category/view', compact('title','top_title','res'));
    }

    public function create(){
        $title = "Create Category";
        $top_title = "Create Category";
        return view('admin/category/create', compact('title','top_title'));
    }

    public function store(){
        $res = "Create Category";
        $res12 = "Create Category";

        $validation = $this->validate([
            'category_name' => [
                'rules' => 'trim|required|is_unique[category.category_name]',
                'errors' => [
                    'required' => 'Category Name is required..',
                    'is_unique' => 'Duplicate Category Name..'
                ]
            ]
        ]);

        if (!$validation) {
            return view('admin/category/create', ['validation' => $this->validator, 'title' => $res, 'top_title' => $res12]);
        } else {

            $data = [
                'category_name' => ucwords($this->request->getPost('category_name')),
                'status' => $this->request->getPost('status'),
            ];

            $model = new CategoryModel();
            $res = $model->save($data);

            if ($res) {
                return redirect()->to('admin/category/view')->with('success', 'Category created successfully');
            } else {
                return redirect()->to('admin/category/create')->with('fail', 'Category not created');
            }
        }

    }

    public function edit($category_id){

        $res['title'] = "Edit Category";
        $res['top_title'] = "Edit Category";
        $model = new CategoryModel();
        $res['res'] = $model->where('category_id', $category_id)->first();
        return view('admin/category/edit', $res);
    }

    public function update($category_id){

        $res = "Edit Category";
        $res12 = "Edit Category";

        $model = new CategoryModel();
        $result = $model->where('category_id', $category_id)->first();

        if($result['category_name'] == $this->request->getPost('category_name')){
            
            $validation = $this->validate([
            'category_name' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Category is required..',
                ]
            ]
        ]);
        
        }else{
            
            $validation = $this->validate([
            'category_name' => [
                'rules' => 'trim|required|is_unique[category.category_name]',
                'errors' => [
                    'required' => 'Category is required..',
                    'is_unique' => 'Category already exists..',
                ]
            ]
        ]);
        }

        if (!$validation) {
            return view('admin/category/edit', ['validation' => $this->validator, 'title' => $res, 'top_title' => $res12, 'res' => $result]);
        } else {

            $data = [
                'category_name' => ucwords($this->request->getPost('category_name')),
                'status' => $this->request->getPost('status'),
            ];

            $model = new CategoryModel();
            $res = $model->update($category_id, $data);

            if ($res) {
                return redirect()->to('admin/category/view')->with('success', 'Category updated successfully');
            } else {
                return redirect()->back()->with('fail', 'Category not updated');
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
