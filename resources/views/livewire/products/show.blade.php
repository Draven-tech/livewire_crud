@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Information
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Code:</div>
                    <div class="col-md-6" style="line-height: 35px;">{{ $product->code }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Name:</div>
                    <div class="col-md-6" style="line-height: 35px;">{{ $product->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Quantity:</div>
                    <div class="col-md-6" style="line-height: 35px;">{{ $product->quantity }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Price:</div>
                    <div class="col-md-6" style="line-height: 35px;">{{ $product->price }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Description:</div>
                    <div class="col-md-6" style="line-height: 35px;">{{ $product->description ?? 'N/A' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Image:</div>
                    <div class="col-md-6" style="line-height: 35px;">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" class="img-thumbnail" width="200">
                        @else
                            No Image
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection