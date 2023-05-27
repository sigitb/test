@extends('layout.main')
@section('title')
    DATA YANG SUDAH ADA
@endsection
@section('content')
    <table class="table table-bordered dt-responsive  nowrap w-100">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Rating</th>
                <th>Brand</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($err as $item)
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>Rp {{ number_format($item['price'],2,',','.') }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td>{{ $item['rating'] }}</td>
                    <td>{{ $item['brand'] }}</td>
                    <td>{{ $item['description'] }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="row">
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('admin.product.import') }}" class="btn btn-primary"> Back</a>
        </div>
    </div>
@endsection