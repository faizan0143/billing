<?php
namespace App\Libraries;
use Dompdf\Options;

class DomPdf{
    public static function downloadpdf($path, $data, $name, $attach){
        
        $options = new Options();
        $options->set('chroot', realpath(''));
        $dompdf = new \Dompdf\Dompdf($options);

        // $html = "<h1>Danish</h1>";
         
        $dompdf->loadHtml(view($path,$data));
        $dompdf->setPaper('A4','potrait');
        $dompdf->render();
        $dompdf->stream($name,array('Attachment'=>$attach));
    }
}