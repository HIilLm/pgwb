<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.project.index',[
            "page" => "Project",
            "siswa" => Siswa::all('id','name','nisn'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.project.create',[
        //     "page" => "Project",
        //     "siswa" => Siswa::all()
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
        // $message = [
        //     'required' => ':attribute harus diisi dulu',
        //     'nama_proyek.min' => 'nama proyek minimal diisi 2 bang',
        // ];
        // $validated = $request->validate([
        //     "nama_proyek" => "required|min:2",
        //     "id_siswa" => "required",
        //     "tanggal" => "required",
        //     "deskripsi" => "required",
        //     "foto" => "required|image|file",
        // ],$message);
        // $validated['foto'] = $request->file('foto')->store('foto_project', ['disk' => 'public']);
        // Project::create($validated);
        // Alert::success('Success', 'Successfully add new data');
        // return redirect('/dashboard/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('dashboard.project.show',[
        //     "page" => "Project",
        //     "project" => $project
        // ]);


        return view('dashboard.project.getprojek',[
            "data" => Siswa::find($id)->project()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('dashboard.project.edit',[
            "project" => $project,
            "page" => "Project",
            "siswa" => Siswa::all()
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
            'required' => ':attribute harus diisi dulu',
            'nama_proyek.min' => 'nama proyek minimal diisi 2 bang',
        ];
        $validated = $request->validate([
            "nama_proyek" => "required|min:2",
            "id_siswa" => "required",
            "tanggal" => "required",
            "deskripsi" => "required",
            "foto" => "image|file",
        ],$message);
        $hapus = Project::find($id);
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($hapus->foto);
            $validated['foto'] = $request->file('foto')->store('foto_project', ['disk' => 'public']);
        }
        Project::find($id)->update($validated);
        return redirect('/dashboard/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeImg = Project::find($id);
        Storage::disk('public')->delete($homeImg->profil);
        Project::destroy($homeImg->id);
        return redirect()->back();
    }

    public function buat($id)
    {
        return view('dashboard.project.create',[
            "page" => "Project",
            "siswa" => Siswa::find($id),
        ]);
    }

    public function make(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'nama_proyek.min' => 'nama proyek minimal diisi 2 bang',
        ];
        $validated = $request->validate([
            "nama_proyek" => "required|min:2",
            "id_siswa" => "required",
            "tanggal" => "required",
            "deskripsi" => "required",
            "foto" => "required|image|file",
        ],$message);
        $validated['foto'] = $request->file('foto')->store('foto_project', ['disk' => 'public']);
        Project::create($validated);
        // Alert::success('Success', 'Successfully add new data');
        return redirect('/dashboard/project');
    }

    public function lihat($id)
    {
        $project = Project::find($id);
         return view('dashboard.project.show',[
            "page" => "Project",
            "project" => $project
        ]);
    }
}
