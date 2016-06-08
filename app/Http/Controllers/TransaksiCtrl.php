<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Session;
use App\Obat;
use App\Transaksi;
use UxWeb\SweetAlert\SweetAlert;
use PDF;
use Auth;

class TransaksiCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('transaksi.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cek = Transaksi::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect('laporan/penjualan');
    }

    //post ajax tambah pembelian obat
    public function postTambahObat()
    {
        if (Request::ajax()) {

            // $idobat = Request::input('idobat');

            //cek jika menggunakan barcode
            if (Request::input('barcode')) {
                $bar = Request::input('barcode');
                $data = Obat::where('barcode', '=', $bar)->first();
                $new_tambah  = [
                    'unikid'=>mt_rand(100, 1000),
                    'idobat'=>$data->id,
                    'nama'=>$data->nama_obat,
                    'jenis'=>Request::input('jenis'),
                    'jumlah'=>Request::input('jumlah'),
                    'harga'=>$data->harga_jual,
                    //'token'=>Request::input('token')
                ];
            } else {
                $new_tambah  = [
                    'unikid'=>mt_rand(100, 1000),
                    'idobat'=>Request::input('idobat'),
                    'nama'=>Request::input('nama'),
                    'jenis'=>Request::input('jenis'),
                    'jumlah'=>Request::input('jumlah'),
                    'harga'=>Request::input('hrg'),
                    //'token'=>Request::input('token')
                ];
            }
            

            // $new_tambah  = [
            // 'unikid'=>mt_rand(100, 1000),
            // 'idobat'=>Request::input('idobat'),
            // 'nama'=>Request::input('nama'),
            // 'jenis'=>Request::input('jenis'),
            // 'jumlah'=>Request::input('jumlah'),
            // 'harga'=>Request::input('hrg'),
            //     //'token'=>Request::input('token')
            // ];

            if (Session::has('datatambahobat')) {

                //tambahkan obat baru ke array
                Session::push('datatambahobat', $new_tambah);
            }else{
                //jika tdk ada tambahkan data pertama
                Session::push('datatambahobat', $new_tambah);
            }

            

        //     // Session::put('datatambahobat', Request::all());
        }
        

    }

    //hapus item dr session obat
    public function getHapus()
    {
        $unikid = Request::get('unikid');
        if ($unikid) {

            if(Session::has('datatambahobat')){
                $dt = Session::get('datatambahobat');

                foreach ($dt as $key) {

                    if ($key['unikid'] != $unikid) {

                        $tambah[]  = [
                        'unikid'=>$key['unikid'],
                        'idobat'=>$key['idobat'],
                        'nama'=>$key['nama'],
                        'jenis'=>$key['jenis'],
                        'jumlah'=>$key['jumlah'],
                        'harga'=>$key['harga'],
                        ];
                    }
                }

            }
            //set isi session
            if (!empty($tambah)) {
                Session::put('datatambahobat', $tambah);
            } else {
                Session::forget('datatambahobat');
            }
            
            return redirect()->back();

        }else{
            return redirect('transaksi');
        }
    }

    //finish pembelian obat
    public function getFinish()
    {   
        if(Session::has('datatambahobat')){
            $dt = Session::get('datatambahobat');
            $isi_akhir = 0;
            $untungfinal = 0;
            $diskon = 0;
            $total_harga = 0;


            foreach ($dt as $key) {

                $obat = Obat::findOrFail($key['idobat']);
                $isi_akhir = $obat->isi - $key['jumlah'];

                    // jika stok tdk mencukupi
                if ($isi_akhir <= 0 || $obat->isi <= 0 ) {
                    SweetAlert::error('Stok dari '.$obat->nama_obat.' tidak mencukupi', 'Pesan')->persistent("Close this");
                    return redirect('transaksi');
                } else {    
                       // jika stok mencukupi update isi ny.
                    $obat->isi = $isi_akhir;
                    $obat->save();

                }

                    //apakah pembeli umum atau khusus?
                if ($key['jenis'] == 'k') {

                    $total_blm_diskon = $key['jumlah'] * $key['harga'];
                    $diskon = $obat->diskon / 100 * $total_blm_diskon;
                    $total_sdh_diskon = $total_blm_diskon - $diskon;
                    $untung_invalid = $obat->harga_jual - $obat->harga_pokok;
                    $untung = $untung_invalid * $key['jumlah'];
                    $untungfinal = $untung - $diskon;

                    $final = [
                    'obat_id'=>$key['idobat'],
                    'jumlah'=>$key['jumlah'],
                    'harga'=>$key['harga'],
                    'total_harga'=> $total_sdh_diskon,
                    'diskon'=>$obat->diskon,
                    'untung'=>$untungfinal,
                    'status'=>'N',
                    'user_id'=>Auth::user()->id
                    ];

                } else {
                    $total_blm_diskon = $key['jumlah'] * $key['harga'];
                        // $diskon = $obat->diskon / 100 * $total_blm_diskon;
                    $total_sdh_diskon = $total_blm_diskon;
                    $untung_invalid = $obat->harga_jual - $obat->harga_pokok;
                    $untung = $untung_invalid * $key['jumlah'];


                    $final = [
                    'obat_id'=>$key['idobat'],
                    'jumlah'=>$key['jumlah'],
                    'harga'=>$key['harga'],
                    'total_harga'=> $total_sdh_diskon,
                    'diskon'=>0,
                    'untung'=>$untung,
                    'status'=>'N',
                    'user_id'=>Auth::user()->id
                    ];
                }
                    // masukan ke db.
                Transaksi::create($final);
            }

        }

            //ambil status = N.
        $getN = Transaksi::where('status', '=', 'N')->get();
            // set ke session.
        Session::put('dataprint', $getN);
            // update status ke Y.
        Transaksi::where('status', '=', 'N')->update(['status'=>'Y']);
            // panggil function donlod / print nota.
            // $this->ambilNota();
            //hapus session pembelian
        Session::forget('datatambahobat');
            //hapus session dataprint
            // Session::forget('dataprint');

        return redirect('hitungkembalian'); 
    }

    public function contoh()
    {
        // $getN = Transaksi::where('status', '=', 'N')->get();

        foreach (Session::get('dataprint') as $key) {
            echo $key->id . ' '. $key->obit->nama_obat.'<br>';
        }

        // echo "<pre>";
        // print_r($getNSession::get('dataprint'));
        // echo "</pre>";
    }

    public function cetakNota()
    {
        $html = Session::get('dataprint') ;
        Session::forget('dataprint');
        $pdf = PDF::loadView('pdf.notabelikecil', compact('html'))
        ->setPaper('a5')
        ->setWarnings(false)
        ->setOrientation('landscape');
        return $pdf->download(date('Y-m-d h:m:i').'-apotek.pdf');
        // return view('pdf.notabelikecil', compact('html'));
    }

    public function getSelesai()
    {
        return view('transaksi.selesai');
    }

    public function getKembalian()
    {
        return view('transaksi.kembalian');
    }

    public function getRetur()
    {
        return view('transaksi.retur');
    }

    public function postRetur()
    {
        $idt = Request::input('idt');

        $tr = Transaksi::findOrFail($idt);
        $obat = Obat::findOrFail($tr->obat_id);
        
        $obat->isi = $obat->isi + $tr->jumlah;
        $update_obat = $obat->save();

        if ($update_obat) {
            Transaksi::destroy($tr->id);
            SweetAlert::success('Retur berhasil', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Retur gagal', 'Pesan')->autoclose(2000);
        }

        return redirect('retur');
        
    }
}
