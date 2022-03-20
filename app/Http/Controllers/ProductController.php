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
        $response = Product::where("status", 1)->get();
        return Result::SUCCESS($response);
    }

    public function listProduct()
    {
        return DataTables::of(Product::where('status', 1)->get())->toJson();
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

    public function dataProductEdit($id, Request $request)
    {
        $result = Product::where("id", $id)->first();
        return Result::SUCCESS($result);
    }

    public function update(Request $request)
    {
         $result = Product::where("id", $request->get("id"))->first();

        $result->nama_produk = empty($request->get("nama_produk")) ? $result->nama_produk : $request->get("nama_produk");
        $result->deskripsi_produk = empty($request->get("deskripsi_produk")) ? $result->deskripsi_produk : $request->get("deskripsi_produk");
        $result->harga_produk = empty($request->get("harga_produk"))? $result->harga_produk : $request->get("harga_produk");
        $result->kategori_id = empty($request->get("kategori_id"))? $result->kategory_id : $request->get("kategori_id");
        $result->image = empty($request->get("image")) ? $result->image : $request->get("image");
        $result->status = 1;
        $result->save();
        return Result::SUCCESS('success');
    }
}
