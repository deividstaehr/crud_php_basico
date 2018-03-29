<?php

namespace App;

use Core\DB;
use Core\Arr;

abstract class Model
{
    protected $data = [];

    public function __construct() {}

    public function all()
    {
        $sql = "
            SELECT *
            FROM {$this->getEntity()}
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

    public function find($id)
    {
        $sql = "
            SELECT *
              FROM {$this->getEntity()}
             WHERE {$this->getKey()} = {$id}
        ";

        try {
            DB::begin();

            $query = DB::get()->prepare($sql);
            $query->execute();
            $user = $query->fetch();

            DB::commit();

            if ($user !== FALSE) {
                return $user;
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }

		return NULL;    
    }

    public function getEntity()
	{
        return $this->table_name;
    }
    
    public function getKey()
	{
		return $this->pkey;
    }
    
    public function fromArray($data)
	{
		$this->data = $data;
	}

	public function toArray()
	{
		return $this->data;
    }
    
    public function __set($prop, $value)
    {	
    	if (Arr::in($prop, $this->getStructure('_ALL'))) {
    		$this->data[$prop] = $value;
    	}
    }

	public function __get($property)
	{
		return (isset($this->columns[$property])) 
			? $this->columns[$property]
			: NULL;
	}
}