@extends('layouts.app')

@section('content')
<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Edit Product</h5>
                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label for="code" class="form-label">Product Code</label>
                                <input type="text" wire:model="code" class="form-control" id="code">
                                @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" wire:model="name" class="form-control" id="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" wire:model="quantity" class="form-control" id="quantity">
                                @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" wire:model="price" class="form-control" id="price">
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea wire:model="description" class="form-control" id="description" rows="3"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newImage" class="form-label">Product Image</label>
                                <input type="file" wire:model="newImage" class="form-control" id="newImage">
                                @error('newImage') <span class="text-danger">{{ $message }}</span> @enderror
                                
                                @if($newImage)
                                    <img src="{{ $newImage->temporaryUrl() }}" class="img-thumbnail mt-2" width="150">
                                @elseif($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection