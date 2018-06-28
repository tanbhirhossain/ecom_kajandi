<?php

namespace App\Http\Controllers;

use App\PageModel;
use Illuminate\Http\Request;

class PageBuilderController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }
    public function add_new_page(){
    return view('backend.page.add_new_page');
   }
   public function save_page(Request $request){
       $request->validate([
           'name' => 'required|max:255|min:2',
           'description' => 'required',
          // 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       $file = $request->file( 'image' );
       if($file!=NULL){
           $allowedfileExtension=['jpeg','jpg','png','bmp','gif','svg'];
           $files = $request->file('image');
           foreach($files as $file){
               $name=time().'_'.$file->getClientOriginalName();
               $extension = $file->getClientOriginalExtension();
               $check=in_array($extension,$allowedfileExtension);
               if($check){
                   $upload_path = 'public/ProductPageImage/';
                   $file->move($upload_path,$name);
                   $image_url = $upload_path.$name;
                   $images[]=$image_url;
               }else{
                   return redirect('/add-new-page')->with('message_error','Product Additional Image Invalid file or image format');
               }
           }
       }else{
           $images[]="";
       }
        $page = new PageModel();
        $page->name = $request->name;
        $page->description = $request->description;
        $page->image = implode("|",$images);
        $page->save();
       return redirect('/add-new-page')->with('message_success',  " $request->name Page  Added Successfully' ");
   }
   public function page_list(){
        $page_list = PageModel::OrderBy('id','desc')->get();
       return view('backend.page.page_list',compact('page_list'));
   }
   public function delete_page($id){
        $page = PageModel::find($id);
       $all_images = explode('|',$page->image);
       if( $page->image != null ){
           foreach ( $all_images as $image ) {
               unlink( $image );
           }
       }
        $page->delete();
       return redirect('/page-list')->with('message_success',  " $page->name Page  Deleted Successfully' ");
   }
   public function edit_page($id){
       $page_by_id = PageModel::find($id);
       return view('backend.page.edit_page',compact('page_by_id'));
   }
   public function update_page(Request $request){
       $request->validate([
           'name' => 'required|max:255|min:2',
           'description' => 'required',
           //'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       $page = PageModel::find($request->id);
       $images=array();
       $all_image = explode('|',$page->image);
       if( $request->file( 'image')!=NULL ){
           if ($page->image!=NUll) {
               foreach ($all_image as $image) {
                   unlink($image);
               }
           }
           if ( $request->hasFile( 'image' ) ) {
               $allowedfileExtension = [ 'jpeg', 'jpg', 'png', 'bmp', 'gif', 'svg' ];
               $files                = $request->file( 'image' );
               foreach ( $files as $file ) {
                   $name      = time() . '_' . $file->getClientOriginalName();
                   $extension = $file->getClientOriginalExtension();
                   $check     = in_array( $extension, $allowedfileExtension );
                   if ( $check ) {
                       $upload_path = 'public/ProductPageImage/';
                       $file->move( $upload_path, $name );
                       $image_url = $upload_path . $name;
                       $images[]  = $image_url;
                   } else {
                       return redirect( '/edit-page/'.$page->id )->with( 'message_error', 'Additional Image file or format invalid ...!' );
                   }
               }
               $page->name = $request->name;
               $page->description = $request->description;
               $page->image = implode("|",$images);
              
               $page->save();
           }
       }else{
           $page->name = $request->name;
           $page->description = $request->description;
           $img = $page->image;
           $page->image = $img;
           $page->save();

       }
       return redirect('/edit-page/'.$page->id)->with('message_success','Page Updated Successfully');
   }
}
