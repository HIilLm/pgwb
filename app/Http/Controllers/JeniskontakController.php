<?php

namespace App\Http\Controllers;

use App\Models\JenisKontak;
use Illuminate\Http\Request;

class JeniskontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jenis.index',[
            "page" => "JenisKontak",
            "jeniskontak" => JenisKontak::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.jenis.create',[
        //     "page" => "JenisKontak",
        // ]);
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
            'required' => ':attribute harus diisi dulu bang',
            'unique' => ':attributenya harus unik bang'
        ];
        $validated = $request->validate([
            'jenis' => "required|unique:jenis"
        ],$message);

        JenisKontak::create($validated);
        return redirect()->back();
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
        return view('dashboard.jenis.edit',[
            "page" => "JenisKontak",
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
        if ($request->jenis == JenisKontak::find($id)->jenis) {
        $message = [
            'required' => ':attribute harus diisi dulu bang',
        ];
        $validated = $request->validate([
            'jenis' => "required"
        ],$message);


        } else {
            $message = [
                'required' => ':attribute harus diisi dulu bang',
                'unique' => ':attribute harus unik bang'
            ];
            $validated = $request->validate([
                'jenis' => "unique:jenis|required"
            ],$message);
        }
        JenisKontak::find($id)->update($validated);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeImg = JenisKontak::find($id);
        JenisKontak::destroy($homeImg->id);
        return redirect()->back();
    }
}
