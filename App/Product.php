<?php

namespace App;

use App\Model;
use Core\DB;

class Product extends Model
{
    protected $table_name = 'produtos';
    protected $pkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $sql = "
            SELECT pro.nome, pro.preco, pro.descricao, cat.nome AS cat_nome
              FROM {$this->table_name} AS pro
              JOIN categorias AS cat
                   ON cat.id = pro.id
        ";
        
        try {
            DB::begin();
            
            $query = DB::get()->prepare($sql);
            $query->execute();
            $users = $query->fetchAll();

            DB::commit();

            if ($users !== FALSE) {
                return $users;
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }

		return NULL; 

    }
}