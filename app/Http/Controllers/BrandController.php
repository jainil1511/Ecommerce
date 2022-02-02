<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
      public function index()
    {
        //
        
        $result['data'] = Brand::all();
   
        return view('admin/brand',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_brand(Request $request,$id = '')
        {
        //
           

            if($id > 0){
                $arr = Brand::where('id',$id)->get();

                $result['name'] = $arr[0]->name;
                $result['status'] = $arr[0]->status;
                $result['image'] = $arr[0]->image;
                $result['id'] = $arr[0]->id;

            }else{
                $result['name'] = '';
                $result['status'] = '';
                $result['image'] = '';
                $result['id'] = 0;

            }
            
        return view('admin/manage_brand',$result);

    }
    public function manage_brand_process(Request $request){


    if($request->post('id') > 0){
        $image_validation = "mimes:jpeg,jpg,png";

    }else{
        $image_validation = "required|mimes:jpeg,jpg,png";
    }
      $request->validate([
        'name'=>'required|unique:brands,name,'.$request->post('id'),
        'image' => $image_validation
       ]);

           if($request->post('id') > 0){
        $brand =  Brand::find($request->post('id'));
        $msg = "Brand Updated";
       }else{
         
         $brand = new Brand();
         $msg = "Brand Inserted";
       }

       if($request->hasfile('image')){
        $image = $request->file('image');
        $ext = $image->extension();
        $image_name = time().'.'.$ext;
        $image->storeAs('/public/media/brand',$image_name);
        $brand->image = $image_name;
       }

       $brand->name = $request->post('name');
       $brand->status = 1;
       $brand->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function delete(Request $request,$id){
        $brand = Brand::find($id);
        $brand->delete();
         $request->session()->flash('message','Brand Deleted');
        return redirect('admin/brand');
    }
     public function status(Request $request,$status,$id){

        $brand = Brand::find($id);
        $brand->status=$status;
        $brand->save();
        $request->session()->flash('message','Brand Status Changed Successfully');
        return redirect('admin/brand');

    }
}
