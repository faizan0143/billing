<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\DomPdf;
use Dompdf\Options;

class ReportController extends BaseController
{
    public function index()
    {
        $title = "Report";
        $top_title = "Report";
        
         $model = new \App\Models\ProductModel();
         $res = $model->orderBy('product_name', 'ASC')->findAll();
        
        return view('admin/report/report', compact('top_title','title', 'res'));
    }
    
    public function viewReport(){
      $from_date = $this->request->getPost('from_date');
      $to_date = $this->request->getPost('to_date'); 
      $report_type = $this->request->getPost('report_type');
      $product_id = $this->request->getPost('product_id');
     
     
      //$customermodel1 = new \App\Models\CustomerModel();
      //$cusname = $customermodel1->select('name')->where('customer_id', $customer_id)->first();
       
      if($report_type == 1){

        $productentry = new \App\Models\ProductEntryModel();
        $html = $productentry->purchase_report($from_date, $to_date, $product_id);
        //  echo"<pre>";
        //  print_r($html);
        //  die();
        
        return view('admin/report/view_purchase_report' , compact('from_date','to_date', 'html'));
        
        }else{
               
        $productentry = new \App\Models\OrderItemModel();
        $html = $productentry->sale_report($from_date, $to_date, $product_id);
        //  echo"<pre>";
        //  print_r($html);
        //  die();
        
        return view('admin/report/view_sale_report' , compact('from_date','to_date', 'html'));
        }
        
    }
    
  
    
    public function downloadReport(){
        
        $from_date = $this->request->getPost('from_date');
        $to_date = $this->request->getPost('to_date'); 
        $report_type = $this->request->getPost('report_type');
        $product_id = $this->request->getPost('product_id');
        
        
        if($report_type == 1){

        $productentry = new \App\Models\ProductEntryModel();
        $html = $productentry->purchase_report($from_date, $to_date, $product_id);
        
        //  echo"<pre>";
        //  print_r($html);
        //  die();
        
        if(empty($html)){
            return redirect()->to('admin/report')->with('danger', 'No Purchase found to download..');
        }else{
            $pdfname  = 'Purchase_Report'.'_'.date("d-m-Y", strtotime($from_date)).'_'.date("d-m-Y", strtotime($to_date));         
            
            $options = new Options();
            $options->set('chroot', realpath(''));
            $dompdf = new \Dompdf\Dompdf($options);
              
            $dompdf->loadHtml(view('admin/report/download_purchase_report', compact('html','from_date','to_date')));
            $dompdf->setPaper('A4','landscape');
            $dompdf->render();
            $dompdf->stream($pdfname,array('Attachment'=>1));
            exit();
        }
        
        }else{
            $productentry = new \App\Models\OrderItemModel();
            $html = $productentry->sale_report($from_date, $to_date, $product_id);
            //  echo"<pre>";
            //  print_r($html);
            //  die();
            
            if(empty($html)){
                return redirect()->to('admin/report')->with('danger', 'No Sale found to download..');
            }else{
                $pdfname  = 'Sale_Report'.'_'.date("d-m-Y", strtotime($from_date)).'_'.date("d-m-Y", strtotime($to_date));         
                
                $options = new Options();
                $options->set('chroot', realpath(''));
                $dompdf = new \Dompdf\Dompdf($options);
                  
                $dompdf->loadHtml(view('admin/report/download_sale_report', compact('html','from_date','to_date')));
                $dompdf->setPaper('A4','landscape');
                $dompdf->render();
                $dompdf->stream($pdfname,array('Attachment'=>1));
                exit();
            }
            
        }
    }
    
    
}



