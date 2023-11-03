<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', ['products' => Product::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $filename = $request->file('img')->hashName();
            Image::make($request->file('img'))->resize(null, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/uploads/product/' . $filename));
            $data['img'] = $filename;
        }

        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Ապրանքը հաջողությամբ ավելացել է');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', ['item' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            if ($product->img) {
                File::delete(public_path('storage/uploads/product/' . $product->img));
            }

            $filename = $request->file('img')->hashName();
            Image::make($request->file('img'))->resize(null, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/uploads/product/' . $filename));
            $data['img'] = $filename;
        }
        else if ($request->delete_image) {
            File::delete(public_path('storage/uploads/product/' . $product->img));
            $data['img'] = null;
            unset($data['delete_image']);
        }

        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Ապրանքը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->img) {
            File::delete(public_path('storage/uploads/product/' . $product->img));
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Ապրանքը հաջողությամբ ջնջվել է');
    }
}
