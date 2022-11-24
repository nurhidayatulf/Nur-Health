<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard_admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk menghitung bmi
        $a = new konsul($request->berat, $request->tinggi);
        // $a->bmi();
        // $a->status();
        $data = [
            // 'nama' => $a->nama,
            // 'berat' => $a->berat,
            // 'tinggi' => $a->tinggi,
            'bmi' => $a->bmi(),
            'status' => $a->status(),
            // 'hobi' => $a->hobi,
            // 'umur' => $a->umur(),
        ];

        return view('dashboard_admin', compact('data')); 
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class hitung
{
    public function __construct($berat, $tinggi)
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi / 100;
    }

    public function bmi()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }
}

class konsul extends hitung
{
    public function status()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18.5) {
            return 'Kurus';
        } elseif ($dbmi <= 22.9) {
            return 'Normal';
        } elseif ($dbmi > 22.9) {
            return 'Gemuk';
        } else {
            return 'Obesitas';
        }
    }
}

// class hitungumur
// {
//     public function __construct($born)
//     {
//         $this->born = $born;
//     }

//     public function umur()
//     {
//         return 2022 - $this->born;
//     }
// }

// class gratis extends hitungumur
// {
//     public function konsulgratis()
//     {
//         $umurnya = $this->umur();

//         if ($umurnya >= 17) {
//             return 'Anda bisa mendapatkan Konsultasi Gratis';
//         } else {
//             return 'Belum bisa konsultasi gratis';
//         }
//     }
// }