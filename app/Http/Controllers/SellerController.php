<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use App\Models\Categories_products;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function createArticle(): View
    {
        $catg = Category::all();
        return view("seller.createArticle", ["catg" => $catg]);
    }
    public function validArticle(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image',
            'quantité' => 'required|numeric|min:0',
            'category_id' => 'numeric|exists:categories,id'
        ]);

        $path = $request->file("image")->storePublicly("product", "public");

        $product = Product::create([
            'name' => $request->input("name"),
            'description' => $request->input("description"),
            'price' => $request->input("price"),
            'image' => $path,
            'quantité' => $request->input("quantité"),
            'seller' => $request->user()->name
        ]);
        $productId = Product::latest()->first();
        // foreach ($request->input("category_id") as $key => $value) {
        $rela = Categories_products::create([
            "category_id" => $request->input("category_id"),
            "product_id" => $productId->id,
        ]);
        // }

        return redirect("/profile");
    }
    public function createCatg(): View
    {
        $catg = Category::all();
        return view("seller.createCatg", ["catg" => $catg]);
    }
    public function validCatg(Request $request): RedirectResponse
    {
        $valid = $request->validate(['name' => "alpha", "category_id" => "numeric|nullable|exists:categories,id"]);

        $catg = Category::create(['name' => $request->input("name"), 'category_id' => $request->input('category_id')]);

        return redirect("/profile");
    }
    public function dashboardSeller(): View
    {
        $product = Product::with("listCategory")->get();
        return view("seller.dashboard", ["product" => $product]);
    }
    public function editArticle(string $id): View
    {
        $product = Product::with("listCategory")->find($id);
        $catg = Category::all();
        return view("seller.editArticle", ["product" => $product, "catg" => $catg]);
    }
    public function editValid(string $id, Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'image',
            'quantité' => 'required|numeric|min:0',
            'category_id' => 'numeric|exists:categories,id'
        ]);

        $product = Product::with("listCategory")->find($id);

        if (!empty($request->input("image")) && $request->input("image") != "undefinrd") {
            $path = $request->file("image")->storePublicly("product", "public");
            $product->image = $path;
        }

        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->quantité = $request->input("quantité");

        if (!empty($request->input("category_id") && $request->input("category_id") != "undefined")) {
            $product->listCategory[0]->name = $request->input("category_id");
        }

        $product->save();
        
        return redirect("/seller/dashboard");
    }
}
