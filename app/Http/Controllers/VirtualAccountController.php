<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VirtualAccount;
use App\Models\User;

class VirtualAccountController extends Controller
{
    public function index()
    {
        $va = VirtualAccount::all();

        // dd($user);
        return view('va.index', [
            'va' => $va,
        ]);
    }

    public function create()
    {
        $user = User::where('role', '=', 'user')->get();
        return view('va.create', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();
        VirtualAccount::create($data);
        return redirect()->route('virtual-account.index')->with('success', 'Virtual Account berhasil dibuat');
    }

    public function edit($id)
    {
        $va = VirtualAccount::find($id);
        return view('va.edit', [
            'va' => $va
        ]);
    }

    public function update(Request $request, $id)
    {
        $va = VirtualAccount::find($id);
        $data = $request->all();
        $va->update($data);
        return redirect()->route('virtual-account.index')->with('success', 'Virtual account berhasil diedit');
    }
}
