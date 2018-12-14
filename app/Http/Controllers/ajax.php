<?php

namespace App\Http\Controllers;
use App\category;
use App\item_master;
use App\consumable;

use Illuminate\Http\Request;

class ajax extends Controller
{
    public function consumable(){
        $category = category::find($_GET['cat']);
        if($category->consumable == 0){
            $items = item_master::where('category',$category->id)->get();
            $response = '<option disabled selected>Select</option>';
            $count = count($items);
            foreach($items as $item){
                $response .= '<option value="'.$item->id.'">'.$item->make.' '.$item->description.'</option>';
                
            }
            return $response;
            
        }else if($category->consumable == 1){
            $items = consumable::where('category',$category->id)->get();
            $response = '<option disabled selected>Select</option>';
            $count = count($items);
            foreach($items as $item){
                $response .= '<option value="'.$item->id.'">'.$item->name.'</option>';
                
            }
            return $response;
        }else{
            return;
        }
    }

    public function hardware(){
        $type = $_GET['type'];

        if($type == 'con'){
       $categories = category::where('consumable','1')->get();
       $response = '<option disabled selected>Select</option>';
       foreach($categories as $category){
            $response .= "<option value='".$category->id."'>".$category->name."</option>";
       }
       return $response;
    }else{
        $categories = category::where('consumable','0')->get();
       $response = '<option disabled selected>Select</option>';
       foreach($categories as $category){
            $response .= "<option value='".$category->id."'>".$category->name."</option>";
       }
       return $response;
    }

    }
}
