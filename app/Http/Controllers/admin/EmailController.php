<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Redirect;

class EmailController extends Controller
{
    public function templates(){
        $templates = DB::table('bluebis_emailtemplate')->get();
        return view("admin.email.email_template",compact('templates'));
    }

    public function email_tem_edit($id){
        $edit_template = DB::table('bluebis_emailtemplate')->where('id',$id)->first();
        return view('admin.email.edit_template',compact('edit_template'));
    }

    public function email_tem_update(Request $request, $id){
        $email_tem_update = DB::table('bluebis_emailtemplate')->where('id',$id)->update([
            'header'=>$request->header_text,
            'body'=>$request->header_body,
            'footer'=>$request->header_footer,
        ]);
        return Redirect('email-template')->with('update', 'Template updated successfully');
    }
}
