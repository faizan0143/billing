<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductEntryModel extends Model
{
    protected $table            = 'product_entries';
    protected $primaryKey       = 'product_entry_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['entry_date','product_id','category_id','product_qty','real_qty','product_price','selling_price'];

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
    
    
   public function  purchase_report($from_date, $to_date, $product_id){
        
        return    
        $this->table('product_entries')
          ->select('product_entries.*,products.*, category.category_name')
          ->join('category', 'category.category_id = product_entries.category_id')
          ->join('products', 'products.product_id = product_entries.product_id')
          ->whereIn('product_entries.product_id', $product_id)
         ->where('product_entries.entry_date BETWEEN "'.$from_date.'" AND "'.$to_date.'"')
          ->orderBy('products.product_name', 'ASC')
          ->findAll();
    }
    
    
    
}
