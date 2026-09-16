<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\DomPdf;
use Dompdf\Options;

class BillingController extends BaseController
{
    public function index()
    {
        $title = "View All Bills";
        $top_title = "View All Bills";
        
        $order_incv = new \App\Models\OrderInvoiceModel;
         $res = $order_incv->orderBy('order_id', 'DESC')->findAll();
         
         return view('admin/billing/view_bills', compact('title','top_title', 'res'));
    }

    public function create(){
        
        $title = "Create Bill";
        $top_title = "Create Bill";
        
        $model = new \App\Models\ProductModel;
        $data = $model->getNonZeroProducts();
        // echo "<pre>"; print_r($data); die();
       return view('admin/billing/create_bill', compact('title','top_title','data'));
    }

    public function store(){
          
        $data = [
                'bill_date' => $this->request->getPost('bill_date'),
                'customer_name' => ucwords($this->request->getPost('customer_name')),
                'phone_no' => $this->request->getPost('phone_no'),
                 'total_price' => $this->request->getPost('ftotal'),
                 'discount' => $this->request->getPost('discount'),
                 'gst' => $this->request->getPost('gst'),
                 'gst_amount' => ($this->request->getPost('ftotal') * $this->request->getPost('gst'))/100,
                 'gross_total' => $this->request->getPost('gross_total'),
            ];
            
            $model = new \App\Models\OrderInvoiceModel;
            $model->insert($data);
            $order_id = $model->insertID();
            
             $product_id = $this->request->getPost('product_id');
             $quantity = $this->request->getPost('product_qty');
             $rate = $this->request->getPost('selling_price');
              $total = $this->request->getPost('total');
            
            for($i = 0; $i < count($quantity); $i++){
                
                $data1 = [
                    'order_id' => $order_id,
                    'product_id' => $product_id[$i],
                    'quantity' => $quantity[$i],
                    'rate' => $rate[$i],
                    'total' => $total[$i],
                ];
                 $model1 = new \App\Models\OrderItemModel;
                $model1->insert($data1);
                 
                 $pemodel = new \App\Models\ProductEntryModel;
                 $pqty = $pemodel->select('product_qty')->where('product_id', $product_id[$i])->first();
                
                 foreach ($pqty as $qty){
                     $apqty = ($qty - $quantity[$i]);
                 }
                 
                $pemodel->where('product_id',$product_id[$i])->set('product_qty',$apqty)->update();
                  
            }
            
            return redirect()->to('admin/bill/view')->with('success', 'Bill Created Successfully..');
            
    }

    public function edit($order_id){
        
        $title = "Edit Bill";
        $top_title = "Edit Bill";
        
        $model = new \App\Models\OrderInvoiceModel;
        $data = $model->getAll($order_id);
        
        $model = new \App\Models\ProductModel;
        $res = $model->getNonZeroProducts();

       return view('admin/billing/edit_bill', compact('title','top_title','data','res')); 
    }

    public function update($order_id){
        
        if($quantity = $this->request->getPost('product_qty') == 0){
                // return redirect()->to('admin/bill/edit/'. $order_id)->with('danger', 'Insert atleast 1 record..');
                
                $model3 = new \App\Models\OrderItemModel;
                $res = $model3->select('*')->where('order_id', $order_id)->findAll();
                
                for($k = 0; $k < count($res); $k++){
                
                 $pemmodel = new \App\Models\ProductEntryModel;
                 $pqty = $pemmodel->select('product_qty')->where('product_id', $res[$k]['product_id'])->first();
                
                 foreach ($pqty as $qty){
                     $apqty = ($qty + $res[$k]['quantity']);
                 }
                 
                $pemmodel->where('product_id',$res[$k]['product_id'])->set('product_qty',$apqty)->update();
                  
            }
            
                $model2 = new \App\Models\OrderInvoiceModel;
                $model2->where('order_id',$order_id)->delete();
                
                $model1 = new \App\Models\OrderItemModel;
                $model1->where('order_id',$order_id)->delete();
                
                return redirect()->to('admin/bill/view')->with('danger', 'Record deleted successfully..');
            }
            else
            {
            $oimodel = new \App\Models\OrderItemModel;
            $res = $oimodel->select('*')->where('order_id', $order_id)->findAll();
            
            for($i = 0; $i < count($res); $i++){
                
                 $pemodel = new \App\Models\ProductEntryModel;
                 $pqty = $pemodel->select('product_qty')->where('product_id', $res[$i]['product_id'])->first();
                
                 foreach ($pqty as $qty){
                     $apqty = ($qty + $res[$i]['quantity']);
                 }
                 
                $pemodel->where('product_id',$res[$i]['product_id'])->set('product_qty',$apqty)->update();
                  
            }
            
            $miomodel = new \App\Models\OrderItemModel;
             $miomodel->where('order_id',$order_id)->delete();
    
      $data = [
                'bill_date' => $this->request->getPost('bill_date'),
                'customer_name' => ucwords($this->request->getPost('customer_name')),
                'phone_no' => $this->request->getPost('phone_no'),
                 'total_price' => $this->request->getPost('ftotal'),
                 'discount' => $this->request->getPost('discount'),
                 'gst' => $this->request->getPost('gst'),
                 'gst_amount' => ($this->request->getPost('ftotal') * $this->request->getPost('gst'))/100,
                 'gross_total' => $this->request->getPost('gross_total'),
            ];
            
            $model = new \App\Models\OrderInvoiceModel;
            
            $model->update($order_id, $data);
           
             $product_id = $this->request->getPost('product_id');
             $quantity = $this->request->getPost('product_qty');
             $rate = $this->request->getPost('selling_price');
              $total = $this->request->getPost('total');
            
            for($i = 0; $i < count($quantity); $i++){
                
                $data1 = [
                    'order_id' => $order_id,
                    'product_id' => $product_id[$i],
                    'quantity' => $quantity[$i],
                    'rate' => $rate[$i],
                    'total' => $total[$i],
                ];
                 $model1 = new \App\Models\OrderItemModel;
                $model1->insert($data1);
                 
                 $pemodel = new \App\Models\ProductEntryModel;
                 $pqty = $pemodel->select('product_qty')->where('product_id', $product_id[$i])->first();
                
                 foreach ($pqty as $qty){
                     $apqty = ($qty - $quantity[$i]);
                 }
                 
                $pemodel->where('product_id',$product_id[$i])->set('product_qty',$apqty)->update();
                  
            }
            }
            
            return redirect()->to('admin/bill/view')->with('success', 'Bill Updated Successfully..');
        
    }
    
    public function generatePdf($order_id)
    {
       $model = new \App\Models\OrderInvoiceModel;
       $data = $model->getAll($order_id);
    //   echo "<pre>";
    //   print_r($data);
    //   die();
        
        if(empty($data)){
            return redirect()->to('admin/bill/view')->with('danger', 'No data found for download..');
        }else{
            $pdfname  = $data[0]['customer_name'].' Dated '.date("d-m-Y", strtotime($data[0]['bill_date']));         
        
              $options = new Options();
              $options->set('chroot', realpath(''));
              $dompdf = new \Dompdf\Dompdf($options);
                  
              $dompdf->loadHtml(view('admin/billing/download_bill', compact('data')));
              $dompdf->setPaper('A5','potrait');
              $dompdf->render();
              $dompdf->stream($pdfname,array('Attachment'=>1));
              exit();
        }
          
       
    }

    public function delete()
    {
        
    }
}
