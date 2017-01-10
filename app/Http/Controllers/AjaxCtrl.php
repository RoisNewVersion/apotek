<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request as Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use UxWeb\SweetAlert\SweetAlert;
use Response;
use Session;
use HTML, Form;
// use yajra\Datatables\Datatables;
use Datatables;
use Illuminate\Support\Collection;
use DB;
use App\Obat;
use App\Transaksi;
use App\HutangSupplier;

/**
* class for ajax dataTable.js
*/
class AjaxCtrl extends Controller
{
	public function getIndex()
	{
		$obat = Obat::all();
		return view('obat.index2');
	}
	
	public function getObat()
	{
		// $obats = Obat::select(['id', 'nama_obat', 'barcode', 'created_at', 'updated_at']);
		// $obats = Obat::with('rak', 'golongan', 'merk', 'satuan', 'supplier')->get();
		$obats = DB::table('obat')
				->join('rak', 'obat.rak', '=', 'rak.id')
				->join('golongan', 'obat.golongan', '=', 'golongan.id')
				->join('merk', 'obat.merk', '=', 'merk.id')
				->join('satuan', 'obat.satuan', '=', 'satuan.id')
				->join('supplier', 'obat.supplier', '=', 'supplier.id')
				->select(['obat.id', 'obat.nama_obat', 'obat.barcode', 'obat.isi', 'obat.harga_pokok', 'obat.harga_jual', 'obat.status', 'obat.kadaluarsa',
				 'rak.nama_rak', 'golongan.nama_gol', 'merk.nama_merk', 'satuan.nama_satuan', 'supplier.nama_supl']);

		// return Datatables::of($obats)->make();
		return Datatables::of($obats)
				->addColumn('action', function ($obat)
				{
					$html = 	 Form::open(array('url' => "obat/".$obat->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); 
					$html .=  Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus', 'onclick'=>'return confirm("Yakin ingin menghapus?");')); 
					$html .=  Form::close();
					$html .= ' ';
					$html .= "<a class='btn btn-small btn-success' title='Edit' href=". route('obat.edit', ['obat'=>$obat->id]) .">Edit</a>";

					return $html;
				})
				//->editColumn('diskon', '{!! $diskon !!}'. '%')
				->editColumn('harga_pokok', 'Rp {!!  number_format($harga_pokok, 0, "", ".") !!}')
				->editColumn('harga_jual', 'Rp {!!  number_format($harga_jual, 0, "", ".") !!}')
				->make(true);
				
		// return dd($obat);
	}

	//ambil pembelian obatvdr session
	public function getObatBeli()
	{
		$data = new Collection;

		if (Session::has('datatambahobat')) {
			foreach (Session::get('datatambahobat') as $key ) {
				$data->push([
					'unikid'=>$key['unikid'],
	                'idobat'=>$key['idobat'],
	                'nama'=>$key['nama'],
	                'jenis'=>$key['jenis'],
	                'jumlah'=>$key['jumlah'],
	                'harga'=>$key['harga'],
	                
	            ]);
			}
		}
	//$retVal = (condition) ? a : b ;	
		return Datatables::of($data)
				// ->editColumn($jenis, ($jenis == 'u') ? 'Umum' : 'Khusus')
				 ->addColumn('action', function ($data) {
                // return '<a href="#edit-'.$data['idobat'].'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            	return link_to_action('TransaksiCtrl@getHapus', 'Hapus', ['unikid'=>$data['unikid']], ['class'=>'btn btn-small btn-primary']);
            	})
				->make(true);
		// return dd($array);
		// return Response::json($data);
	}

	//ambil data obat berdasarkan barcode
	public function getBarcode()
	{
		$get = Request::input('term');

		$results = array();

		$queries = DB::table('obat')
				->join('rak', 'obat.rak', '=', 'rak.id')
				->join('merk', 'obat.merk', '=', 'merk.id')
				->select('obat.id', 'obat.harga_jual', 'obat.nama_obat', 'merk.nama_merk', 'rak.nama_rak')
				->where('barcode', '=', $get)
				->get();

		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->nama_obat, 'nama' => $query->nama_obat, 'harga_jual'=>$query->harga_jual, 'rak'=> $query->nama_rak, 'merk'=> $query->nama_merk];
		}

		return Response::json($results);
	}

	//ambil obat berdasarkan nama obat
	public function getNamaObat()
	{
		$get = Request::input('term');

		$results = array();

		$queries = DB::table('obat')
				->join('rak', 'obat.rak', '=', 'rak.id')
				->join('merk', 'obat.merk', '=', 'merk.id')
				->select('obat.id', 'obat.harga_jual', 'obat.nama_obat', 'merk.nama_merk', 'rak.nama_rak')
				->where('nama_obat', 'LIKE', '%'.$get.'%')
				->take(3)
				->get();

		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id,  'nama' => $query->nama_obat, 'value' => $query->nama_obat, 'harga_jual'=>$query->harga_jual, 'rak'=> $query->nama_rak, 'merk'=> $query->nama_merk];
		}

		return Response::json($results);
	}

	// laporan penjualan
	public function getPenjualan()
	{
		// $obats = Obat::select(['id', 'nama_obat', 'barcode', 'created_at', 'updated_at']);
		// $penjualan = Transaksi::with('obat')->get();

		$penjualan = DB::table('transaksi')
							->join('obat', 'transaksi.obat_id', '=', 'obat.id')
							->select(['obat.nama_obat', 'transaksi.*'])
							->orderBy('transaksi.id', 'desc');

		return Datatables::of($penjualan)
				->addColumn('action', function ($penjualan)
				{
					$html = 	Form::open(array('url' => "transaksi/".$penjualan->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); 
					$html .=  Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus', 'onclick'=>'return confirm("Yakin ingin menghapus?");')); 
					$html .=  Form::close();

					return $html;
				})
				->editColumn('diskon', '{!! $diskon !!}'. ' %')
				->editColumn('harga', 'Rp {!!  number_format($harga, 0, "", ".") !!}')
				->editColumn('total_harga', 'Rp {!!  number_format($total_harga, 0, "", ".") !!}')
				->editColumn('untung', 'Rp {!!  number_format($untung, 0, "", ".") !!}')
				->make(true);
		// return dd($penjualan);
	}

	// hutang supplier
	public function getHutangSupplier()
	{
		// $obats = Obat::select(['id', 'nama_obat', 'barcode', 'created_at', 'updated_at']);
		$hutang = HutangSupplier::with('supplier')->get();

		return Datatables::of($hutang)
				->addColumn('action', function ($hutang)
				{
					$html = 	Form::open(array('url' => "hutangsupplier/".$hutang->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); 
					$html .=  Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus', 'onclick'=>'return confirm("Yakin ingin menghapus?");')); 
					$html .=  Form::close();
					$html .= ' ';
					$html .= "<a class='btn btn-small btn-success' title='Edit' href=". route('hutangsupplier.edit', ['obat'=>$hutang->id]) .">Edit</a>";

					return $html;
				})
				->editColumn('status',  '{!! $status == "B" ? "Belum lunas" : "Sudah lunas" !!}')
				->editColumn('jml_hutang', 'Rp {!!  number_format($jml_hutang, 0, "", ".") !!}')
				->make(true);
		// return dd($penjualan);
	}

	

}