<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Redirect;

class CategoryController extends Controller
{
    public function index(){
        $category = DB::table('sub_category')->orderBy('name','asc')->get();
        return view('admin.category.category',compact('category'));
    }

    public function add(){
        return view('admin.category.add-category');
    }

    public function add_category(Request $request){
        $request->validate([
                'name' => 'required|string|max:255|unique:sub_category',
            ]);
        if($request->cat_img){
            $file = $request->file('cat_img');
            $extension = $file->getClientOriginalName();            
            $filename = time().'_'.$extension;
            $location = 'uploads/category_img';
            $file->move($location,$filename);
            $catimg = $filename;

            $insert = DB::table('sub_category')->insert([
                'name'=>$request->name,
                'image'=>$catimg,
                'sub_cat_status'=>0,
            ]);
        }else{
           $insert = DB::table('sub_category')->insert([
                'name'=>$request->name,
                'sub_cat_status'=>0,
            ]); 
        }
        return Redirect('categories')->with('add', 'Category add successfully');
    }

    public function edit_category($id){
        $cat_detail = DB::table('sub_category')->where('id',$id)->first();
        return view('admin.category.edit-category',compact('cat_detail'));
    }

    public function update_category(Request $request, $id){
       
        $request->validate([
                'name' => 'required|string|max:255|unique:sub_category,name,'.$id,
            ]);
        $cat_img = DB::table('sub_category')->select('image')->where('id',$id)->first();
        

        if($request->cat_img){
            $file = $request->file('cat_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/category_img';
            $file->move($location,$filename);
            $cat_img = $filename;   
        }else{
            $cat_img = $cat_img->image;
        }
        $insert = DB::table('sub_category')->where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$cat_img,
            'sub_cat_status'=>$request->status,
            'show_desk'=>$request->show_desk,
        ]);
        return Redirect('categories')->with('update', 'Category updated successfully');



    }

    public function delete_category($id){
        $destroy = DB::table('sub_category')->where('id',$id)->delete();
        return Redirect('categories')->with('delete', 'Category delete successfully');
    }

     public function updateStatus(Request $request){

        $change_status = DB::table('sub_category')->where('id',$_GET['cat_id'])->update([
            'sub_cat_status'=>$_GET['status']]);

        // $product = product::find($request->cat_id); 
        // $product->status = $request->status; 
        // $product->save(); 


        return response()->json(['success'=>'Status change successfully.']); 
     }

     public function cat_show_desk(Request $request){
        $change_status_show  = DB::table('sub_category')->where('id',$_GET['cat_id'])->update([
            'show_desk'=>$_GET['status']]);
        return response()->json(['success'=>'Status change successfully.']); 
     }

     public function show_popular_cat(Request $request){
        $change_status_show  = DB::table('category')->where('id',$_GET['subcat_id'])->update([
            'show_pop_cat'=>$_GET['status']]);
        return response()->json(['success'=>'Status change successfully.']); 
     }
}
