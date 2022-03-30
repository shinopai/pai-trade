<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductUser;

class LikeController extends Controller
{
    public function add(Request $request){
        $product_user = new ProductUser();
        $product_user->user_id = $request->user_id;
        $product_user->product_id = $request->product_id;
        $product_user->save();

        return 'success!!';
    }

    public function delete(Request $request){
        $product_user = ProductUser::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();
        $product_user->delete();

        return 'success!!';
    }

    public function getLikes(Product $product){
        $likes = ProductUser::where('product_id', $product->id)->count();

        return $likes;
    }

    public function checkIfLikes(User $user, Product $product){
        $result = ProductUser::where('user_id', $user->id)->where('product_id', $product->id)->first();

        return $result;
    }
}
