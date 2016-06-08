<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use UxWeb\SweetAlert\SweetAlert;
use Kodeine\Acl\Models\Eloquent\Role;
use App\Helper;

class UserCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', ['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::lists('name', 'slug');
        return view('user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // return dd(Request::all());
        $validator = Validator::make(Request::all(), User::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user_data = [
            'name'=>Request::input('name'),
            'email'=>Request::input('email'),
            'password'=>bcrypt(Request::input('password'))
            ];

        $cek = User::create($user_data);

        $user = User::find($cek->id);
        $user->assignRole(Request::input('level'));

        if ($cek) {
            SweetAlert::success('Data berhasil masuk', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal masuk', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('user.index');
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
        $role = Role::lists('name', 'slug');
        $user = User::find($id);
        return view('user.edit', compact('user', 'role'));
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
        // return dd(Request::all());

        $user = User::findOrFail($id);

        $validator = Validator::make(Request::all(), User::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user_data = [
            'name'=>Request::input('name'),
            'email'=>Request::input('email'),
            'password'=>bcrypt(Request::input('password'))
            ];

        $cek = $user->update($user_data);

        $user->revokeRole($this->getUserRoleUpdate($id));
        $user->assignRole(Request::input('level'));

        if ($cek) {
            SweetAlert::success('Data berhasil diedit', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal diedit', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = User::destroy($id);

        if ($cek) {
            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
        } else {
            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
        }

        return redirect()->route('user.index');
    }

    //untuk menampilkan role user pada User::update(id)
    public function getUserRoleUpdate($id)
    {
        $user = User::find($id);

        foreach ($user->getRoles() as $key) {
            return $key;
         } 
    }
}
