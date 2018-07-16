<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\HomeSlider;

class HomeSliderController extends Controller
{
    public function addsomeSlider()
    {
      $all_vendor = Seller::where('acStatus', null)->get();
      return view('backend.home_slider.add_slider',compact('all_vendor'));
    }

    public function posthomeSlider(Request $request)
    {
      $request->validate([
          //'slider_image' => 'required',
          'seller_id' => 'required',
          'product_id' => 'required',
          'slider_title' => 'required|min:2',
          'slider_description' => 'required|min:2'
      ]);
      $file = $request->file( 'slider_image' );
      if($file!=NULL) {
          $name        = time() . '_' . $file->getClientOriginalName();
          $upload_path = 'public/frontend/img/slider/';
          $file->move( $upload_path, $name );
          $slider_image= $upload_path . $name;
      }else{
          $slider_image = '';
      }
      $sv = new HomeSlider();
      $sv->admin_id = $request->admin_id;

      $sv->seller_id = $request->seller_id;
      $sv->product_id = $request->product_id;
      $sv->slider_title = $request->slider_title;
      $sv->slider_description = $request->slider_description;
      $sv->slider_image = $slider_image;
      $sv->save();
      return back()->with('message_success', 'Home Slider Added Succesfully');
    }

    public function sliderList()
    {
        $all_slider = HomeSlider::
              join('sellers','sellers.id','=','seller_id')
            ->join('seller_products','seller_products.id','product_id')
            ->select('home_sliders.*','seller_products.pro_name', 'sellers.vendorname')
            ->get();
        return view('backend.home_slider.slider_list',compact('all_slider'));
    }

    public function editSlider($id)
    {
        $editslider = HomeSlider::
            join('sellers','sellers.id','=','seller_id')
            ->join('seller_products','seller_products.id','product_id')
            ->select('home_sliders.*','seller_products.pro_name', 'sellers.vendorname')
            ->find($id);

            //->first();
        return view('backend.home_slider.edit_slider',compact('editslider'));
    }

    public function updateSlider(Request $request, $id)
    {
        $request->validate([
          'slider_title' => 'required|min:2',
          'slider_description' => 'required|min:2'
        ]);
        $sv = HomeSlider::find($id);
        $file = $request->file( 'slider_image' );
        if($file!=NULL) {
            $name        = time() . '_' . $file->getClientOriginalName();
            $upload_path = 'public/frontend/img/slider/';
            $file->move( $upload_path, $name );
            $slider_image = $upload_path . $name;
            if ($sv->slider_image != Null) {
                unlink( $sv->slider_image );
            }

        }else {
          $slider_image = $sv->slider_image;
        }



        $sv->admin_id = $request->admin_id;

        $sv->seller_id = $request->seller_id;
        $sv->product_id = $request->product_id;
        $sv->slider_title = $request->slider_title;
        $sv->slider_description = $request->slider_description;
        $sv->slider_image = $slider_image;
        $sv->save();
        return back()->with('message_success', 'Home Advert Updated Succesfully');
    }

    public function deleteSlider($id)
    {
        $delete = HomeSlider::find($id);
        if ($delete->slider_image != Null) {
            unlink($delete->slider_image);
        }
        $delete->delete();
        return back()->with('message_success', 'Advert Deleted Succesfully');
    }
}
