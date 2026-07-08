<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index()
    {
        $admins = User::latest()->get();

        $totalUser = User::count();

        $totalAdmin = User::where('role','admin')->count();

        $totalPKL = User::where('role','pkl')->count();

        $totalSales = User::where('role','sales')->count();

        $totalTeknisi = User::where('role','teknisi')->count();


        return view('admin.dashboard', compact(
            'admins',
            'totalUser',
            'totalAdmin',
            'totalPKL',
            'totalSales',
            'totalTeknisi'
        ));
    }



    public function create()
    {
        return view('admin.create');
    }



    public function store(Request $request)
    {

        $request->validate([

            'name'=>'required|string|max:255',

            'email'=>'required|email|unique:users,email',

            'role'=>'required|in:admin,pkl,sales,teknisi',

            'password'=>'required|min:8|confirmed',

        ]);



        User::create([

            'name'=>$request->name,

            'email'=>$request->email,

            'role'=>$request->role,

            'password'=>Hash::make($request->password),

        ]);



        return redirect()
            ->route('admin.dashboard')
            ->with('success','User berhasil ditambahkan.');

    }




    public function edit($id)
    {

        $admin = User::findOrFail($id);


        return view('admin.edit',compact('admin'));

    }




    public function update(Request $request,$id)
    {

        $admin = User::findOrFail($id);



        $request->validate([

            'name'=>'required|string|max:255',

            'email'=>'required|email|unique:users,email,'.$id,

            'role'=>'required|in:admin,pkl,sales,teknisi',

        ]);



        $admin->update([

            'name'=>$request->name,

            'email'=>$request->email,

            'role'=>$request->role,

        ]);



        if($request->filled('password')){

            $request->validate([

                'password'=>'min:8|confirmed'

            ]);


            $admin->update([

                'password'=>Hash::make($request->password)

            ]);

        }



        return redirect()
            ->route('admin.dashboard')
            ->with('success','User berhasil diupdate.');

    }





    public function destroy($id)
    {

        $admin = User::findOrFail($id);



        if($admin->id == auth()->id()){

            return redirect()
            ->route('admin.dashboard')
            ->with('success','Tidak bisa menghapus akun sendiri.');

        }



        $admin->delete();



        return redirect()
            ->route('admin.dashboard')
            ->with('success','User berhasil dihapus.');

    }


}