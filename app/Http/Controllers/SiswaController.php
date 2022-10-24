<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index',[
            "page" => "Siswa",
            "siswa" => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.create',[
            "page" => "Siswa"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'email' => ':attribute harus email yang bener, contoh = email@email.email',
            'name.min' => ':attribute minimal 5 bang',
            'nisn.min' => ':attribute minimal isi 6 lah',
            'nisn.max' => ':attribute maximal 12,ojk akeh akeh',
            'unique' => ':attribute harus unik bang',
            'digits_between' => ':attribute minimal panjang 6,maximal panjang 12',

        ];
        $validated = $request->validate([
            "name" => "required|min:5",
            "about" => "required",
            "email" => "required|email|unique:siswa",
            "jenis_kelamin" => "required",
            "alamat" => "required",
            "nisn" => "required|numeric|digits_between:6,12|unique:siswa",
            "profil" => "required|image|file",
        ],$message);
        $validated['profil'] = $request->file('profil')->store('gambar_siswa', ['disk' => 'public']);
        Siswa::create($validated);
        // Alert::success('Success', 'Successfully add new data');
        return redirect('/dashboard/siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $halo = Siswa::find($id);
        return view('dashboard.siswa.show',[
            "siswa" => $halo,
            "page" => "Siswa",
            'kontak' => $halo->kontak,
            'project' => $halo->project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.siswa.edit',[
            "siswa" => Siswa::find($id),
            "page" => "Siswa"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->email == Siswa::find($id)->email || $request->nisn == Siswa::find($id)->nisn) {
            $message = [
                'required' => ':attribute harus diisi dulu',
                'email' => ':attribute harus email yang bener, contoh = email@email.email',
                'min' => ':attribute minimal 5 bang',
                'nisn.min' => ':attribute minimal isi 6 lah',
                'nisn.max' => ':attribute maximal 12,ojk akeh akeh',
                'unique' => ':attribute harus unik bang',
                'digits_between' => ':attribute minimal panjang 6,maximal panjang 12',
            ];
            $validated = $request->validate([
                "name" => "required|min:5",
                "about" => "required",
                "email" => "required|email",
                "jenis_kelamin" => "required",
                "alamat" => "required",
                "nisn" => "required|digits_between:6,12",
                "profil" => "image|file",
            ],$message);
        } else {
            $message = [
                'required' => ':attribute harus diisi dulu',
                'email' => ':attribute harus email yang bener, contoh = email@email.email',
                'min' => ':attribute minimal 5 bang',
                'nisn.min' => ':attribute minimal isi 6 lah',
                'nisn.max' => ':attribute maximal 12,ojk akeh akeh',
                'unique' => ':attribute harus unik bang',
                'digits_between' => ':attribute minimal panjang 6,maximal panjang 12',
            ];
            $validated = $request->validate([
                "name" => "required|min:5",
                "about" => "required",
                "email" => "required|email|unique:siswa",
                "jenis_kelamin" => "required",
                "alamat" => "required",
                "nisn" => "required|digits_between:6,12|unique:siswa",
                "profil" => "image|file",
            ],$message);
        }

        $hapus = Siswa::find($id);
        if ($request->hasFile('profil')) {
            Storage::disk('public')->delete($hapus->profil);
            $validated['profil'] = $request->file('profil')->store('gambar_siswa', ['disk' => 'public']);
        }
        Siswa::find($id)->update($validated);
        return redirect('/dashboard/siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeImg = Siswa::find($id);
        Storage::disk('public')->delete($homeImg->profil);
        Siswa::destroy($homeImg->id);
        return redirect()->back();
    }
}
