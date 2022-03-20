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
        $response = Product::where("status",1)->get();
        return Result::SUCCESS($response);
    }

    public function listProduct()
    {
        return DataTables::of(Product::where('status',1)->get())->toJson();
    }

    public function create(Request $request)
    {
        $result = Product::Insert($request->all());

        return Result::SUCCESS($result);
    }

    public function delete(Request $request)
    {
        $id = $request->get("id");

        $cek = Product::where("id", $id)->first();

        if (!empty($cek)) {
            $cek->status = 0;
        }

        $cek->save();
    }
}
