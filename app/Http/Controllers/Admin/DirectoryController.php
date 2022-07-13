<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Brand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectoryController extends Controller
{
    public function city()
    {
        $result['cities'] = DB::table('cities')->get();
        $result['profession'] = DB::table('profession')->get();
        return view('admin-views.directory.city', $result);
    }
    
    public function service_providers()
    {
        // $result['cities'] = DB::table('cities')->get();
        $result['service_providers'] = DB::table('service_providers')->get();
        return view('admin-views.directory.service_providers', $result);
    }

    public function insert_city(Request $request)
    {
       
        DB::table('cities')->insert([
            'city' => $request->city,
        ]);

        Toastr::success('City added successfully!');
        return back();
    }
    
     public function insert_profession(Request $request)
    {
       
        DB::table('profession')->insert([
            'profession' => $request->profession,
        ]);

        Toastr::success('Profession added successfully!');
        return back();
    }

    function list()
    {
        $br = Brand::latest()->paginate(25);
        return view('admin-views.brand.list', compact('br'));
    }
    
    public function sp_status(Request $request, $i)
    {
        
        if($i == 1){
            $affected = DB::table('service_providers')
              ->where('id', $request->id)
              ->update(['status' => 1]);
        }elseif($i == 0){
            $affected = DB::table('service_providers')
              ->where('id', $request->id)
              ->update(['status' => 0]);
        }
        Toastr::success('Status Changed Successfully!');
        return back();
    }

    public function edit($id)
    {
        $b = Brand::where(['id' => $id])->first();
        return view('admin-views.brand.edit', compact('b'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Brand name is required!',
        ]);

        $brand = Brand::find($id);
        if ($request->has('image')) {
            $image_name = ImageManager::update('brand/', $brand['image'], 'png', $request->file('image'));
        } else {
            $image_name = $brand->image;
        }

        DB::table('brands')->where(['id' => $id])->update([
            'name' => $request->name,
            'image' => $image_name,
            'updated_at' => now(),
        ]);

        Toastr::success('Brand updated successfully!');
        return back();
    }

    public function delete_city($id)
    {
        
        DB::table('cities')->where('id', $id)->delete();
        Toastr::success('City Deleted successfully!');
        return back();
    }
    public function delete_profession($id)
    {
        
        DB::table('profession')->where('id', $id)->delete();
        Toastr::success('Profession Deleted successfully!');
        return back();
    }
    
    public function sp_delete($id)
    {
        DB::table('service_providers')->where('id', $id)->delete();
        Toastr::success('Deleted successfully!');
        return back();
    }
}
