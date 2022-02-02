<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $result['data'] = Size::all();
   
        return view('admin/size',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_size(Request $request,$id = '')
        {
        //
            if($id > 0){
                $arr = Size::where('id',$id)->get();

                $result['size'] = $arr[0]->size;              
                $result['id'] = $arr[0]->id;

            }else{
                
                $result['size'] = '';    
                $result['id'] = 0;

            }
            
        return view('admin/manage_size',$result);

    }
    public function manage_size_process(Request $request){

        
      $request->validate([
        'size'=>'required|unique:sizes,size,'.$request->post('id')
       ]);

      
       if($request->post('id') > 0){
        $size =  Size::find($request->post('id'));
        $msg = "Size Updated";
       }else{
         
         $size = new Size();
         $msg = "Size Inserted";
       }
       $size->size = $request->post('size');
       $size->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/size');
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
        $size = Size::find($id);
        $size->delete();
         $request->session()->flash('message','Size Deleted');
        return redirect('admin/size');
    }
     public function status(Request $request,$status,$id){
        $size = Size::find($id);
        $size->status=$status;
        $size->save();
        $request->session()->flash('message','Size Status Changed Successfully');
        return redirect('admin/size');
    }
}
