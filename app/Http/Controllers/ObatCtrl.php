<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use UxWeb\SweetAlert\SweetAlert;

use App\Obat;
use App\Supplier;
use App\Satuan;
use App\Rak;
use App\Golongan;
use App\Merk;
use Auth;
use App\User;

class ObatCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $obat = Obat::all();
        return view('obat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $satuan = Satuan::lists('nama_satuan', 'id');
        $rak = Rak::lists('nama_rak', 'id');
        $supplier = Supplier::lists('nama_supl', 'id');
        $golongan = Golongan::lists('nama_gol', 'id');
        $merk = Merk::lists('nama_merk', 'id');

        return view('obat.create', compact('satuan', 'rak', 'supplier', 'golongan', 'merk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Request::all(), Obat::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cek = Obat::create($this->input());

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('obat.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return 'haha';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->checkAcl();

        $obat = Obat::find($id);
        $satuan = Satuan::lists('nama_satuan', 'id');
        $rak = Rak::lists('nama_rak', 'id');
        $supplier = Supplier::lists('nama_supl', 'id');
        $golongan = Golongan::lists('nama_gol', 'id');
        $merk = Merk::lists('nama_merk', 'id');

        return view('obat.edit', compact('obat','satuan', 'rak', 'supplier', 'golongan', 'merk'));
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
        $this->checkAcl();

        $obat = Obat::findOrFail($id);

        $validator = Validator::make(Request::all(), Obat::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cek = $obat->update($this->input());

        if ($cek) {
            SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->checkAcl();
        
        $cek = Obat::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('obat.index');
    }

    public function input()
    {
        return  [
            'nama_obat' => ucwords(Request::input('nama_obat')),
            'barcode' => Request::input('barcode'),
           'golongan' => Request::input('golongan'),
           'merk' => Request::input('merk'),
           'supplier' => Request::input('supplier'),
           'rak' => Request::input('rak'),
           'diskon' => Request::input('diskon'),
           'satuan' => Request::input('satuan'),
           'isi' => Request::input('isi'),
           'harga_pokok' => Request::input('harga_pokok'),
           'harga_jual' => Request::input('harga_jual'),
           'status' => Request::input('status'),
           'kadaluarsa' => Request::input('kadaluarsa')
        ];
    }

    // check Acl
    public function checkAcl()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if ($user->is('apoteker')) {
            abort(401);
        }
    }

}
