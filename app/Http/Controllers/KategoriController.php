<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Response\Result;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    public function kategori()
    {
        return DataTables::of(Kategori::query())->toJson();
    }

    public function kategoriList()
    {
        $result = Kategori::all();

        return Result::SUCCESS($result);
    }
}
