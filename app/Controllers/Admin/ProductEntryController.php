<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductEntryController extends BaseController
{
    public function index()
    {
        $title = "View All Products";
        $top_title = "View All Products";
        
         $model = new \App\Models\ProductEntryModel;
         $data = $model->findAll();
      
         $model1 = new \App\Models\ProductModel;
         $res = $model1->findAll();
         
        return view('admin/products_entry/view', compact('data','title','top_title', 'res'));
    }

    public function create(){
        $title = "Add Products";
        $top_title = "Add Products";
        
        $model = new \App\Models\ProductModel;
        $data = $model->getAllActiveProducts();
        //echo "<pre>";print_r($data); die();
        return view('admin/products_entry/create', compact('title', 'top_title', 'data'));
    }

    public function store(){
        
       $entry_date = $this->request->getPost('entry_date');
       $ids = $this->request->getPost('product_id');
       $product_qty = $this->request->getPost('product_qty');
       $product_price = $this->request->getPost('product_price');
       $selling_price = $this->request->getPost('selling_price');
       
        $model = new \App\Models\ProductEntryModel;
        
        for($i = 0; $i< count ($entry_date); $i++){
            
            $pdata = explode('_', $ids[$i]);
            $category_id = $pdata[0];
            $product_id =   $pdata[1];
            
            $data = [
                 'entry_date' => $entry_date[$i],
                 'product_id' => $product_id,
                 'category_id' => $category_id,
                 'product_qty' => $product_qty[$i],
                 'real_qty' => $product_qty[$i],
                  'product_price' => $product_price[$i],
                   'selling_price' =>  $selling_price[$i]
           ];
               $response = $model->insert($data);
        }
       
                  if($response == TRUE){
                        return redirect()->to('admin/products/view')->with('success', 'Product Inserted successfully..');
                      }else{
                         
                        return redirect()->to('admin/products/view')->with('danger', 'Something Went Wrong..');
                      }
        
       
    }
    
    public function edit($product_entry_id){
        
        $title = "Edit Product";
        $top_title = "Edit Product";
        
         $model = new \App\Models\ProductEntryModel;
         $resp = $model->where('product_entry_id', $product_entry_id)->first();
         
          $model1 = new \App\Models\ProductModel;
        $res = $model1->getAllActiveProducts();
         
        return view('admin/products_entry/edit', compact('title', 'top_title','resp','res'));
    }
    
    public function update($product_entry_id){
        
        
        
       $entry_date = $this->request->getPost('entry_date');
       $ids = $this->request->getPost('product_id');
       $product_qty = $this->request->getPost('product_qty');
       $product_price = $this->request->getPost('product_price');
       $selling_price = $this->request->getPost('selling_price');
       
        $model = new \App\Models\ProductEntryModel;
        
      
            
            $pdata = explode('_', $ids);
            $category_id = $pdata[0];
            $product_id =   $pdata[1];
            
            $data = [
                 'entry_date' => $entry_date,
                 'product_id' => $product_id,
                 'category_id' => $category_id,
                 'product_qty' => $product_qty,
                 'real_qty' => $product_qty,
                  'product_price' => $product_price,
                   'selling_price' =>  $selling_price
           ];
               $response = $model->update($product_entry_id, $data);
       
                  if($response == TRUE){
                        return redirect()->to('admin/products/view')->with('success', 'Product Updated successfully..');
                      }else{
                         
                        return redirect()->to('admin/products/view')->with('danger', 'Something Went Wrong..');
                      }
        
       
    }
    
    public function delete($product_entry_id){
        $model = new \App\Models\ProductEntryModel();
        $result = $model->where('product_entry_id', $product_entry_id )->first();
        // echo "<pre>"; print_r($result); die();
        $model->delete($product_entry_id);

        return redirect()->to('admin/products/view')->with('danger', 'Product Deleted successfully..');
    }
}



