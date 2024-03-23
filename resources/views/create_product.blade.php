@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create Product') }}</h1>

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

                    <form method="POST" action="{{ route('product.store') }}" autocomplete="off"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="POST">

                        <h6 class="heading-small text-muted mb-4">Product</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="Price">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="Price">Price(RM)</label>
                                        <input type="text" id="price" class="form-control" name="price" placeholder="99.90">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="detail">Detail</label>
                                        <textarea name="detail" id="detail" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                            <label class="form-control-label">Publish</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish" id="publish" value="1">
                            <label class="form-check-label">
                                Yes
                            </label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish" id="publish" value="0">
                            <label class="form-check-label">
                                No
                            </label>
                            </div>
                            

                            
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
