<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use Request;
use Validator;
use Session;
use App\HutangSupplier;
use App\Supplier;
use UxWeb\SweetAlert\SweetAlert;
use PDF;
use DB;
use App\User;
use Auth;
use App\UangLaci;

class HutangSupplierCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /hutangsupllierctrl
	 *
	 * @return Response
	 */
	public function index()
	{
		// $hutangs = HutangSupplier::paginate(15);
		// return view('hutang_supplier.index', compact('hutangs'));
		return view('hutang_supplier.index2');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /hutangsupllierctrl/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$supplier = Supplier::lists('nama_supl', 'id');
		return view('hutang_supplier.create', compact('supplier'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /hutangsupllierctrl
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Request::all(), HutangSupplier::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cek = HutangSupplier::create($this->input());

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('hutangsupplier.create');
	}

	/**
	 * Display the specified resource.
	 * GET /hutangsupllierctrl/{id}
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
	 * GET /hutangsupllierctrl/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->checkAcl();

		$supplier = Supplier::lists('nama_supl', 'id');
		$hutang = HutangSupplier::find($id);
		return view('hutang_supplier.edit', compact('hutang', 'supplier'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /hutangsupllierctrl/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->checkAcl();

		$hutang = HutangSupplier::findOrFail($id);

        $validator = Validator::make(Request::all(), HutangSupplier::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cek = $hutang->update($this->input());

        // update uanglaci dan kurangi
        if (Request::input('status') == 'L') {
        	$uanglaci = UangLaci::first();
        	$pengurangan = $uanglaci->nominal - $hutang->jml_hutang;
        	$uanglaci->update(['nominal'=>$pengurangan]);
        }

        if ($cek) {
            SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('hutangsupplier.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /hutangsupllierctrl/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->checkAcl();

		$cek = HutangSupplier::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('hutangsupplier.index');
	}

	//collect all input
	public function input()
    {
        return  [
           'no_faktur' => ucwords(Request::input('no_faktur')),
           'supplier_id' => Request::input('supplier_id'),
           'tgl_datang' => Request::input('tgl_datang'),
           'tempo' => Request::input('tempo'),
           'jml_hutang' => Request::input('jml_hutang'),
           'status' => Request::input('status'),
        ];
    }

    // cek acl
    public function checkAcl()
    {
    	$id = Auth::user()->id;
		$user = User::find($id);
		if ($user->is('apoteker')) {
			abort(401);
		}
    }

}