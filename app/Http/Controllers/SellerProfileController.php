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
