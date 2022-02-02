@extends('admin.layouts');
@section('page_title','Category')
@section('container')
@section('size_select','active')
    <div class="col-md-12">
 								 <div class="overview-wrap">
                                    <h2 class="title-1">Manage Size</h2>
                                    	<a href="{{url('admin/size')}}">
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                       Back</button></a>
                                    </div>
                                    <br>
                               <div class="card">
                                   {{session('message')}}
                                    <div class="card-body">
                                       
                                        <form action="{{route('size.manage_size_process')}}" method="post">
                                            @csrf



                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Size</label>
                                                <input id="size" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$size}}">
                                                @error('size')
                                                <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                                @enderror

                                            </div>
                                   
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