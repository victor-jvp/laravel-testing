@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">

                        @if(auth()->user()->is_admin)
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                Add New Product
                            </a>
                        @endif

                        <table class="table">
                            <thead>
                            <th>Name</th>
                            <th>Price USD</th>
                            <th>Price EUR</th>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody class="bg-white">
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->price_eur }}</td>
                                    <td>
                                        @if(auth()->user()->is_admin)
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->is_admin)
                                        <form action="{{ route('products.destroy', $product) }}" method="get">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                                DELETE
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white">
                                    <td colspan="2">{{ __('No products found') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
