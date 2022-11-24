<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data database adari tabel kategori
        $data = Kategori::all();
        
        return view('kategori.index_kategori', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan submit oleh user kepada halaman create kategori
        $data = Kategori::all();
        
        return view('kategori.create_kategori', compact ('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan data yang telah ditambahkan oleh user di halaman create kategori ke database
        $validator = $request->validate([
            'nama_kategori' => 'required'
        ]);
        
        Kategori::create($validator);
        return redirect('index_kategori')->with('success', 'Data berhasil disimpan!');
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
        //mengarahkan submit oleh user kepada halaman edit kategori
        $data = Kategori::findOrFail($id);

        return view('kategori.edit_kategori', compact('data'));
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
        //menyimpan data yang telah diupdate oleh user di halaman edit kategori ke database
        $data = Kategori::findOrFail($id);
        
        $data->update($request->all());

        return redirect('index_kategori')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data pada tabel di database ketika dihapus oleh user dari database
        $data = Kategori::findOrFail($id);
        $data->delete();
        return redirect('index_kategori')->with('success', 'Data berhasil dihapus!');
    }
}