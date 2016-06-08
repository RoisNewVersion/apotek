<?php
// namespace Menu;
use App\User;


class Menu {

	public static function activeMenu($uri='')
	{
		$active = '';

		if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri))
		{
			$active = 'active';
		}

		return $active;
	}


	/*
	|--------------------------------------------------------------------------
	| Detect Active Route
	|--------------------------------------------------------------------------
	|
	| Compare given route with current route and return output if they match.
	| Very useful for navigation, marking if the link is active.
	| Soure : https://laracasts.com/discuss/channels/general-discussion/whats-the-cleanest-way-to-add-the-active-class-to-bootstrap-link-components
	|
	*/
	public static function isActiveRoute($route, $output = "active")
	{
	    if (Route::currentRouteName() == $route) return $output;
	}

	/*
	|--------------------------------------------------------------------------
	| Detect Active Routes
	|--------------------------------------------------------------------------
	|
	| Compare given routes with current route and return output if they match.
	| Very useful for navigation, marking if the link is active.
	|
	*/
	public static function areActiveRoutes(Array $routes, $output = "active")
	{
	    foreach ($routes as $route)
	    {
	        if (Route::currentRouteName() == $route) return $output;
	    }

	}

	//Mycustom active uri
	public static function checkActiveRoute(Array $uris)
	{
		$active = 'active';

		foreach ($uris as $uri) {

			if (Request::segment(1) == $uri ) {
				return $active;
			}
		}
	}

	//untuk menampilkan role user pada navbar
	public static function getUserRole()
	{
		$user = User::find(Auth::user()->id);

		foreach ($user->getRoles() as $key) {
		 	return $key;
		} 
	}

	// hitung total transaksi hari ini.
	/*public static function countTotal()
	{
		$tgl = date('Y-m-d');
		$total = 0;

    	// $ambil = DB::select("select t.*, o.id, o.nama_obat from transaksi t, obat o where t.obat_id = o.id and date(t.created_at) = '$tgl'");
    	$totalpend = DB::table('transaksi')
    			// ->join('obat', 'transaksi.obat_id', '=', 'obat.id')
    			->select(DB::raw('sum(total_harga) as totalpendapatan'))
    			// ->sum('total_harga')
    			->whereRaw("date(transaksi.created_at) = '$tgl'")
    			->get();

    	
    	foreach ($totalpend as $key) {
    		$total = $key->totalpendapatan;
    	}
    	// return $total;
    	return view('layout.headernavbar', compact('total'));
    	// echo "<pre>";
    	// print_r($totalpend);
    	// echo "</pre>";
	}*/

}