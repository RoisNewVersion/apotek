<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request as Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Satuan;

class SatuanCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $satuan = Satuan::all();
        return view('satuan.index', ['satuans'=>$satuan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Request::all(), Satuan::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $satuan_data = [
            'nama_satuan'=>strtoupper(Request::input('nama_satuan'))
            ];

        $cek = Satuan::create($satuan_data);

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('satuan.index');
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
        $satuan = Satuan::find($id);
        return view('satuan.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
       $satuan = Satuan::findOrFail($id);

       $validator = Validator::make(Request::all(), Satuan::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $satuan_data = [
            'nama_satuan'=>strtoupper(Request::input('nama_satuan'))
            ];

        $cek = $satuan->update($satuan_data);

        if ($cek) {
            SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('satuan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cek = Satuan::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('satuan.index');
        
    }


}
