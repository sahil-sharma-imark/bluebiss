<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Redirect;

class SubcategoryController extends Controller
{
    public function index(){
        $sub_category = DB::table('category')
        ->join('sub_category','category.catid','=','sub_category.id')
        ->select('sub_category.name as cat_name',
                 'category.name as name',
                 'category.image as image',
                 'category.cat_status as cat_status',
                 'category.id as id',
                 'category.show_sub_cat as show_sub_cat',
                 'category.show_pop_cat as show_pop_cat'
                 
                 )->orderBy('name','asc')->get();

        return view('admin.subcategory.subcategory', compact('sub_category'));
    }

    public function add(){
        $category = DB::table('sub_category')->where('sub_cat_status',0)->get();
        return view('admin.subcategory.add', compact('category'));
    }

    public function addsubcategory(Request $request){
        $request->validate([
                'name' => 'required|string|max:255|unique:category',
            ]);
        if($request->sub_cat_img){
            $file = $request->file('sub_cat_img');
            $extension = $file->getClientOriginalName();            
            $filename = time().'_'.$extension;
            $location = 'uploads/sub-category';
            $file->move($location,$filename);
            $subcatimg = $filename;
        }else{
            $subcatimg = '';
        }
        $insert = DB::table('category')->insert([
            'catid'=>$request->cat_id,
            'name'=>$request->name,
            'cat_status'=>0,
            'image'=>$subcatimg,
        ]);
        return Redirect('sub-category')->with('add', 'Sub-category add successfully'); 
    }

     public function update_sub_cat($id){
        $sub_cat_detail = DB::table('category')->where('id',$id)->first();
        $cat_details = DB::table('sub_category')->get();

        return view('admin.subcategory.edit-sub-category',compact('sub_cat_detail','cat_details'));
    }

    public function update_subcat(Request $request, $id){
       
        $request->validate([
                'name' => 'required|string|max:255|unique:category,name,'.$id,
            ]);
        $sub_cat_img = DB::table('category')->select('image')->where('id',$id)->first();
        

        if($request->sub_cat_img){
            $file = $request->file('sub_cat_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/sub-category';
            $file->move($location,$filename);
            $sub_cat_img = $filename;   
        }else{
            $sub_cat_img = $sub_cat_img->image;
        }
        $insert = DB::table('category')->where('id',$id)->update([
            'catid'=>$request->cat_id,
            'show_sub_cat'=>$request->show_desk,            
            'name'=>$request->name,
            'image'=>$sub_cat_img,
            'cat_status'=>$request->sub_status,
            
        ]);
        return Redirect('sub-category')->with('update', 'Sub-category updated successfully');



    }

    public function delete_subcategory($id){
        $destroy = DB::table('category')->where('id',$id)->delete();
        return Redirect('sub-category')->with('delete', 'Sub-category delete successfully');
    }

    public function subcat_show_desk(Request $request){
        $change_status_showsub = DB::table('category')->where('id',$_GET['subcat_id'])->update([
            'show_sub_cat'=>$_GET['status']]);


        return response()->json(['success'=>'Status change successfully.']); 
    }

    public function status_subcat(Request $request){
        $status_showsub = DB::table('category')->where('id',$_GET['subcat_id'])->update([
            'cat_status'=>$_GET['status']]);


        return response()->json(['success'=>'Status change successfully.']); 
    }
}
