<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Product</h1>
                    <hr />
                    <form action="{{ route('admin/products/update', $products->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col mb-3 text-center">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="title" class="form-control text-center w-50 mx-auto border-2 shadow-lg" placeholder="Title" value="{{ $products->title }}">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col mb-3 text-center">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control text-center w-50 mx-auto border-2 shadow-lg" placeholder="Category" value="{{ $products->category }}">
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col mb-3 text-center">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control text-center w-50 mx-auto border-2 shadow-lg" placeholder="Product Price" value="{{ $products->price }}">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col mb-3 text-center">
                                <label class="form-label">Discount</label>
                                <input type="text" name="discount" class="form-control text-center w-50 mx-auto border-2 shadow-lg" placeholder="Product Discount" value="{{ $products->discount }}">
                                @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col mb-3 text-center">
                                <label class="form-label">Stock</label>
                                <input type="text" name="stock" class="form-control text-center w-50 mx-auto border-2 shadow-lg" placeholder="Product Stock" value="{{ $products->stock }}">
                                @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning w-25 mx-auto shadow-lg">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
