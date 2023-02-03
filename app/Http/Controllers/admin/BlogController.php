<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Redirect;

class BlogController extends Controller
{
    public function add_blog(){
        $category = DB::table('category')->orderBy('name','asc')->where('cat_status',0)->get();
        $author = DB::table('bluebis_author')->get();

        return view('admin.blog.add',compact('category','author'));
    }

    public function addblog(Request $request){
        $request->validate([
                'blog_title' => 'required|string|max:255',
                'blog_slug' => 'required|string|max:255',
                'blog_category' => 'required|string|max:255',
                'blog_des' => 'required',
                'author_name' => 'required',
                'blog_category' => 'required',
                
                

            ]);

        if($request->file('blog_image')){
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/blog';
            $file->move($location,$filename);
            $blog_image = $filename;
        }
        else{
            $blog_image = '';
        }
        $add_blog = DB::table('bluebis_blog')->insert([
            'blog_title'=>$request->blog_title,
            'blog_slug'=>$request->blog_slug,
            'author_name'=>$request->author_name,
            'blog_category'=>$request->blog_category,
            'blog_des'=>$request->blog_des,
            'blog_image'=>$blog_image,
            'status'=>0,
        ]);
        return Redirect('all-blog')->with('add', 'New blog added successfully'); 
    }

    public function all_blog(){
        $all_blogs = DB::table('bluebis_blog')->where('status',0)
        ->join('bluebis_author','bluebis_blog.author_name','=','bluebis_author.id')
        ->join('category','bluebis_blog.blog_category','=','category.id')
        ->select('bluebis_blog.id as id',
                 'bluebis_blog.blog_title as blog_title',
                 'bluebis_blog.blog_des as blog_des',
                 'bluebis_blog.blog_image as blog_image',
                 'bluebis_blog.blog_slug as blog_slug',
                 'bluebis_blog.status as status',
                 'bluebis_blog.created_at as created_at',
                 'bluebis_blog.updated_at as updated_at',
                 'category.name as catname',
                 'bluebis_author.author_name as authna',)->get();
        return view('admin.blog.all-blogs',compact('all_blogs'));
    }

    public function edit_blog($id){
        $edit_blog = DB::table('bluebis_blog')->where('id',$id)->first();
        $category = DB::table('category')->where('cat_status',0)->get();
        return view('admin.blog.edit-blog', compact('edit_blog','category'));
    }

    public function editblog(Request $request, $id){
        $get_byid = DB::table('bluebis_blog')->where('id',$id)->first();        
        if($request->file('blog_image')){
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/blog';
            $file->move($location,$filename);
            $blog_image = $filename;
        }
        else{
            $blog_image = $get_byid->blog_image;
        }
        $add_blog = DB::table('bluebis_blog')->where('id',$id)->update([
            'blog_title'=>$request->blog_title,
            'blog_slug'=>$request->blog_slug,
            'author_name'=>$request->author_name,
            'blog_category'=>$request->blog_category,
            'blog_des'=>$request->blog_des,
            'blog_image'=>$blog_image,
            'status'=>0,
        ]);
        return Redirect('all-blog')->with('edit', 'Blog updated successfully');
    }

    public function delete($id){
        $delete = DB::table('bluebis_blog')->where('id', $id)->delete();
        return Redirect('all-blog')->with('delete', 'Blog deleted successfully');
    }
}
