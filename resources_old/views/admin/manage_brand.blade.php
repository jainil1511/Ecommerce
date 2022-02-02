@extends('admin.layouts');
@section('page_title','Brand')
@section('container')
@section('brand_select','active')
@if($id > 0)
{{$image_required = ""}}
@else
{{$image_required = "required"}}
@endif


@error('image.*')
   <div class="col-md-12">
          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade-show">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">x</span>
    </button>
</div>
</div>
@enderror



    <div class="col-md-12">
 								 <div class="overview-wrap">
                                    <h2 class="title-1">Manage Brand</h2>
                                    	<a href="{{url('admin/brand')}}">
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                       Back</button></a>
                                    </div>
                                    <br>
                               <div class="card">
                                   {{session('message')}}
                                    <div class="card-body">
                                       
                                        <form action="{{route('brand.manage_brand_process')}}" method="post" enctype="multipart/form-data">
                                            @csrf



                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Brand</label>
                                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$name}}">
                                                @error('name')
                                                <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                                @enderror

                                            </div>
                                                     
                                               <div class="form-group">
         									   <label for="cc-payment" class="control-label mb-1">Image</label>
          									  <input type="file" name="image" class="form-control" id="image" {{$image_required}}>
        										 </div>                          
                                
        										       @if($image!= '')

                     <img src="{{asset('storage/media/brand/'.$image)}}" width="200px" height="150px">
                     @endif

                     <br></br>
                                            <div>
                                                <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                   Submit
                                                </button>
                                                <input type="hidden" name="id" value="{{$id}}">
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>

@endsection	