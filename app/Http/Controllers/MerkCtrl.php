<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request as Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use UxWeb\SweetAlert\SweetAlert;

use App\Merk;

class MerkCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $merk = Merk::all();
        return view('merk.index', ['merks'=>$merk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('merk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Request::all(), Merk::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $merk_data = [
            'nama_merk'=>strtoupper(Request::input('nama_merk'))
            ];

        $cek = Merk::create($merk_data);

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('merk.index');
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
        $merk = Merk::find($id);
        return view('merk.edit', compact('merk'));
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
        $merk = Merk::findOrFail($id);

        $validator = Validator::make(Request::all(), Merk::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $merk_data = [
            'nama_merk'=>strtoupper(Request::input('nama_merk'))
            ];

        $cek = $merk->update($merk_data);

        if ($cek) {
            SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('merk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cek = Merk::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('merk.index');
    }
}
