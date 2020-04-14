<?php

namespace App;

class CartClass
{
    public $items=null;
    public $TotalCount=0;
    public $TotalPrice=0;
    public function __construct($old_cart)
    {
        if($old_cart){
            $this->items=$old_cart->items;
            $this->TotalCount=$old_cart->TotalCount;
            $this->TotalPrice=$old_cart->TotalPrice;
        }
    }

    public function add($item,$id){
        $sorted=['id'=>$id,'count'=>0,'price'=>$item->price,'item'=>$item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $sorted=$this->items[$id];
            }
        }
        $sorted['count']++;
        $sorted['price']=$item->price*$sorted['count'];
        $this->items[$id]=$sorted;
        $this->TotalCount++;
        $this->TotalPrice+=$item->price;
    }
}
