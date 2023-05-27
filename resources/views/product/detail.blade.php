@extends('layout.main')
@section('title')
    DETAIL PRODUCT
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 col-12">
            <img src="{{ $product->thumbnail }}" alt="thimbnail" width="200" height="200">
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="title">
                <span><b>Title : </b></span>
            </div>
            <div class="body">
                <span>{{ $product->title ?? "" }}</span>
            </div>
            <div class="title mt-2">
                <span><b>Brand : </b></span>
            </div>
            <div class="body">
                <span>{{ $product->brand ?? "" }}</span>
            </div>
            <div class="title mt-2">
                <span><b>Category : </b></span>
            </div>
            <div class="body">
                <span>{{ $product->category ?? "" }}</span>
            </div>
            <div class="title mt-2">
                <span><b>Stock : </b></span>
            </div>
            <div class="body">
                <span>{{ $product->stock ?? 0 }}</span>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="title">
                <span><b>Price : </b></span>
            </div>
            <div class="body">
                <span>Rp {{ number_format($product->price,2,',','.') }}</span>
            </div>
            <div class="title mt-2">
                <span><b>Discount Percentage : </b></span>
            </div>
            <div class="body">
                <span>{{ $product->discountPercentage ?? 0 }} %</span>
            </div>
            <div class="title mt-2">
                <span><b>Rating : </b></span>
            </div>
            <div class="body">
                <span>{{ $product->rating ?? 0 }}</span>
            </div>
            <div class="title mt-2">
                <span><b>Created at : </b></span>
            </div>
            <div class="body">
                <span>{{ Carbon\Carbon::parse($product->created_at)->format('d F Y - H:i:s')  }}</span>
            </div>
        </div>
        <div class="col-12">
            <div class="title mt-4">
                <span><b>Description : </b></span>
            </div>
            <div class="body">
                <span>{{ $product->description ?? "-" }}</span>
            </div>
        </div>
        <div class="col-12">
            <div class="title mt-4">
                <span><b>Other pictures : </b></span>
            </div>
            <div class="body">
                <div class="d-flax justify-content-center">
                    @forelse ($product->productImages as $item)
                        <img src="{{ $item->image }}" alt="thimbnail" width="150" height="150" class="mr-5">
                    @empty
                        "-"
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route("admin.product.index") }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection