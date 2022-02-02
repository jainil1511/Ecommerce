@extends('admin.layouts');
@section('page_title','Product')
@section('container')
@section('product_select','active')
@if($id > 0)
{{$image_required = ""}}
@else
{{$image_required = "required"}}
@endif
<div class="col-md-12">
<div class="overview-wrap">
   <h2 class="title-1">Manage Product</h2>
    
   <a href="{{url('admin/product')}}">
   <button class="au-btn au-btn-icon au-btn--blue">
   Back</button></a>
</div>
<br>
  @if(session()->has('sku_error'))
   <div class="col-md-12">
          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade-show">
    {{session('sku_error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">x</span>
    </button>
</div>
</div>
@endif


@error('attr_image.*')
   <div class="col-md-12">
          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade-show">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">x</span>
    </button>
</div>
</div>
@enderror


<form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
   <div class="card">
      {{session('message')}}
      <div class="card-body">
         @csrf
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Name</label>
            <input id="category_name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$name}}">
            @error('name')
            <div class="alert alert-danger">
               {{$message}}
            </div>
            @enderror
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Slug</label>
            <input id="slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$slug}}">
            @error('slug')
            <div class="alert alert-danger">
               {{$message}}
            </div>
            @enderror
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Image</label>
            <input type="file" name="image" class="form-control" id="image" {{$image_required}}>
         </div>
         <div class="form-group">
            <div class="row">
               <div class="col-md-4">
                  <label for="cc-payment" class="control-label mb-1">Category</label>
                  <select class="form-control category_id" name="category_id" required="true">
                     <option value="">Select Category</option>
                     @foreach($category as $list)
                     @if($category_id == $list->id)
                     <option  selected value="{{$list->id}}">
                        @else
                     <option  value="{{$list->id}}">
                        @endif
                        {{$list->category_name}}
                     </option>
                     @endforeach
                  </select>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">Brand</label>
                    <select class="form-control brand" name="brand" required="true">
                     <option value="">Select Brand</option>
                     @foreach($brands as $list)
                     @if($brand == $list->id)
                     <option  selected value="{{$list->id}}">
                        @else
                     <option  value="{{$list->id}}">
                        @endif
                        {{$list->name}}
                     </option>
                      @endforeach
                  </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">Model</label>
                     <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$model}}">
                     @error('model')
                     <div class="alert alert-danger">
                        {{$message}}
                     </div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Short Description</label>
               <textarea  id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$short_desc}}</textarea>
               @error('short_desc')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
            </div>
            <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Description</label>
               <textarea  id="desc" name="desc"  class="form-control" aria-required="true" aria-invalid="false" required>{{$desc}}</textarea>
               @error('desc')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
            </div>
            <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Keywords</label>
               <textarea  id="keywords" name="keywords"  class="form-control" aria-required="true" aria-invalid="false" required>{{$keywords}}</textarea>
               @error('keywords')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
            </div>
            <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Technical Specification</label>
               <textarea  id="technical_specification" name="technical_specification" class="form-control" aria-required="true" aria-invalid="false" required>{{$technical_specification}}</textarea>
               @error('technical_specification')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
            </div>
            <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Uses</label>
               <textarea  id="uses" name="uses"  class="form-control" aria-required="true" aria-invalid="false" required>{{$uses}}</textarea>
               @error('uses')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
            </div>
            <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Warrenty</label>
               <textarea  id="warrenty" name="warrenty"  class="form-control" aria-required="true" aria-invalid="false" required>{{$warrenty}}</textarea>
               @error('warrenty')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                      <label for="cc-payment" class="control-label mb-1">Lead Time</label>
                 <input id="lead_time" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="{{$lead_time}}">
                     @error('lead_time')
                     <div class="alert alert-danger">
                        {{$message}}
                     </div>
                     @enderror
               @error('warrenty')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
                  </div>
                  <div class="col-md-4">
                      <label for="cc-payment" class="control-label mb-1">Tax</label>
                <input id="tax" name="tax" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$tax}}">
               @error('tax')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
                  </div>
                  <div class="col-md-4">
                      <label for="cc-payment" class="control-label mb-1">Tax Type</label>
               <input id="tax_type" name="tax_type" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$tax_type}}">
               @error('tax_type')
               <div class="alert alert-danger">
                  {{$message}}
               </div>
               @enderror
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
     <h2 class="title-1">Product Images</h2>

<div class="row">
   <div class="col-md-12">      
      <div class="box">
        
    
      <div class="card">
         <div class="card-body">
             @php $loop_count_num = 1; @endphp
         @foreach($productImagesArr as $key=>$val)
         @php
         $pIArr = (array)$val;

          $loop_count_prev = $loop_count_num;
         @endphp
           <input type="hidden" id="piid" name="piid[]" value="{{$pIArr['id']}}">
            <div class="row"  id="product_images_box">  
               <div class="col-md-5 product_images_{{$loop_count_num++}}">             
                 
                     <label for="images" class="control-label mb-1">Image</label>
                     <input type="file" name="images[]" class="form-control" id="images">
                     @if($pIArr['images']!= '')

                     <img src="{{asset('storage/media/'.$pIArr['images'])}}" width="200px" height="150px">
                     @endif
                  </div>
             
               <div class="col-md-3">
                     <label for="images" class="control-label mb-1">&nbsp;</label><br>
                     @if($loop_count_num == 2)
                     <button type="button" class="btn btn-success btn-md" onclick="add_image_more()"><i class="fa fa-plus"></i> ADD</button>
                     @else
                      <a href="{{url('admin/product/product_images_delete')}}/{{$pIArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger btn-md"><i class="fa fa-minus"></i> Remove</button></a>
                     @endif
                  
               </div>
            </div>
              @endforeach
            </div>
         
      </div>
    
   </div>
</div>


     <h2 class="title-1">Product Attributes</h2>


   <div class="col-md-12">      
      <div class="product_attr_box" id="product_attr_box">
         @php $loop_count_num = 1; @endphp
         @foreach($productAttrArr as $key=>$val)
         @php
         $pAArr = (array)$val;

          $loop_count_prev = $loop_count_num;
         @endphp
      <input type="hidden" id="paid" name="paid[]" value="{{$pAArr['id']}}">
      <div class="card" id="product_attr_{{$loop_count_num++}}">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">SKU</label>
                     <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$pAArr['sku']}}">
                     @error('sku')
                     <div class="alert alert-danger">
                        {{$message}}
                     </div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">mrp</label>
                     <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$pAArr['mrp']}}">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">Price</label>
                     <input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$pAArr['price']}}">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">Quantity</label>
                     <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$pAArr['qty']}}">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">Size</label>
                     <select class="form-control size_id" id="size_id" name="size_id[]">
                        <option value="">Select Size</option>
                        @foreach($size as $list)
                        @if($pAArr['size_id'] == $list->id)
                        <option  value="{{$list->id}}" selected>{{$list->size}}
                        @else
                         <option  value="{{$list->id}}">{{$list->size}}
                        @endif
                        </option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">Color</label>
                     <select class="form-control color_id" name="color_id[]" id="color_id">
                        <option value="">Select Color</option>
                        @foreach($color as $list)
                         @if($pAArr['color_id'] == $list->id)
                        <option  value="{{$list->id}}" selected>{{$list->color}}
                        @else
                        <option  value="{{$list->id}}">{{$list->color}}
                        @endif
                        </option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">Image</label>
                     <input type="file" name="attr_image[]" class="form-control" id="image">
                     @if($pAArr['attr_image']!= '')

                     <img src="{{asset('storage/media/'.$pAArr['attr_image'])}}" width="100%">
                     @endif
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1">&nbsp;</label><br>
                     @if($loop_count_num == 2)
                     <button type="button" class="btn btn-success btn-md" onclick="add_more()"><i class="fa fa-plus"></i> ADD</button>
                     @else
                      <a href="{{url('admin/product/product_attr_delete')}}/{{$pAArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger btn-md"><i class="fa fa-minus"></i> Remove</button></a>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>


      <div class="form-group">
         <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
         Submit
         </button>
         <input type="hidden" name="id" value="{{$id}}">
      </div>
</form>
</div>
  <script src="https://cdn.ckeditor.com/4.17.1/standard-all/ckeditor.js"></script>
<script type="text/javascript">

   var loop_count = 1;
   function add_more(){
   loop_count++;
   var html = '<input id="paid" type="hidden" name="paid[]"><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="row">';

       html += '<div class="col-md-3"><div class="form-group"><label for="cc-payment" class="control-label mb-1">SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required=""></div></div>';
       html += '<div class="col-md-3"><div class="form-group"><label for="cc-payment" class="control-label mb-1">mrp</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value=""></div></div>';
       html += '<div class="col-md-3"><div class="form-group"><label for="cc-payment" class="control-label mb-1">Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value=""></div></div>';
       html += '<div class="col-md-3"><div class="form-group"><label for="cc-payment" class="control-label mb-1">Quantity</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value=""></div></div>';
       html += '</div><div class="row">';
         
       var size_id_html = $("#size_id").html();
       size_id_html = size_id_html.replace("selected","");
       html += '<div class="col-md-3"><div class="form-group"><label for="size_id" class="control-label mb-1">Size</label><select id="size_id" name="size_id[]" class="form-control">'+ size_id_html +'</select></div></div>';   

       var color_id_html = $("#color_id").html();
       color_id_html = color_id_html.replace("selected","");
        html += '<div class="col-md-3"><div class="form-group"><label for="color_id" class="control-label mb-1">Color</label><select id="color_id" name="color_id[]" class="form-control">'+  color_id_html +'</select></div></div>';   

       html += '<div class="col-md-3"><div class="form-group"><label for="cc-payment" class="control-label mb-1">Image</label><input type="file" name="attr_image[]" class="form-control" id="image"></div>    </div>';

       html += '<div class="col-md-3"><div class="form-group"><label for="cc-payment" class="control-label mb-1">&nbsp;</label><br><button type="button" class="btn btn-danger btn-md" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i> Remove</button></div></div>';

        html += '</div></div>';


       $("#product_attr_box").append(html)
   }


   function remove_more(loop_count){
     
      $("#product_attr_"+loop_count).remove();
   }



    var loop_image_count = 1;
   function add_image_more(){

       loop_image_count++;
   var html = ' <input type="hidden" id="piid" name="piid[]"><div class="col-md-5 product_images_'+loop_image_count+'"> <div class="form-group"><label for="images" class="control-label mb-1">Image</label> <input type="file" name="images[]" class="form-control" id="images"><label for="cc-payment" class="control-label mb-1">&nbsp;</label><button type="button" class="btn btn-danger btn-md" onclick="remove_image_more('+loop_image_count+')"><i class="fa fa-minus"></i> Remove</button></div>';


           $("#product_images_box").append(html)


   }

   function remove_image_more(loop_image_count){
     
      $(".product_images_"+loop_image_count).remove();
   }



</script>
    
 <script>
                        // ClassicEditor
                        //         .create( document.querySelector( '#short_desc' ) )
                        //         .then( editor => {
                        //                 console.log( editor );
                        //         } )
                        //         .catch( error => {
                        //                 console.error( error );
                        //         } );
                        //           ClassicEditor
                        //         .create( document.querySelector( '#desc' ) )
                        //         .then( editor => {
                        //                 console.log( editor );
                        //         } )
                        //         .catch( error => {
                        //                 console.error( error );
                        //         } );
                         CKEDITOR.replace('short_desc', {
      width: '100%',
      height: 150,
      removeButtons: 'PasteFromWord'
    });
                          CKEDITOR.replace('desc', {
      width: '100%',
      height: 150,
      removeButtons: 'PasteFromWord'
    });

CKEDITOR.replace('technical_specification', {
      width: '100%',
      height: 150,
      removeButtons: 'PasteFromWord'
    });

                          
                </script>

@endsection