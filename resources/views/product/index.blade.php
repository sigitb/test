@extends('layout.main')
@section('title')
    LIST PRODUCT
@endsection
@section('content')
    <table id="product-datatable" class="table table-bordered dt-responsive  nowrap w-100">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Discount Percentage</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
        
    </table>
@endsection

@section('script')
    <script>
        $('#product-datatable').DataTable({
            processing: true,
            ajax: "{{ route('admin.product.index') }}",
            serverSide: true,
           scrollX: true,
            columns: [{
                data: 'thumbnail',
                "className": "uniqueClassName",
                searchable: false
            },
            {
                data: 'title',
                "className": "uniqueClassName"
            },
            {
                data: 'category',
                "className": "uniqueClassName3"
            },
            {
                data: 'brand',
                "className": "uniqueClassName3"
            },
            {
                data: 'price',
                "className": "uniqueClassName3"
            },
            {
                data: 'stock',
                "className": "uniqueClassName"
            },
            {
                data: 'dicount',
                "className": "uniqueClassName"
            },
            {
                data: 'rating',
                "className": "uniqueClassName"
            },
            {
                data: 'action',
                "className": "uniqueClassName",
                searchable: false
            },

            ],
            dom: '<"row"<"col-sm-12 col-md-2"l><"col-sm-12 col-md-4"B><"col-sm-12 col-md-6"f>>rtip',
            buttons: [{
                extend: 'colvis',
                text: '<i class="mdi mdi-eye-off"></i>',

                titleAttr: 'colvis'
            },],
            drawCallback: function () {
                $('body').tooltip({
                    selector: '[data-bs-toggle="tooltip"]'
                });
            },
        });
    </script>
@endsection