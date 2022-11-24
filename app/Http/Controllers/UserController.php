<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data user yang ada pada database
        $data = User::all();

        return view('user.index_user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan submit oleh admin kepada halaman create user
        $data = User::all();

        return view('user.create_user', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan data user yang telah ditambahkan oleh admin di halaman create user ke database
        // dd($request);
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        //membuat data password menjadi terenkripsi sehingga tdk dpt dibaca
        $validator['password'] = Hash::make($request->password);
        
        User::create($validator);
        return redirect('index_user')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan submit oleh admin kepada halaman edit user
        $data = User::findOrFail($id);

        return view('user.edit_user', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //menyimpan data yang telah diupdate oleh admin di halaman edit user ke database
        $data = User::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        try {
            $validator['password'] = Hash::make($request->password);
            $data->update($validator);
        } catch (\Throwable $th) {
            $validator['password'] = $data->password;
            $data->update($validator);
        }
        
        return redirect('index_user')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data yang dipilih oleh admin dari database
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('index_user')->with('success', 'Data berhasil dihapus!');
    }
}