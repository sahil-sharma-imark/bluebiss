<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactFormRequest;
use Stevebauman\Location\Facades\Location;
use DB;

class ServicesController extends Controller
{
    public function index(){
        $categories = DB::table('sub_category')->get();
        $cate = DB::table('category')->distinct()
        ->join('sub_category','category.catid', "=" ,'sub_category.id')
        ->select('sub_category.name as cname','sub_category.id as cid')
        ->orderBy('cname', 'asc')->get();
        $sub_categories = DB::table('category')->orderBy('name', 'asc')->get();
        return view('frontend.all-services',compact('categories','sub_categories','cate'));
    }

    public function search_item(){

        $products = DB::table('category')->orderBy('name', 'asc')->get();
        //dd($products) ;
        $data = [];

        foreach($products as $item){
          $data[] = $item->name;  
        }
        return $data; 
    }

    public function search_items(Request $request){
        
        $search_service = array(
            'searchitem' => $request->item_name,
            'google_address' => $request->google_address ,
            'lat' => $request->g_lat,
            'lng' => $request->g_lng,);

        $all_s_details = DB::table('listed_services')->
        where('service_name',$request->item_name)
        ->where('status',0)->orderBy('service_name', 'asc')->get();
        return view('frontend.provider-listing',compact('all_s_details','search_service'));
    }

    public function task_details(Request $request)
    {
        $search_service = array(
            'searchitem' => $request->item_name,
            'google_address' => $request->google_address ,
            'lat' => $request->g_lat,
            'lng' => $request->g_lng,);

        if(isset($_GET['name'])){
            if(array_key_exists( "name",$_GET)){
            $cat_id = $_GET['name'];}
        }elseif(!$request->item_name == ''){
            $cat_id = $request->item_name;
        }else{
           $cat_id = ""; 
        }

        


        // echo "<pre>";
        // print_r($cat_id);exit;

        //$cat_name = DB::table('category')->where('name',$cat_id)->select('name')->first();
        $select_questions = DB::table('admin_task_page')->where('selected_cat',$cat_id)->get();
        $select_category = DB::table('category')->orderBy('name', 'asc')->get();

        return view('frontend.task-detail', compact('select_category','select_questions','cat_id'));
    }

    public function send_req_pro(Request $request)
    {

        echo $request->cleaning_radio; exit();

        dd($request);exit();
        // echo "Hello";exit();
        
            // $validatedData = $request->validate([
            //     'job_title' => 'required',
            //     'qty_room' => 'required',
            //     'qty_bathroom' => 'required',
            //     'kind_of_cleaning' => 'required',
            //     'cats_dogs' => 'required',
            //     'additional_services[]' => 'required',
            //     'house_cleaned' => 'required',
            //     'hire_radio' => 'required',
            //     'shipping' => 'required',
            // ]);

            $insert = DB::table('provider_request')->insert([
            'job_title'=>$request['job_title'],
            'qty_room'=>$request['qty_room'],
            'qty_bathroom'=>$request['qty_bathroom'],
            'kind_of_cleaning'=>$request['kind_of_cleaning'],
            'cats_dogs'=>$request['cats_dogs'],
            'additional_services'=>$request['additional_services[]'],
            'house_cleaned'=>$request['house_cleaned'],
            'hire_radio'=>$request['hire_radio'],
            'shipping'=>$request['shipping'],         

        ]);
        
    }



}
