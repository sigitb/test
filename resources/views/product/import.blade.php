@extends('layout.main')
@section('title')
    IMPORT PRODUCT
@endsection
@section('content')
    <form class="custom-validation" action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">URL</label>
            <input type="text" name="url" class="form-control" placeholder="Input Url">
        </div>
        <div class="d-flex justify-content-end flex-wrap gap-2">
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Submit
            </button>
        </div>
    </form>
@endsection