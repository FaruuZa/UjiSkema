<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kandidat;
use App\Models\Pemilih;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


    // FUNCTION PEMILIH
    public function dataPemilih()
    {
        $pemilihs = Pemilih::simplePaginate(10);
        foreach ($pemilihs as $item) {
            if(Hasil::where('pemilih_id', $item->id)->exists()){
                $item->voted = true;
            }else{
                $item->voted = false;
            }
        }
        return view('admin.pemilih.index', compact('pemilihs'));
    }
    public function pemilihTambah()
    {
        return view('admin.pemilih.add');
    }

    public function pemilihStore(Request $request)
    {
        $terValid = $request->validate([
            'username' => 'required|unique:pemilihs',
            'nama' => 'required',
            'NISN' => 'required',
            'password' => 'required',
            'alamat' => 'required'
        ]);

        $terValid['password'] = Hash::make($terValid['password']);

        Pemilih::create($terValid);

        return redirect('/dashboard/data-pemilih');
    }

    public function pemilihEdit($id)
    {

        $target = Pemilih::find($id);
        if ($target) {
            return view('admin.pemilih.edit', compact(['target']));
        } else {
            return redirect('/dashboard/data-pemilih');
        }
    }
    public function pemilihUpdate(Request $request, $id)
    {

        $target = Pemilih::find($id);

        $terValid = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'NISN' => 'required',
            'alamat' => 'required'
        ]);

        $target->update($terValid);
        return redirect('/dashboard/data-pemilih');
    }

    public function pemilihDelete(Request $request)
    {
        Hasil::where('pemilih_id', $request->id)->delete();
        Pemilih::find($request->id)->delete();
        return redirect('/dashboard/data-pemilih');
    }



    // FUNCTION ADMIN
    public function dataAdmin()
    {
        $admins = User::where('id', '!=', 1)->get();
        return view('admin.user.index', compact('admins'));
    }

    public function adminTambah()
    {

        return view('admin.user.add');
    }
    public function adminStore(Request $request)
    {
        $terValid = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $terValid['password'] = Hash::make($terValid['password']);

        User::create($terValid);

        return redirect('/dashboard/data-admin');
    }

    public function adminEdit($id)
    {
        $target = User::find($id);
        if ($target and $target->id != 1) {
            return view('admin.user.edit', compact(['target']));
        } else {
            return redirect('/dashboard/data-admin');
        }
    }
    public function adminUpdate(Request $request, $id)
    {
        $target = User::find($id);

        $terValid = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
        ]);

        $target->update($terValid);
        return redirect('/dashboard/data-admin');
    }

    public function adminDelete(Request $request)
    {
        User::find($request->id)->delete();
        return redirect('/dashboard/data-admin');
    }



    // FUNCTION KANDIDAT
    public function dataKandidat()
    {
        $kandidats = Kandidat::get();
        return view('admin.kandidat.index', compact('kandidats'));
    }

    public function kandidatTambah()
    {
        return view('admin.kandidat.add');
    }
    public function kandidatStore(Request $request)
    {
        $terValid = $request->validate([
            'nama_ketos' => 'required',
            'nama_waketos' => 'required',
            'image' => 'required|image|mimes:png,jpg',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $imgName = $terValid['nama_ketos'] . $terValid['nama_ketos'] . '.' . $request->image->extension();
        $request->image->move(public_path('/img') , $imgName);

        $terValid['image'] = $imgName;
        Kandidat::create($terValid);

        return redirect('/dashboard/data-kandidat');

    }

    public function kandidatEdit($id)
    {
        $kandidat = Kandidat::find($id);
        if ($kandidat) {
            return view('admin.kandidat.edit', compact(['kandidat']));
        } else {
            return redirect('/dashboard/data-admin');
        }
    }
    public function kandidatUpdate(Request $request, $id)
    {

        $target = Kandidat::find($request->id);

        $terValid = $request->validate([
            'nama_ketos' => 'required',
            'nama_waketos' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);
        if($request->image){
            $imgName = $terValid['nama_ketos'] . $terValid['nama_ketos'] . '.' . $request->image->extension();
            $request->image->move(public_path('/img') , $imgName);
            $terValid['image'] = $imgName;
        }

        $target->update($terValid);

        return redirect('/dashboard/data-kandidat');
    }

    public function kandidatDelete(Request $request)
    {
        Hasil::where('kandidat_id', $request->id)->delete();
        Kandidat::find($request->id)->delete();
        return redirect('/dashboard/data-kandidat');
    }

    public function kandidatDetail($id)
    {
        $kandidat = Kandidat::find($id);
        if ($kandidat) {
            return view('admin.kandidat.detail', compact(['kandidat']));
        }
        return back();
    }

    public function hasil(){
        $kandidats = Kandidat::get();
        $total = Hasil::count();
        foreach ($kandidats as $item) {
            $ygMilih = Hasil::where('kandidat_id', $item->id )->count();
            $item->terpilih = $total > 0 ? $ygMilih .' suara ('. round( $ygMilih / $total * 100) . '%)': '0 (0%)';
        }
        return view('admin.hasilPemilihan', compact(['kandidats']));
    }
}