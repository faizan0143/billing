<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table            = 'order_items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['order_id','product_id','quantity','rate','total'];

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
    
    public function sale_report($from_date, $to_date, $product_id){
        return    
        $this->table('order_items')
          ->select( 'order_items.*,order_invoice.*, products.product_name,category.category_name')
          ->join('order_invoice', 'order_invoice.order_id = order_items.order_id')
          ->join('products', 'products.product_id = order_items.product_id')
          ->join('category', 'category.category_id = products.category_id')
         ->whereIn('order_items.product_id', $product_id)
         ->where('order_invoice.bill_date BETWEEN "'.$from_date.'" AND "'.$to_date.'"')
          ->orderBy('order_invoice.bill_date', 'ASC')
           ->findAll();
    }
    
}
