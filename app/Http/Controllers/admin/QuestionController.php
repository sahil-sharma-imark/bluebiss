<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function add_page(){
        $que_categories = DB::table('category')->get();
        return view('admin.question.add-pages', compact('que_categories'));
    }

    public function backend_que(Request $request){
        $field_value = implode(",",$request->field_name);
        $insert_question = DB::table('admin_task_page')->insert([
            'selected_cat'=>$request->selected_cat,
            'question'=>$request->question,
            'field_name'=>$request->field,
            'database_field_type'=>$request->database_field_type,
            'field_value'=>$field_value,
        ]);
        return Redirect('all-questions')->with('add', 'Question added successfully'); 
    }

    public function all_questions(){
        if(array_key_exists( "name",$_GET)){
            $cat_id = $_GET['name']; 
           
        }else{
            $cat_id = Null;
        }
        $select_questions = DB::table('admin_task_page')->where('selected_cat',$cat_id)->get();
        $all_category = DB::table('category')->orderBy('name', 'asc')->get();
        return view('admin.question.all-questions',compact('all_category','select_questions','cat_id'));
    }

    public function edit_que($id){
        $select_question = DB::table('admin_task_page')->where('id',$id)->first();
        $all_category = DB::table('category')->orderBy('name', 'asc')->get();
        $fieldvalue = DB::table('admin_task_page')->where('id',$id)->select('field_value')->first();
        return view('admin.question.edit-pages',compact('select_question','all_category','fieldvalue'));
    }

    public function update_backend_que(Request $request, $id){
        $field_value = implode(",",$request->field_name);
        $insert_question = DB::table('admin_task_page')->where('id',$id)->update([
            'selected_cat'=>$request->selected_cat,
            'question'=>$request->question,
            'field_name'=>$request->field,
            'database_field_type'=>$request->database_field_type,
            'field_value'=>$field_value,
        ]);
        return Redirect('all-questions')->with('add', 'Question added successfully'); 
    }

    public function delete_que($id){
        $destroy = DB::table('admin_task_page')->where('id',$id)->delete();
        return Redirect('all-questions')->with('destroy', 'Question deleted successfully'); 
    }
}
