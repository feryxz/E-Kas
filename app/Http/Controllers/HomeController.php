<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $data = Auth::user();
        return view('admin.profile', compact('data'));
    }

    public function profile_update(Request $request)
    {
        $data = Auth::user();
        $this->validate($request, [
            'nama' => 'required',
            'phone' => 'required',
        ]);

        if ($request->password == null) {
            if ($request->avatar == null) {
                $user = [
                    'name' => $request->nama,
                    'phone' => $request->phone,
                ];
        
                User::whereId($data->id)->update($user);
            }else{
                $user = [
                    'name' => $request->nama,
                    'phone' => $request->phone,
                    'avatar' => $request->avatar,
                ];
        
                User::whereId($data->id)->update($user);
            }
        }else{
            if ($request->avatar !== null) {
                $user = [
                    'name' => $request->nama,
                    'phone' => $request->phone,
                    'avatar' => $request->avatar,
                    'password' => Hash::make($request->password),
                ];
        
                User::whereId($data->id)->update($user);
            }else{
                $user = [
                    'name' => $request->nama,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                ];
        
                User::whereId($data->id)->update($user);
            }
        }

        return redirect()->route('profile')->with('success', 'Data berhasil diupdate');
    }

    public function user()
    {
        $data = User::all();
        return view('admin.user.index', compact('data'));
    }

    public function user_export_pdf()
    {
        $data = User::all();

        $pdf = PDF::loadview('admin.user.pdf',['data'=>$data]);
        return $pdf->download('laporan-total-user-'.date('Y-m-d H:i:s').'.pdf');
    }
}
