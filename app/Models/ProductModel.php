<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_name','category_id','status'];

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
    
     public function getAllProduct(){
        return    
        $this->table('products')
          ->select('products.*, category.category_name')
          ->join('category', 'category.category_id = products.category_id', 'left')
           ->findAll();
    }
    
     public function getAllActiveProducts(){
        return    
        $this->table('products')
          ->select('products.*, category.category_name')
          ->join('category', 'category.category_id = products.category_id')
          ->where('products.status', 1)
          ->where('category.status', 1)
          ->orderBy('products.category_id', 'ASC')
           ->findAll();
    }
    
    public function getNonZeroProducts(){
        return    
        $this->table('products')
          ->select('products.*,product_entries.*, category.category_name')
          ->join('category', 'category.category_id = products.category_id')
          ->join('product_entries', 'product_entries.product_id = products.product_id')
          ->where('products.status', 1)
          ->where('category.status', 1)
          ->where('product_entries.product_qty >', 0)
          ->orderBy('products.category_id', 'ASC')
           ->findAll();
    }
    
}
