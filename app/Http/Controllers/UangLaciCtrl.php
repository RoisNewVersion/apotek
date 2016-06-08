<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Validator;
use Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UangLaci;

class UangLaciCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uanglaci = UangLaci::all();
        return view('uanglaci.index', ['uanglaci'=>$uanglaci]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uanglaci.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // hanya diperbolehkan satu row data yg ada di table uanglaci.
        if (UangLaci::count() >= 1) {
            SweetAlert::error('Hanya diperbolehkan satu row data yg ada di table Uang laci', 'Pesan')->autoclose(3000);
            return redirect()->route('uanglaci.index');
        }

        $validator = Validator::make(Request::all(), UangLaci::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $uang = [
            'nominal'=>Request::input('nominal')
            ];

        $cek = UangLaci::create($uang);

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('uanglaci.index');
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
        $uanglaci = UangLaci::find($id);
        return view('uanglaci.edit', compact('uanglaci'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $uang = UangLaci::findOrFail($id);

       $validator = Validator::make(Request::all(), UangLaci::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $nominal = [
            'nominal'=>Request::input('nominal')
            ];

        $cek = $uang->update($nominal);

        if ($cek) {
            SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('uanglaci.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = UangLaci::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('uanglaci.index');
    }
}
