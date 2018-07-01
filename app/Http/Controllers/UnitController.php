<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Unit;
class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }
    public function add_unit(){
        return view('backend.unit.add_unit');
    }
    public function save_unit(Request $request){
        $request->validate([
            'name' => 'required|max:255|min:2',
        ]);
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->save();
        return redirect('/add-unit')->with('message_success','Unit Added Successfully');
    }
    public function unit_list(){
        $unit_list = Unit::all();
        return view('backend.unit.unit_list')->with(compact('unit_list'));
    }
    public function unit_delete($id){
        $unit = Unit::where('id',$id)->first();
        $unit->delete();
        return redirect('/unit-list')->with('message_success','Unit Deleted Successfully');
    }
    public function unit_edit($id){
        $unit_by_id = Unit::where('id',$id)->first();
        return view('backend.unit.edit_unit')->with(compact('unit_by_id'));
    }
    public function unit_update(Request $request){
        $request->validate([
            'name' => 'required|max:255|min:2',
        ]);
        $unit = Unit::where('id',$request->id)->first();
        $unit->name = $request->name;
        $unit->save();
        return redirect('/edit-unit/'.$unit->id)->with('message_success','Unit Updated Successfully');
    }
}
