@extends('layouts.app')

@section('content')
{{-- <div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                <h3 class="card-title">Biodata Diri</h3>
                <form action="{{ route('dashboard_admin.store') }}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tinggi Badan</label>
                        <input type="number" class="form-control mb-3" name="tb" id="tb">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Berat Badan</label>
                        <input type="number" class="form-control mb-3" name="bb" id="bb">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hobi</label>
                        <input type="text" class="form-control mb-3" name="hobi" id="hobi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Umur</label>
                        <input type="number" class="form-control mb-3" name="umur" id="umur">
                    </div>
                    <button id="cek" class="btn btn-success" type="submit" onclick="cek()" >Cek</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <h3 class="card-title">Result</h3>
                    <form class="mt-4" action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" disabled class="form-control" name="nama1" id="nama1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tinggi Badan</label>
                        <input type="number" disabled class="form-control mb-3" name="tb1" id="tb1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Berat Badan</label>
                        <input type="number" disabled class="form-control mb-3" name="bb1" id="bb1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">BMI</label>
                        <input type="text" disabled class="form-control mb-3" name="bmi1" id="bmi1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Berat Badan</label>
                        <input type="text" disabled class="form-control mb-3" name="status1" id="status1">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hobi</label>
                        <input type="text" disabled class="form-control mb-3" name="hobi1" id="hobi1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Umur</label>
                        <input type="text" disabled class="form-control mb-3" name="umur1" id="umur1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konsultasi Gratis</label>
                        <input type="text" disabled class="form-control mb-3" name="konsul1" id="konsul1">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row">
        <div class="col">

            <form action="{{ route('dashboard_admin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Berat Badan</label>
                    <input type="number" class="form-control" name="berat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tinggi Badan</label>
                    <input type="number" class="form-control" name="tinggi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hobi</label>
                    <input type="text" class="form-control" name="hobi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Lahir</label>
                    <input type="number" class="form-control" name="born">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <table class="table mt-3">
                <thead>
                    <tr>
                        {{-- <th scope="col">Nama</th>
                        <th scope="col">Berat Badan</th>
                        <th scope="col">Tinggi Badan</th> --}}
                        <th scope="col">BMI</th>
                        <th scope="col">Status</th>
                        {{-- <th scope="col">Hobi</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Konsultasi Gratis</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @isset($data)
                        {{-- <td>{{ $data['nama'] }}</td>
                        <td>{{ $data['berat'] }}</td>
                        <td>{{ $data['tinggi'] }}</td> --}}
                        <td>{{ $data['bmi'] }}</td>
                        <td>{{ $data['status']}}</td>
                        {{-- <td>{{ $data['hobi']}}</td> --}}
                        @endisset
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection