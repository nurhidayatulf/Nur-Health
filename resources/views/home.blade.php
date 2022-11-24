@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection