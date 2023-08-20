<?php 

namespace App\Traits;

trait CommonTrait {

    public function successArray($data) : Array {
        return array('data' => $data,'status' => true);
    }
}