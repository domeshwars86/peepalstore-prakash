<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mst_Brand;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class BrandController extends Controller
{
    
    
    public function get_brand()
    {
      $data=Mst_Brand::orderBy('id','DESC')->get();
        return view('admin.management.brand_list', compact('data'));  
    }

    public function create_brand(Request $req)
    {
        $req->validate([  
              
            'brand_name'=>'required'  
        ]);  
        $brand_name = new Mst_Brand();
        $brand_name->brand_name=$req->brand_name;
        
        $brand_name->save();
        return redirect()->back()->with('record_created','Record has been created successfully');
       
      
    } 

    // public function getRecordById($id)
    // {
    //     $record = Mst_Brand::where('id',$id)->first();
        
    //     return view('pages.management.Mst_Brand',compact('record'));
        
    // }  
    
    public function update(Request $request,$id)
    {
         $request->validate([  
        'brand_name'=>'required',  
          
         ],
         [
            'brand_name.required'=> 'Brand Name Required*'
         ]);
              
        if (Mst_Brand::find($id)->update($request->all()))
        {
            Session::flash('message', 'Brand Name updated');
            redirect()->route('get_brand');
        }
        Session::flash('error', 'Failed to update Brand Name');
        return Redirect::back();
    }

    public function delete_record(Request $request)
    { 
        $json = array();
        $id = $request['id'];
        if (!empty($id)) {
            $result = Mst_Brand::find($id);
            $result->delete();
            // Speciality::destroy($id);
            $json['type'] = 'success';
            $json['message'] = 'Brand name deleted successfully';
            return $json;
        }

        $ids = $request['ids'];
        if (!empty($ids)) {
            $result = Mst_Brand::find($ids);
            $result->delete();
            // Symptom::destroy($ids);
            $json['type'] = 'success';
            $json['message'] = 'Selected Brand name deleted successfully';
            return $json;
        }

        $json['type'] = 'error';
        return $json;
    }

}
