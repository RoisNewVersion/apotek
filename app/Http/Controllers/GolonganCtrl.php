<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;
use Validator;
use UxWeb\SweetAlert\SweetAlert;

use App\Golongan;

class GolonganCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $golongan = Golongan::all();
        return view('golongan.index', ['gols'=>$golongan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Request::all(), Golongan::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $gol_data = [
            'nama_gol'=>strtoupper(Request::input('nama_gol'))
            ];

        $cek = Golongan::create($gol_data);

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('golongan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $gols = Golongan::find($id);
        return view('golongan.edit', compact('gols'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $golongan = Golongan::findOrFail($id);

        $validator = Validator::make(Request::all(), Golongan::$rules);

         if ($validator->fails()) {
             return redirect()->back()->withInput()->withErrors($validator);
         }

         $gol_data = [
             'nama_gol'=>strtoupper(Request::input('nama_gol'))
             ];

         $cek = $golongan->update($gol_data);

         if ($cek) {
             SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
         } else {
             SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
         }

         return redirect()->route('golongan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cek = Golongan::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('golongan.index');
    }
}
