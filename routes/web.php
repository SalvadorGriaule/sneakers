<?php

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Http\Resources\CategoryResource;
use App\Http\Middleware\SellerOnly;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(("index"));
});

Route::get("/new", function () {
    $prod = Product::latest()->get();
    return view("category.new", ["new" => $prod]);
});

Route::get("/category/{id}",function(string $id){
    $catg = Category::find($id);
    $product = $catg->listProducts()->get();
    return view("category.byId", ["catg" => $catg, "product" => $product]);
});

Route::get("/api", function(){
    return CategoryResource::collection(Category::all());
});

Route::controller(UserController::class)->group(function () {
    Route::get("/sign", "create");
    Route::post("/sign", "valid");
    Route::get("/login", "login");
    Route::post("/login", "auth");
    Route::middleware('auth')->group(function () {
        Route::get("/profile", "profile");
        Route::get("/profile/edit", "edit");
        Route::post("/profile/edit", "editing");
        Route::get("/logout", "logout");
    });
});

Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::redirect("", "/admin/login");
        Route::get("/login", "login");
        Route::post("/login", "authAdmin");
        Route::middleware('auth:admin')->group(function () {
            Route::prefix("/dashbord")->group(function () {
                Route::get("", "dashbord");
                Route::get("/addSeller", "createSeller");
                Route::post('/addSeller', "validingSeller");
            });
            Route::get("/logout", "logout");
        });
    });
});

Route::controller(SellerController::class)->group(function () {
    Route::middleware(SellerOnly::class)->group(function () {
        Route::prefix('seller')->group(function () {
            Route::get("/dashboard", "dashboardSeller");
            Route::get("/editArticle/{id}","editArticle");
            Route::post("/editArticle/{id}","editValid");
            Route::get("/createArticle", "createArticle");
            Route::post("/createArticle", "validArticle");
            Route::get("/createCategory","createCatg");
            Route::post("/createCategory","validCatg");
        });
    });
});
