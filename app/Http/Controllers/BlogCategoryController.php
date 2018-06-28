<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\BlogCategory;
class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }
    public function add_category(){
        return view('backend.blog.add_category');
    }
    public function save_category(Request $request){
        $request->validate([
            'name' => 'required|max:255|min:2',
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->save();
        return redirect('/add-blog-category')->with('message_success','Category Added Successfully');
    }
    public function category_list(){
        $category_list = BlogCategory::all();
        return view('backend.blog.category_list')->with(compact('category_list'));
    }
    public function category_delete($id){
        $category = BlogCategory::where('id',$id)->first();
        $category->delete();
        return redirect('/blog-category-list')->with('message_success','Category Deleted Successfully');
    }
    public function category_edit($id){
        $category_by_id = BlogCategory::where('id',$id)->first();
        return view('backend.blog.edit_category')->with(compact('category_by_id'));
    }
    public function category_update(Request $request){
        $request->validate([
            'name' => 'required|max:255|min:2',
        ]);
        $category = BlogCategory::where('id',$request->id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect('/edit-blog-category/'.$category->id)->with('message_success','Category Updated Successfully');
    }

    public function add_blog(){
        return view('backend.blog.add_blog');
    }
    public function save_blog(Request $request){
        $request->validate([
            'name' => 'required|max:255|min:2',
            'description' => 'required|min:2',
            'cat_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required'
        ]);
        $file = $request->file('image');
        if($file!=NULL) {
            $name        = time() . '_' . $file->getClientOriginalName();
            $upload_path = 'public/BlogImage/';
            $file->move( $upload_path, $name );
            $image = $upload_path . $name;

        }else{
            $image = '';
        }

        $blog = new Blog();
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->image = $image;
        $blog->cat_id = $request->cat_id;
        $blog->save();
        return redirect('/add-blog')->with('message_success','Blog Post Added Successfully');
    }
    public function blog_list(){
        $blog_list = Blog::all();
        return view('backend.blog.blog_list')->with(compact('blog_list'));
    }
    public function blog_delete($id){
        $blog = Blog::find($id);
        if ( $blog->image != null ) {
            unlink( $blog->image );
        }
        $blog->delete();
        return redirect('/blog-list')->with('message_success','Blog Post Deleted Successfully');
    }
    public function blog_edit($id){
        $blog_by_id = Blog::where('id',$id)->first();
        return view('backend.blog.edit_blog')->with(compact('blog_by_id'));
    }
    public function blog_update(Request $request){

        $request->validate([
            'name' => 'required|max:255|min:2',
            'description' => 'required|min:2',
            'cat_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $blog = Blog::where('id',$request->id)->first();
        $file = $request->file( 'image' );
        if($file!=NULL) {
            unlink( $blog->image );
            $name        = time() . '_' . $file->getClientOriginalName();
            $upload_path = 'public/BlogImage/';
            $file->move( $upload_path, $name );
            $blog_image = $upload_path . $name;
        }else{
            $blog_image = $blog->image;
        }

        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->image = $blog_image;
        $blog->cat_id = $request->cat_id;
        $blog->save();
        return redirect('/edit-blog/'.$blog->id)->with('message_success','Blog Post Updated Successfully');
    }

}
