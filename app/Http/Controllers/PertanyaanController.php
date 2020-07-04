<?php

namespace App\Http\Controllers;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('questions')->get();
        return view('items.pertanyaan_index', compact('questions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.pertanyaan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create($request->all());
        return redirect('pertanyaan')->with('status', 'Pertanyaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = DB::table('questions')->where('id', $id)->get();
        $answers = DB::table('answers')->where('pertanyaan_id', $id)->get();
        return view('items.pertanyaan_show', compact('questions'), compact('answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = DB::table('questions')->where('id', $id)->get();
        return view('items.pertanyaan_edit', compact('questions'));
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
        DB::table('questions')->where('id', $id)->update([
                    'judul' => $request->judul,
                    'isi' => $request->isi
                    ]);

        $questions = DB::table('questions')->where('id', $id)->get();
        $answers = DB::table('answers')->where('pertanyaan_id', $id)->get();
        return view('items.pertanyaan_show', compact('questions'), compact('answers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('questions')->where('id', $id)->delete();
        DB::table('answers')->where('pertanyaan_id', $id)->delete();
        return redirect('pertanyaan')->with('status', 'Pertanyaan berhasil dihapus!');
    }
}
