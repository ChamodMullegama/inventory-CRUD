@extends('Layouts.app')
@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Item Details</h2>

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="img-fluid rounded-start"
                                alt="{{ $item->name }}" style="width: 500px; height: 300px; object-fit: cover;">
                        @else
                            <img src="default-image-path.jpg" class="img-fluid rounded-start" alt="No Image"
                                style="width: 500px; height: 400px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <p class="card-title"><strong>Item Name:</strong> {{ $item->name }}</p>
                            <p class="card-text"><strong>Item Code:</strong> {{ $item->code }}</p>
                            <p class="card-text"><strong>Description:</strong> {{ $item->description }}</p>
                            <p class="card-text"><strong>Quantity:</strong> {{ $item->Quantity }}</p>
                            <p class="card-text"><strong>Stock Status:</strong> {{ $item->stock_status }}</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated
                                    {{ $item->updated_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('item.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
@endsection
@push('css')
    <style>

    </style>
@endpush
