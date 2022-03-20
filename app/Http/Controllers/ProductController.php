<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Response\Result;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function allProduct()
    {
        $response = Product::get();
        return Result::SUCCESS($response);
    }

    public function listProduct()
    {
        return DataTables::of(Product::query())->toJson();
    }

    public function create(Request $request)
    {
        $result = Product::Insert($request->all());

        return Result::SUCCESS($result);
    }
}
