<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kandidat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function pemilih(){
        if (Hasil::where('pemilih_id', Auth::guard('pemilih')->id())->exists()) {
            Auth::guard('pemilih')->user()->voted = true;
        }
        $kandidats = Kandidat::get();
        return view('pemilih.index', compact(['kandidats']));
    }

    public function detail($id){
        $kandidat = Kandidat::find($id);
        if ($kandidat) {
            return view('pemilih.detail', compact(['kandidat']));
        }
        return back();
    }

    public function vote(Request $request){
        $kandidat = Kandidat::find($request->id);
        if ($kandidat) {
            Hasil::Create([
                'pemilih_id' => Auth::guard('pemilih')->id(),
                'kandidat_id' => $kandidat->id,
                'tanggal_jam' => Carbon::now()
            ]);
            return back();
            // return view('pemilih.detail', compact(['kandidat']));
        }
        return back();
    }
}