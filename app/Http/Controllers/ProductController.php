<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Mst_Category;
use App\Mst_Brand;
use App\Rln_Product_Category;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\ProductHistory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function get_product()
    {
    	$cat = Mst_Category::get();
    	$b_data = Mst_Brand:: get();
        $data=Product::orderBy('id','DESC')->with('rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand')->get();
        return view('admin.management.product_list', compact('data','cat','b_data'));
    }

    public function create_product(Request $req)
    {
        // dd($req);
        $req->validate([
            'category'=>'required',
            'mrp_price'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'brand_name'=>'required'
        ],
        [
            'brand_name.required'=> 'Product Name Required*',
            'category'=>'Cartegory Name Required*',
            'mrp_price'=>'MRP Price Required*',
            'price'=>'Peepal Store Price Required*',
            'quantity'=>'Product Quantity Required*',
         ]);
        DB::transaction(function () use ($req) {
            $brand_name = new Product();
            $brand_name->product_name = $req->brand_name;
            // $brand_name->price = $req->price;
            // $brand_name->mrp_price = $req->mrp_price;
            $brand_name->detail = $req->detail;
            // $brand_name->quantity = $req->quantity;
            $brand_name->save();
            // dd($brand_name);

            $pro_cat = new Rln_Product_Category([
                'product_id' => $brand_name->id,
                'rln_category' => $req->category,
                'brand_id' => $req->brand,
            ]);
            $pro_cat->save();

            //-----add log-----
            $pHistory = ProductHistory::create([
                'product_id' => $brand_name->id,
                'price' =>  $req->price,
                'mrp_price' => $req->mrp_price,
                'quantity' => $req->quantity
            ]);

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
            $result = Product::find($id);
            $result->delete();
            // Speciality::destroy($id);
            $json['type'] = 'success';
            $json['message'] = 'Product deleted successfully';
            return $json;
        }

        $ids = $request['ids'];
        if (!empty($ids)) {
            $result = Product::find($ids);
            $result->delete();
            // Symptom::destroy($ids);
            $json['type'] = 'success';
            $json['message'] = 'Selected Product name deleted successfully';
            return $json;
        }

        $json['type'] = 'error';
        return $json;
    }

    public function product_list_search(Request $request)
    {
        // return $request;
        $json = array();
        $data = $request['search'];
        if(!empty($data))
        {
             $result = Product::whereExists(function ($query) use ($data) {
                           $query->where('product_name','like','%'.$data.'%');
                       })->orderBy('id','DESC')->with('rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand')->get();
             return $result;
        }
        else
        {
            $result = Product::orderBy('id','DESC')->with('rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand')->get();
             return $result;
        }
    }

    public function getProductList(Request $req) {
        $data = $req->all();
        $product_query = Product::query();
        $product_query = Product::whereNull('deleted_at')->with(['rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand','productDetails']);
        if(!empty($data['search_text'])){
            $product_query->where('product_name','LIKE','%'.$data['search_text'].'%');
        }
        $get_records = $product_query->orderBy('id','DESC')->paginate($data['perPage']);
        $res_json = json_decode(json_encode($get_records),true);
        // print_r($res_json);die;
        if(count($get_records) > 0){
            $pagination = $get_records->links()->render();
            return response()->json(['status' => 200, 'product_records' => $res_json, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function editProductRecord(Request $req){
        $id = $req->id;
        $res_json = json_decode(json_encode(Product::whereNull('deleted_at')->with(['rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand','productDetails'])->where('id',$id)->first()),true);
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    public function updateProductRecords(Request $req){
        DB::beginTransaction();
        try{
            $data = $req->all();
            $update_mst_product = Product::where('id',$data['edit_id'])->update(['product_name' => $data['product_name'], 'detail' => $data['details']]);

            $brand_id = null;
            if(!empty($data['brand'])){
                $brand_id = $data['brand'];
            }
            $productRlnData = array(
                'product_id' => $data['edit_id'],
                'rln_category' => $data['category_id'],
                'brand_id' => $brand_id,
            );

            $get_rln_data = Rln_Product_Category::whereNull('deleted_at')->where('product_id', $data['edit_id'])->first();
            if(!empty($get_rln_data)){
                $get_rln_data->rln_category = $data['category_id'];
                $get_rln_data->brand_id = $data['brand'];

                if($get_rln_data->isDirty()){
                    $get_rln_data->delete();
                    $newEnrty = Rln_Product_Category::create($productRlnData);
                }

            }
           
            //-----add log-----
            $productHostoryData = [
                'product_id' => $data['edit_id'],
                'price' =>  $data['price'],
                'mrp_price' => $data['mrp_price'],
                'quantity' => $data['quantity'],
            ];

            $getProductHostory = ProductHistory::whereNull('deleted_at')->where('product_id',$data['edit_id'])->first();
            if(!empty($getProductHostory)){
                $getProductHostory->price = $data['price'];
                $getProductHostory->mrp_price = $data['mrp_price'];
                $getProductHostory->quantity = $data['quantity'];

                if($getProductHostory->isDirty()){
                    $getProductHostory->delete();
                    $updateLog = ProductHistory::create($productHostoryData);
                }
            }

            DB::commit();
            return response()->json(['status' => 200, 'msg' => 'Record updated successfully.']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }
        
        
    }
}
