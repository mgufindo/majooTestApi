<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Response\Result;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    public function kategori()
    {
        return DataTables::of(Kategori::where('status', 1)->get())->toJson();
    }

    public function kategoriList()
    {
        $result = Kategori::all();

        return Result::SUCCESS($result);
    }

    public function insert(Request $request)
    {

        $kategori = Kategori::Insert($request->all());
        return Result::SUCCESS($kategori);
    }

    public function update($id, Request $request)
    {
        $kategori = Kategori::where("id", $id)->update($request->all());
        return Result::SUCCESS($kategori);
    }

    public function delete(Request $request)
    {
        $id = $request->get("id");

        $cek = Kategori::where("id", $id)->first();

        if (!empty($cek)) {
            $cek->status = 0;
        }

        $cek->save();
    }
}
