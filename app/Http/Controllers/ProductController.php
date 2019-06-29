<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Images;
use Auth;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->model = new Product;
    }
    public function index(Request $request)
    {
        $productInstance= new Product();
        $products = $productInstance->orderProducts($request->get('order_by'));
        if($request->ajax()){
            return response()->json($products, 200);
        }

        return view ('products.index', compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'rating' => 'required',
            'description' => 'required',
        ]);
  
        $rating = new ProductReview();
        $rating->product_id = $request->post('product_id');
        $rating->user_id = Auth::user()->id;
        $rating->rating = $request->post('rating');
        $rating->description = $request->post('description');
        $rating->save();
  
        return redirect('/products/{id}')->with('success', 'Produk berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id );
        $rating = ProductReview::rating($id);
        $reviews = ProductReview::where('product_id', $id)->get();
        if($product){
            return view('products.show', compact('product', 'images', 'reviews', 'rating'));
         } else {
             return redirect('/products')->with('errors', 'produk tidak ditemukan');
         }

    }

    public function image($imageName)
    {
        $filepath = storage_path(env('PATH_IMAGE').$imageName);
        return Image::make($filePath)->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
