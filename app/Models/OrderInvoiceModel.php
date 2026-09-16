<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderInvoiceModel extends Model
{
    protected $table            = 'order_invoice';
    protected $primaryKey       = 'order_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['bill_date','customer_name','phone_no','total_price','discount','gst','gst_amount','gross_total'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getAll($order_id){
        return    
        $this->table('order_invoice')
          ->select('order_invoice.*, order_items.*, products.product_name')
          ->join('order_items', 'order_items.order_id = order_invoice.order_id')
          ->join('products', 'products.product_id = order_items.product_id')
          ->where('order_invoice.order_id', $order_id)
           ->findAll();
    }
    
    
}
