@extends('Layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="card-body text-center">All Items</h2>
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 400px; min-height: 400px;">
                        <img class="card-img-top p-3"
                            src="{{ $item->image_path ? asset('storage/' . $item->image_path) : 'default-image-path.jpg' }}"
                            alt="{{ $item->name }}" style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $item->name }}</h4>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text">{{ $item->stock_status }}</p>
                            <a href="#" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
