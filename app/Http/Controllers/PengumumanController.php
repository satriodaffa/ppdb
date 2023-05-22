<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class PengumumanController extends Controller
{
    public function index()
    {
        $item = Payment::where('user_id', '=', Auth::user()->id)->first();
        $wawancara = Pertanyaan::where('user_id', '=', Auth::user()->id)->first();
        return view('pengumuman.index', [
            'wawancara' => $wawancara,
            'item' => $item,
        ]);
    }
}
