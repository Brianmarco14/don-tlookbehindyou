<?php

namespace App\Http\Controllers;

use App\Models\Cerita;
use App\Models\Kategori;
use App\Models\Penulis;
use Illuminate\Http\Request;

class CeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cerita = Cerita::all();
        $kategori = Kategori::all();
        return view('artikel.cerita',compact('cerita','kategori'));

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
        Cerita::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'foto'=>$request->file('foto')->store('cerita'),
            'tanggal'=>$request->tanggal,
            'kategori_id'=>$request->kategori_id,
            'penulis'=>$request->penulis,
            'link'=>$request->link,
        ]);
        return redirect('cerita');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cerita = Cerita::find($id);
        $lain = Cerita::inRandomOrder()->limit(6)->get();
        return view('artikel.baca',compact('cerita','lain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cerita $cerita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cerita=Cerita::find($id);
        $semua = $request->all();
        try {
            $semua['foto']=$request->file('foto')->store('cerita');
            $cerita->update($semua);
        } catch (\Throwable $th) {
            //throw $th;
            $semua['foto']=$cerita->foto;
            $cerita->update($semua);
        }
        return redirect('cerita');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cerita=Cerita::find($id);
        $cerita->delete();
        return redirect('cerita');

    }
}
