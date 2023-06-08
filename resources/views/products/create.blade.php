@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">

                        <form action="{{ route('products.store') }}" method="post">
                            @csrf()
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-12">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" id="price">
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">
                                SAVE
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
