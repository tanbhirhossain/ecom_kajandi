<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\FooterPage;
use App\PageLink;
use DB;

class FooterPageController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
      $this->middleware('admin');
  }
    public function addFPS()
    {
      return view('backend.footer.page_link.page_section');
    }

    public function postFPS(Request $request)
    {
      $request->validate([
        'section_name' => 'required|min:2|max:50'
      ]);

      $check = FooterPage::All();
      if ($check->count() < 5 && $check->count() > 0) {
        $section = new FooterPage();
        $section->section_name = $request->section_name;
        $section->added_by = $request->added_by;
        $section->save();

        return back()->with('message_success', 'Page Section Added Succesfully');
      }else {
        return back()->with('message_error', 'Footer Page Section Limit is 5 so please Edit or Delete');
      }


    }

    public function editFPS($id)
    {
      $data = FooterPage::find($id);

      return view('backend.footer.page_link.edit_page_section', compact('data'));
    }

    public function updateFPS(Request $request,$id)
    {
      $request->validate([
        'section_name' => 'required|min:2|max:50'
      ]);


        $section = FooterPage::find($id);
        $section->section_name = $request->section_name;
        $section->added_by = $request->added_by;
        $section->save();

        return redirect()->route('addFPS')->with('message_success', 'Page Section Updated Succesfully');
    }

    public function deleteFPS($id)
    {
      $data = FooterPage::find($id);
      $data->delete();
      return back()->with('message_success', 'Page Section Deleted Succesfully');
    }
//Footer PageLink

    public function addFPL()
    {
      return view('backend.footer.page_link.add_page_link');
    }

    public function postFPL(Request $request)
    {
      $request->validate([
        'section_id' => 'required',
        'link_title' => 'required',
        'link_url' => 'required',
      ]);

      $data = new PageLink();
      $data->section_id = $request->section_id;
      $data->link_title = $request->link_title;
      $data->link_url = $request->link_url;
      $data->save();

      return back()->with('message_success', 'Page Link Added Succesfully');

    }

    public function editFPL($id)
    {
      $data = PageLink::
              join('footer_pages', 'footer_pages.id', '=', 'section_id')
            ->select('page_links.*','footer_pages.section_name')
            ->find($id);
      return view('backend.footer.page_link.edit_page_link',compact('data'));
    }

    public function updateFPL(Request $request, $id)
    {
      $request->validate([
        'section_id' => 'required',
        'link_title' => 'required',
        'link_url' => 'required',
      ]);

      $data = PageLink::find($id);
      $data->section_id = $request->section_id;
      $data->link_title = $request->link_title;
      $data->link_url = $request->link_url;
      $data->save();

      return redirect()->route('addFPL')->with('message_success', 'Page Link Updated Succesfully');
    }

    public function deleteFPL($id)
    {
      $data = PageLink::find($id);
      $data->delete();

      return back()->with('message_success', 'Page Link Deleted Succesfully');

    }

}






























//
