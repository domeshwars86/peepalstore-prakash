<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mst_Category;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function get_category()
    {
        $data=Mst_Category::orderBy('id','DESC')->get();
        return view('admin.management.category_list', compact('data'));
    }

    public function create_category(Request $req)
    {
        // dd($req);
        $req->validate([

            'brand_name'=>'required'
        ]);
        DB::transaction(function () use ($req) {
            $brand_name = new Mst_Category();
            $brand_name->cat_name=$req->brand_name;
            $brand_name->level=1;
            $brand_name->save();

            if($req->hasFile('image')){
                $brand_name->addMediaFromRequest('image')->toMediaCollection();
            }
        });
        
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
        'cat_name'=>'required',  
          
         ],
         [
            'cat_name.required'=> 'Category Name Required*'
         ]);
              
        if (Mst_Category::find($id)->update($request->all()))
        {
            Session::flash('message', 'Category Name updated');
            redirect()->route('get_category');
        }
        Session::flash('error', 'Failed to update Category Name');
        return Redirect::back();
    }

    public function delete_record(Request $request)
    {
        $json = array();
        $id = $request['id'];
        if (!empty($id)) {
            $result = Mst_Category::find($id);
            $result->delete();
            // Speciality::destroy($id);
            $json['type'] = 'success';
            $json['message'] = 'Category name deleted successfully';
            return $json;
        }

        $ids = $request['ids'];
        if (!empty($ids)) {
            $result = Mst_Category::find($ids);
            $result->delete();
            // Symptom::destroy($ids);
            $json['type'] = 'success';
            $json['message'] = 'Selected Category name deleted successfully';
            return $json;
        }

        $json['type'] = 'error';
        return $json;
    }

}
