<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\VirtualAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarUlangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarUlang = VirtualAccount::where('user_id', '=', Auth::user()->id)->first();
        // dd($daftarUlang);
        return view('daftar-ulang.index', [
            'daftarUlang' => $daftarUlang
        ]);
    }

    public function admin()
    {
        $data = DaftarUlang::all();
        return view('admin.daftar-ulang', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();
        if ($request->hasFile('skl')) {
            $filenameWithExt = $request->file('skl')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('skl')->getClientOriginalExtension();
            $skl = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('skl')->move('uploads/', $skl);
        }
        if ($request->hasFile('sk')) {
            $filenameWithExt = $request->file('sk')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('sk')->getClientOriginalExtension();
            $sk = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('sk')->move('uploads/', $sk);
        }
        if ($request->hasFile('san')) {
            $filenameWithExt = $request->file('san')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('san')->getClientOriginalExtension();
            $san = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('san')->move('uploads/', $san);
        }
        DaftarUlang::create([
            'skl' => $skl,
            'sk' => $sk,
            'san' => $san,
            'nama' => $request->nama,
            'norek' => $request->norek,
        ]);
        return redirect()->route('daftar-ulang.index')->with('success', 'File berhasil diupload!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarUlang $daftarUlang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarUlang $daftarUlang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarUlang $daftarUlang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarUlang $daftarUlang)
    {
        //
    }
}
