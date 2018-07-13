<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Seller;
use App\SellerProduct;
use Auth;
use App\ContactSupplier;
class ContactsupplierController extends Controller{
    public function contact_supplier($product_id){
        $product = SellerProduct::find($product_id);
        $seller = $product->seller_id;
        $seller_id = Seller::where('user_id',$seller)->first();
        return  view('frontend.page.contact_supplier',compact('product','seller_id'));
    }
    public function save_customer_request(Request $request){
    $request->validate([
        'product_qty' => 'required|min:1|max:1000',
        'product_unit' => 'required',
        'user_message' => 'required|max:7924|min:2',
       'attach_file' => 'required|max:10000|mimes:doc,docx,pdf,txt,xlsx,jpg,png'
    ]);
    if (Auth::check()) {
        if ( $request->agree=='on') {
            $file = $request->file('attach_file');
            if ($file != NULL) {
                $destinationPath = 'public/CustomerFile/';
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $upload_file = $destinationPath . $filename;
            } else {
                $upload_file = '';
            }
            $cts = new ContactSupplier();
            $cts->product_id = $request->product_id;
            $cts->seller_id = $request->seller_id;
            $cts->customer_id = Auth::user()->id;
            $cts->product_title = $request->product_title;
            $cts->product_qty = $request->product_qty;
            $cts->product_unit = $request->product_unit;
            $cts->user_message = $request->user_message;
            $cts->attach_file = $upload_file;
            $cts->save();
            return back()->with('message_success', 'Contact Us message Send Succesfully');
        }else{
            return back()->with('message_error', 'Please Check Agree Button');
        }
    } else {
        return redirect('login-register');
        }
    }
}
