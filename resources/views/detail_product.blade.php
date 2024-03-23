@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Detail Product') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">



        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

               

                <div class="card-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="POST">

                        <h6 class="heading-small text-muted mb-4">Product</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="Price">Name</label>
                                        <input type="text" id="name" class="form-control" disabled value="{{$product->name}}" name="name" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="Price">Price(RM)</label>
                                        <input type="text" id="price" class="form-control" disabled value="{{$product->price}}" name="price" placeholder="99.90">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="detail">Detail</label>
                                        <textarea name="detail" id="detail" disabled class="form-control" cols="30" rows="10">{{$product->detail}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <label class="form-control-label">Publish</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" disabled name="publish" id="publish" value="1"  {{ ($product->publish=="1")? "checked" : "" }}>
                            <label class="form-check-label">
                                Yes
                            </label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" disabled name="publish" id="publish" value="0" {{ ($product->publish=="0")? "checked" : "" }}>
                            <label class="form-check-label">
                                No
                            </label>
                            </div>
                            <input type="hidden" name="product_id" id="product_id" class="form-control" value="{{$product->id}}"> 

                            
                        </div>

                </div>

            </div>

        </div>

    </div>

@endsection
