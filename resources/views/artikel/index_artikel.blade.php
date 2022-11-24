@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Artikel</div>

                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Judul</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Isi</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal Artikel</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategori</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $list)
                                <tr>
                                    <th class="align-middle text-xs font-weight-bold mb-0" scope="row">{{ $loop->iteration }}</th>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->judul }}</p>
                                    </td>
                                    <td><img src="{{ asset('storage/'.$list->foto) }}" alt="" width="100px"></td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->isi }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->tanggalArtikel }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->kategori->nama_kategori }}</p>
                                    </td>
                                    <td>
                                        <a href="edit_artikel/{{ $list->id }}" class="btn bg-warning text-uppercase text-white text-xxs font-weight-bolder ms-3">Edit</a>
                                        |
                                        <a href="delete_artikel/{{ $list->id }}" class="btn bg-danger text-uppercase text-white text-xxs font-weight-bolder ms-3" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                                <a href="{{ url('create_artikel') }}" class="btn bg-primary text-white text-uppercase text-xxs font-weight-bolder ms-3" type="button">Tambah Data</a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection