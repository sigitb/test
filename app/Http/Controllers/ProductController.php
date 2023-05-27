<?php

namespace App\Http\Controllers;

use App\Libs\Alert;
use App\Libs\Upload;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class ProductController extends Controller
{
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $products = Product::get();
            
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('thumbnail', function ($product) {
                    return '<img src="'.$product->thumbnail.'" alt="" width="50" height="50">';
                })
                ->addColumn('price', function ($product) {
                    return "Rp " . number_format($product->price,2,',','.') ;
                })
                ->addColumn('dicount', function ($product) {
                    return $product->discountPercentage ." %";
                })
                ->addColumn('action', function ($product) {
                    $btn_detail = '<a href="'.route("admin.product.detail", $product->id) .'" class="btn btn-info">Detail</a>';
                    $btn_edit = '<a href="'.route("admin.product.edit", $product->id).'" class="btn btn-success">Edit</a>';
        
                    return $btn_detail ." ". $btn_edit;
                })
                ->rawColumns(
                    [
                        'thumbnail', 'price', 'discount', 'rating', 'action'
                    ]
                )
                ->make(true);
        }
        return view('product.index');
    }

    public function import()
    {       
        return view('product.import');
    }
    
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'url' => 'required|string|url',
        ]);

        if ($validator->fails()) {
            Alert::validation($validator->errors()->first());
            return redirect()->back();
        }

        try {
            $product = Http::get('https://dummyjson.com/products');
            if(empty($product->json('products'))){
                Alert::error("URL product invalid");
                return redirect()->back();    
            }
            $errData = [];
            foreach ($product->json('products') as $item) {
                if(Product::where('title', $item['title'])->doesntExist()){
                    $newProduct = Product::create([
                        "title" => $item['title'],
                        "description" => $item['description'],
                        "price" => $item['price'],
                        "stock" => $item['stock'],
                        "discountPercentage" => $item['discountPercentage'],
                        "rating" => $item['rating'],
                        "brand" => $item['brand'],
                        "category" => $item['category'],
                        "thumbnail" => $item['thumbnail']
                    ])->fresh();
                    foreach($item['images'] as $image){
                        ProductImage::create([
                            "product_id" => $newProduct->id,
                            "image" => $image
                        ]);
                    }
                }else{
                    array_push($errData,$item);
                }
            }
            if(count($errData) != 0){
                $err = $errData;
                Alert::error("The imported data is the same");
                return view('product.import-error', compact('err'));
            }
            Alert::success("Successfully import product");
            return redirect()->back();
        } catch (\Throwable $th) {
            info($th->getMessage());
            Alert::error("Failed import product");
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        if(is_null($product)){
            Alert::error("Product not found");
            return redirect()->back();
        }

        return view('product.detail', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        if (is_null($product)) {
            Alert::error("Product not found");
            return redirect()->back();
        }

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'thumbnail' => 'nullable|image|max:3000',
            'title' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'price' => 'required|string',
            'stock' => 'required|numeric',
            'discountPercentage' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required|string|max:200',
            'images' => 'nullable',
            'images.*' => 'image|max:3000'
        ]);
        if ($validator->fails()) {
            Alert::validation($validator->errors()->first());
            return redirect()->back();
        }

        if (preg_match("/^.[0-9]/", $request->discountPercentage)) {

        }

        $product = Product::where('id', $id)->first();
        if (is_null($product)) {
            Alert::error("Product not found");
            return redirect()->back();
        }

        if ($request->product_image) {
            $image      = $request->file('product_image');
            $photo = Upload::to('product_image')->allowed(['png', 'jpeg', 'jpg'])->format('jpg')->image($image);
            if ($photo['status'] == 'fail'){
                Alert::error($photo['message']);
                return redirect()->back();
            } 
            $product_image = Upload::path("product_image"). $photo['image'];
        } else {
            $product_image = $product->thumbnail;
        }
        try {
            DB::beginTransaction();
            $product->update([
                "thumbnail" => $product_image,
                "title" => $request->title,
                "category" => $request->category,
                "brand" => $request->brand,
                "price" => str_replace(",", "", $request->price),
                "stock" => $request->stock,
                "discountPercentage" => $request->discountPercentage,
                "description" => $request->description
            ]);
            if ($request->hasFile('images')) {
                ProductImage::where('product_id', $product->id)->delete();
                foreach ($request->file('images') as $image) {
                    $path = $image->store('public/product_image');
                    $url = Storage::url($path);
                    ProductImage::create([
                        "product_id" => $product->id,
                        "image" => $url
                    ]);
                }                
            }

            DB::commit();
            Alert::success("successfully updated product");
            return redirect()->route('admin.product.index');
        } catch (\Throwable $th) {
            info($th->getMessage());
            Alert::error($th->getMessage());
            return redirect()->back();
        }
    }
}
