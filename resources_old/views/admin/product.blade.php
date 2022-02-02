@extends('admin.layouts');
@section('page_title','Product')
@section('container')
@section('product_select','active')
    <div class="col-md-12">
        @if(session()->has('message'))
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade-show">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">x</span>
    </button>

</div>
@endif
    	              <div class="overview-wrap">
                                    <h2 class="title-1">Product</h2>
                                    	<a href="{{url('admin/product/manage_product')}}">
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Add Product</button></a>
                                    </div>
                                <div class="au-card--no-shadow au-card--no-padm-b-40">
                                   <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->slug}}</td>
                                                <td><img width="100px" src="{{asset('storage/media/'.$list->image)}}"></td>

                                                @if($list->status == 1)
                                                <td><a href="{{url('admin/product/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-sm btn-success">Active</button></a></td>
                                                @else
                                                 <td><a href="{{url('admin/product/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-sm btn-warning">DeActive</button></a></td>

                                                @endif
                                                <td>{{$list->created_at}}</td>
                                                <td><a href="{{url('admin/product/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                       <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>

                                                   </td>

                                            </tr> 
                                            @php $i++; @endphp  
                                            @endforeach                          
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                                </div>
                            </div>

@endsection