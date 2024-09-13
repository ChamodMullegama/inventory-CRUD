@extends('Layouts.app')
@section('content')

    <div class="container mt-5">
        <h2>Add New Item</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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

        <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>
            <div class="form-group mb-3">
                <label for="code">Item Code</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}"
                    required>
            </div>
            <div class="form-group mb-3">
                <label for="Quantity">Quantity</label>
                <input type="number" class="form-control" id="Quantity" name="Quantity" value="{{ old('Quantity') }}"
                    required>
            </div>
            <div class="form-group mb-3">
                <label for="stock_status">Stock Status</label>
                <select class="form-control" id="stock_status" name="stock_status" required>
                    <option value="">Select status</option>
                    <option value="in_stock" {{ old('stock_status') == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                    <option value="out_of_stock" {{ old('stock_status') == 'Out Of Stock' ? 'selected' : '' }}>Out of Stock
                    </option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Add Item</button>
        </form>
        <br>

        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item Code</th>
                    <th>Name</th>
                    <th>Stock Status</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>

                        <td>{{ $item->stock_status }}</td>
                        <td>
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('item.delete', $item->id) }}" class="btn btn-danger"> <i
                                    class="bi bi-trash"></i></a>
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary "> <i
                                    class="bi bi-pencil"></i></a>
                            <a href="{{ route('item.get', $item->id) }}" class="btn btn-success "><i
                                    class="bi bi-arrow-right"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
@endsection

@push('css')
    <style>
        .container {
            max-width: 80%;
            padding: 20px;
            background-color: rgba(220, 220, 220, 0.915);
        }

        h2 {
            text-align: center;
        }
    </style>
@endpush

@push('scripts')
@endpush
