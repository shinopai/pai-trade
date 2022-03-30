<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\PrimaryCategory;
use App\Http\Requests\ProductRequest;
use Illluminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(User $user){
        $categories = PrimaryCategory::all();

        return view('user.products.create', compact('user', 'categories'));
    }

    public function store(ProductRequest $request, User $user){
        $name = $request->input('name');
        $comment = $request->input('comment');
        $primary_category_id = $request->input('primary_category_id');

        if($request->input('address') != null){
            $address = $request->input('address');
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('/public/images', $imageName);
        }

        $user->products()->create([
            'image' => isset($imageName) ? $imageName : null,
            'name' => $name,
            'comment' => $comment,
            'address' => isset($address) ? $address : null,
            'primary_category_id' => $primary_category_id
        ]);

        return redirect()->route('dashboard')->with('flash', '出品が完了しました');
    }

    public function edit(User $user, Product $product){
        $categories = PrimaryCategory::all();

        return view('user.products.edit', compact('user', 'product', 'categories'));
    }

    public function update(ProductRequest $request, User $user, Product $product){
        $name = $request->input('name');
        $comment = $request->input('comment');
        $primary_category_id = $request->input('primary_category_id');

        if($request->input('address') != null){
            $address = $request->input('address');
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('/public/images', $imageName);
        }

        $product->update([
            'image' => isset($imageName) ? $imageName : null,
            'name' => $name,
            'comment' => $comment,
            'address' => isset($address) ? $address : null,
            'primary_category_id' => $primary_category_id
        ]);

        return redirect()->route('users.products', $user)->with('flash', '商品情報の更新が完了しました');
    }

    public function destroy(User $user, Product $product){
        $product->delete();

        return redirect()->route('users.products', $user)->with('flash', '商品の削除が完了しました');
    }

    public function index(){
        $products = Product::latest()->paginate(20);

        return view('products.index', compact('products'));
    }

    public function show(Product $product){
        return view('products.show', compact('product'));
    }
}
