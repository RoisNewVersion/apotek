<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//protect from crfs
Route::when('*', 'csrf', array('post', 'put', 'delete'));

Route::filter('csrf', function() {
	$token = Request::ajax() ? Request::header('X-CSRF-Token') : Input::get('_token');
	if (Session::token() != $token)
		throw new Illuminate\Session\TokenMismatchException;
});

Route::get('/', function () {
	return view('pages.home');
});

Route::get('contoh', 'TransaksiCtrl@contoh');


Route::get('home', function ()    {
	return view('pages.home');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//auth
Route::get('login', ['uses'=>'AuthCtrl@getLogon', 'as'=>'login']);
Route::post('login', 'AuthCtrl@postLogon');
Route::get('logout', ['uses'=>'AuthCtrl@getLogout', 'as'=>'logout']);

// Route::resource('siswa', 'SiswasController');

Route::group(['middleware'=>'auth'], function()
{

	Route::resource('obat', 'ObatCtrl');
	Route::resource('transaksi', 'TransaksiCtrl');
	Route::resource('hutangsupplier', 'HutangSupplierCtrl');
	
	/*Acl*/
	Route::group(['middleware'=>'acl', 'is'=>'admin'], function(){
		Route::resource('user', 'UserCtrl');
		Route::resource('rak', 'RakCtrl');
		Route::resource('golongan', 'GolonganCtrl');
		Route::resource('merk', 'MerkCtrl');
		Route::resource('satuan', 'SatuanCtrl');
		Route::resource('supplier', 'SupplierCtrl');
		Route::resource('uanglaci', 'UangLaciCtrl');
	});
	
	
	/*route for dataTables*/
	Route::get('dtobat', ['uses'=>'AjaxCtrl@getObat', 'as'=>'dtobat']);
	Route::get('exobat', ['uses'=>'AjaxCtrl@getIndex', 'as'=>'exobat']);
	//get beli obat
	Route::get('getobatbeli', ['uses'=>'AjaxCtrl@getObatBeli', 'as'=>'getobatbali']);
	//get laporan penjualan
	Route::get('laporanpenjualan', ['uses'=>'AjaxCtrl@getPenjualan', 'as'=>'laporanpenjualan']);
	//ambil data obat berdasarkan barcode
	Route::get('getbarcode', ['uses'=>'AjaxCtrl@getbarcode', 'as'=>'getbarcode']);
	//ambil obat berdasarkan nama obat
	Route::get('getnamaobat', ['uses'=>'AjaxCtrl@getNamaObat', 'as'=>'getnamaobat']);
	//hutang supplier
	Route::get('gethutangsupplier', ['uses'=>'AjaxCtrl@getHutangSupplier', 'as'=>'gethutangsupplier']);

	
	// post tambah obat
	Route::post('tambahdataobat', ['uses'=>'TransaksiCtrl@postTambahObat', 'as'=>'tambahdataobat']);

	//hapus dr session obatbeli
	Route::get('gethapus', 'TransaksiCtrl@getHapus');

	//finish dr pembelian
	Route::get('finish', 'TransaksiCtrl@getFinish');

	//selesai dr pembelian
	Route::get('selesai', 'TransaksiCtrl@getSelesai');

	//masukan uang dr pembeli.
	Route::get('hitungkembalian', 'TransaksiCtrl@getKembalian');

	// cetak nota setelah beli
	Route::get('cetaknota', 'TransaksiCtrl@cetakNota');

	// retur page
	Route::get('retur', 'TransaksiCtrl@getRetur');
	// retur post
	Route::post('retur', 'TransaksiCtrl@postRetur');

	// route berbagai laporan.
	Route::group(['prefix'=>'laporan'], function()
	{
		// laporan penjualan
		Route::get('penjualan', ['uses'=>'LaporanCtrl@penjualan']);
		// tampil halaman cetak
		Route::get('cetak', ['uses'=>'LaporanCtrl@halamanCetak']);
		// cetak laporan
		Route::get('cetakobat', ['uses'=>'LaporanCtrl@obatCetak']);
		// laporan harian
		Route::get('harian', ['uses'=>'LaporanCtrl@harian']);
		// laporan mingguan
		Route::get('mingguan', ['uses'=>'LaporanCtrl@mingguan']);
		// laporan bulanan
		Route::get('bulanan', ['uses'=>'LaporanCtrl@bulanan']);
		// laporan chart paling laris
		Route::get('chart', ['middleware'=>'acl', 'is'=>'admin', 'uses'=>'LaporanCtrl@chartLaris']);
		//laporan obat habis
		Route::get('obathabis/{aksi}', ['uses'=>'LaporanCtrl@obatHabis']);
		// total pendapatan
		Route::get('informasipendapatan', ['uses'=>'LaporanCtrl@countTotal']);
		// total pendapatan
		Route::get('informasiobat', ['uses'=>'LaporanCtrl@infoObat']);
		// view cetak per rak
		Route::get('cetakperrak', ['uses'=>'LaporanCtrl@getCetakPerRak']);
		// post cetak per rak
		Route::post('cetakperrak', ['uses'=>'LaporanCtrl@postCetakPerRak']);
		// surat permintaa
		Route::get('sp', ['uses'=>'LaporanCtrl@sp', 'as'=>'sp']);
		// post surat permintaa
		Route::post('postsp', ['uses'=>'LaporanCtrl@postsp', 'as'=>'postsp']);
		// hasil surat permintaa
		Route::get('hasilsp', ['uses'=>'LaporanCtrl@hasilsp', 'as'=>'hasilsp']);
		
	});
});
Route::get('tessp', function() {
    return view('pdf.sp');
});
// Route::get('user/{user}', [
// 	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
// 	'uses' => 'UserController@index',
// 	'roles' => ['administrator', 'manager']]); // Only an administrator, or a manager can access this route

