<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Seller;
use App\User;
use Auth;
class SellerProfileController extends Controller
{
   public function editProfile()
   {
     $editVendor = Seller::where('user_id', Auth::id())->first();
     return view('seller.profile.update_profile',compact('editVendor'));
   }
   public function updateProfile(Request $request)
   {
    //  $request->validate([
    //     'vendorname' => 'required|max:255|min:5',
    //     'vendor_type' => 'required|max:255|min:1',
    //     'producttype' => 'required|max:255|min:1',
    //     'location' => 'required|max:255|min:1',
    //
    //     'address' => 'required|max:500|min:7',
    //     'url' => 'required|max:255|min:2',
    //     'cac' => 'required|max:255|min:2',
    //     'workforce' => 'required|max:255|min:2',
    //     'yearsofexp' => 'required|max:255|min:2',
    //     'ratings' => 'required|max:255|min:1',
    //     'contactname' => 'required|max:255|min:5',
    //     'contactphone' => 'required|max:15|min:5',
    //     'contactemail' => 'required',
    //     'chairmanname' => 'required',
    //     'chairmanphone' => 'required',
    //     'chairmanemail' => 'required',
    //
    // ]);
    $sv = Seller::where('user_id', Auth::id())->first();
    //$sv->vendorname = $request->vendorname;
    //$sv->contactphone = $request->contactphone;

    $file = $request->file( 'company_banner' );
    if($file!=NULL) {
        $name        = time() . '_' . $file->getClientOriginalName();
        $upload_path = 'public/seller/company_img/';
        $file->move( $upload_path, $name );
        $company_banner = $upload_path . $name;
        if ($sv->company_banner != Null) {
            unlink( $sv->company_banner );
        }

    }else {
      $company_banner = $sv->company_banner;
    }

    $file = $request->file( 'company_img_1' );
    if($file!=NULL) {
        $name        = time() . '_' . $file->getClientOriginalName();
        $upload_path = 'public/seller/company_img/';
        $file->move( $upload_path, $name );
        $company_img_1 = $upload_path . $name;
        if ($sv->company_img_1 != Null) {
            unlink( $sv->company_img_1 );
        }

    }else {
      $company_img_1 = $sv->company_img_1;
    }

    $file = $request->file( 'company_img_2' );
    if($file!=NULL) {
        $name        = time() . '_' . $file->getClientOriginalName();
        $upload_path = 'public/seller/company_img/';
        $file->move( $upload_path, $name );
        $company_img_2 = $upload_path . $name;
        if ($sv->company_img_2 != Null) {
            unlink( $sv->company_img_2 );
        }

    }else {
      $company_img_2 = $sv->company_img_3;
    }

    $file = $request->file( 'company_img_3' );
    if($file!=NULL) {
        $name        = time() . '_' . $file->getClientOriginalName();
        $upload_path = 'public/seller/company_img/';
        $file->move( $upload_path, $name );
        $company_img_3 = $upload_path . $name;
        if ($sv->company_img_3 != Null) {
            unlink( $sv->company_img_3 );
        }

    }else {
      $company_img_3 = $sv->company_img_3;
    }



    $sv->vendor_type = $request->vendor_type;
    $sv->producttype = $request->producttype;
    $sv->location = $request->location;
    $sv->country = $request->country;
    $sv->address = $request->address;
    $sv->url = $request->url;
    $sv->cac = $request->cac;
    $sv->workforce = $request->workforce;
    $sv->yearsofexp = $request->yearsofexp;
    $sv->ratings = $request->ratings;
    $sv->contactname = $request->contactname;
    $sv->contactemail = $request->contactemail;
    $sv->chairmanname = $request->chairmanname;
    $sv->chairmanphone = $request->chairmanphone;
    $sv->chairmanemail = $request->chairmanemail;

    $sv->company_banner = $company_banner;
    $sv->company_img_1 = $company_img_1;
    $sv->company_img_2 = $company_img_2;
    $sv->company_img_3 = $company_img_3;

    $sv->established_year = $request->established_year;
    $sv->annual_revenue = $request->annual_revenue;
    $sv->main_products = $request->main_products;
    $sv->main_market = $request->main_market;



    $sv->save();
    return back()->with('message_success', 'Vendor updated Succesfully');
   }
   public function editVendorPrimaryDetails()
   {
      $editVendor = Seller::where('user_id', Auth::id())->first();
     return view('seller.profile.primary_details', compact('editVendor'));
   }
   public function updatePrimaryDetails(Request $request)
   {
       $request->validate([
          'vendorname' => 'required|max:255|min:5',
          //'email' => 'required|string|email|max:100|unique:users',
          'contactphone' => 'required',
      ]);
      $users = User::where('id', Auth::id())->first();
      $users->name = $request->vendorname;
      //$users->email = $request->email;
      $users->phone = $request->contactphone;
      $users->save();
      $sellers = Seller::where('user_id', Auth::id())->first();
      $sellers->vendorname = $request->vendorname;
    //  $sellers->email = $request->email;
      $sellers->contactphone = $request->contactphone;
      $sellers->save();
      //dd($users);
      return back()->with('message_success', 'Vendor Primary Details Updated Succesfully');
   }
}
