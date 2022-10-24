<?php

namespace App\Http\Controllers;

use App\Models\JenisKontak;
use App\Models\Kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.contact.index',[
            "page" => "Contact",
            "siswa" => Kontak::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contact.create',[
            "page" => "Contact",
            "jenis" => JenisKontak::all(),
            "siswa" => Siswa::all(),
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
            'required' => ':attribute harus diisi dulu bang'
        ];
        $validated = $request->validate([
            "id_siswa" => "required",
            "id_jenis" => "required",
            "deskripsi" => "required",
        ],$message);
        Kontak::create($validated);
        return redirect()->route('contact.index');
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
        return view('dashboard.contact.edit',[
            "page" => "Contact",
            "kontak" => Kontak::find($id),
            "jenis" => JenisKontak::all(),
            "siswa" => Siswa::all(),
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
        $message = [
            'required' => ':attribute harus diisi dulu bang'
        ];
        $validated = $request->validate([
            "id_siswa" => "required",
            "id_jenis" => "required",
            "deskripsi" => "required",
        ],$message);
        Kontak::find($id)->update($validated);
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeImg = Kontak::find($id);
        Kontak::destroy($homeImg->id);
        return redirect()->back();
    }
}
