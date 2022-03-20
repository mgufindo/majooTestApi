<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    public function kategori()
    {
        return DataTables::of(Kategori::query())->toJson();
    }
}
