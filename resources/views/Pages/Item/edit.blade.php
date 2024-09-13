@extends('Layouts.app')
@section('content')

    <div class="container mt-5">
        <h2>Edit Item</h2>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $item->name) }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="code">Item Code</label>
                <input type="text" class="form-control" id="code" name="code"
                    value="{{ old('code', $item->code) }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="Quantity">Quantity</label>
                <input type="number" class="form-control" id="Quantity" name="Quantity"
                    value="{{ old('Quantity', $item->Quantity) }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="stock_status">Stock Status</label>
                <select class="form-control" id="stock_status" name="stock_status" required>
                    <option value="">Select status</option>
                    <option value="in_stock" {{ old('stock_status', $item->stock_status) == 'in_stock' ? 'selected' : '' }}>
                        In Stock</option>
                    <option value="out_of_stock"
                        {{ old('stock_status', $item->stock_status) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock
                    </option>
                </select>
            </div>
            @if ($item->image_path)
                <div class="form-group mb-3">
                    <label for="current_image">Current Image</label>
                    <div>
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}"
                            style="width: 200px; height: 100px; object-fit: cover;">
                    </div>
                </div>
            @endif
            <div class="form-group mb-3">
                <label for="image">Upload New Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $item->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
<br>
@endsection

@push('css')
    <style>
        .container {
            max-width: 80%;
            padding: 20px;
            background-color: gainsboro;
        }

        h2 {
            text-align: center;
        }
    </style>
@endpush
