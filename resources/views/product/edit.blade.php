@extends('layout.main')
@section('title')
    LIST PRODUCT
@endsection
@section('content')
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
         @csrf
         <img id="preview-image-thumbnail" src="{{ $product->thumbnail }}"
                   alt="preview image" style="max-height: 100px;">
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" id="thumbnail" placeholder="Input Title">
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $product->title }}" placeholder="Input Title">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="{{ $product->category }}" placeholder="Input Category">
        </div>
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" placeholder="Input Brand">
        </div>
        <div class="mb-3">
            <label class="form-label">stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" placeholder="Input Stock">
        </div>
        <div class="mb-3">
            <label class="form-label">price</label>
            <input type="text" name="price" class="form-control price" value="{{ $product->price }}" placeholder="Input Price">
        </div>
        <div class="mb-3">
            <label class="form-label">Discount Percentage</label>
            <input type="number" name="discountPercentage" class="form-control" value="{{ $product->discountPercentage }}" step=".01" placeholder="Input Discount Percentage">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
        </div>
        <img id="preview-image-other1" src="{{ $product->productImages[0]->image ?? asset('assets/images/default.jpg') }}"
                   alt="preview image" style="max-height: 100px;">
        <div class="mb-3">
            <label class="form-label">Image 1</label>
            <input type="file" name="images1" class="form-control" id="other1" placeholder="Input Title" multiple>
        </div>
        <img id="preview-image-other2" src="{{ $product->productImages[1]->image ?? asset('assets/images/default.jpg') }}"
                   alt="preview image" style="max-height: 100px;">
        <div class="mb-3">
            <label class="form-label">Image 2</label>
            <input type="file" name="images2" class="form-control" id="other2" placeholder="Input Title">
        </div>
        <img id="preview-image-other3" src="{{ $product->productImages[2]->image ?? asset('assets/images/default.jpg') }}"
                   alt="preview image" style="max-height: 100px;">
        <div class="mb-3">
            <label class="form-label">Image 3</label>
            <input type="file" name="images3" class="form-control" id="other3" placeholder="Input Title">
        </div>
        <img id="preview-image-other4" src="{{ $product->productImages[3]->image ?? asset('assets/images/default.jpg') }}"
                   alt="preview image" style="max-height: 100px;">
        <div class="mb-3">
            <label class="form-label">Image 4</label>
            <input type="file" name="images4" class="form-control" id="other4" placeholder="Input Title">
        </div>
        <div class="d-flex justify-content-end flex-wrap gap-2">
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Submit
            </button>
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary waves-effect"> Cancel</a>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function (e) {
   
        $('#other1').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-other1').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        $('#other2').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-other2').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        $('#other3').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-other3').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        $('#other4').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-other4').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        $('#thumbnail').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-thumbnail').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });

        $(document).on('keyup','.price',function(){
            var load = $(this).val();
            var result = load;
            if (load.length !== 1) {
                if (load.charAt(0) === "0") {
                    var result = load.substring(1);
                }
            }
            var selection = window.getSelection().toString();
            if (selection !== '') {
                return;
            }
            if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
                return;
            }
            var $this = $(this);
            var input = $this.val();
            var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt(input, 10) : 0;

            $this.val(function () {
                return (input === 0) ? "" : input.toLocaleString("en-US");
            });
        })
        
        });
    </script>
@endsection