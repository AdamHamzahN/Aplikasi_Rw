<?php

namespace App\Http\Controllers;
use App\Models\dataWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboard extends Controller
{
    //
    public function index()
    {
    //     $jnskelamin = [
    //         'kelamin' => dataWarga::select('jns_kelamin', dataWarga::raw('COUNT(*) as jumlah'))
    //             ->groupBy('jns_kelamin')
    //             ->orderByDesc('jumlah')
    //             ->get()
    //     ];
    //     return view('datawarga.index', $jnskelamin);
     }
}
