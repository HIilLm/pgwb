<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profil.index',[
            "page" => "Dashboard"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return abort(404,'not found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.profil.edit', [
            "page" => "Dashboard",
            "siswa" => Siswa::find($id)
           ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'profil' => 'image|file',
            "name" => "required",
            "about" => "min:0"
        ]);
        $hapus = Siswa::find($id);
        if ($request->hasFile('profil')) {
            Storage::disk('public')->delete($hapus->profil);
            $validated['profil'] = $request->file('profil')->store('gambar_siswa', ['disk' => 'public']);
        }
        Siswa::where('id', Siswa::find($id)->id)->update($validated);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function imgdel($id)
    {
        $image = Siswa::find($id);
        Storage::disk('public')->delete($image->profil);
        Siswa::where('id', Siswa::find($id)->id)->update(['profil' => null]);
        return redirect()->back();
    }
}
