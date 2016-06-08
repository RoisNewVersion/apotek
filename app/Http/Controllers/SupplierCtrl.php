<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request as Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Supplier;

class SupplierCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', ['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Request::all(), Supplier::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $supplier_data = [
            'nama_supl'=>strtoupper(Request::input('nama_supl')),
            'alamat'=>strtoupper(Request::input('alamat')),
            'hp'=>strtoupper(Request::input('hp')),
            ];

        $cek = Supplier::create($supplier_data);

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('supplier.index');
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
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
       $supplier = Supplier::findOrFail($id);

       $validator = Validator::make(Request::all(), Supplier::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $supplier_data = [
            'nama_supl'=>strtoupper(Request::input('nama_supl')),
            'alamat'=>strtoupper(Request::input('alamat')),
            'hp'=>strtoupper(Request::input('hp')),
            ];

        $cek = $supplier->update($supplier_data);

        if ($cek) {
            SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cek = Supplier::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('supplier.index');
        
    }


}
