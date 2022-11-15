<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Staff;
use App\Models\Agenda;
use App\Models\Komponen;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;


class DashboardAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan semua Post berdasarkan user tertentu
    public function index()
    {
        return view('dashboard.agendas.index', [
            'agendas' => Agenda::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman Tambah Postingan
    public function create()
    {
        return view('dashboard.agendas.create', [
            'staffs' => Staff::all(),
            'komponens' => Komponen::all(),
            'types' => Type::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // menjalankan fungsi tambah yang diatas
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:agendas', //untuk menjaga user edit slug, akan di cek kembali sdh ada atau belum data slugnya
            'type_id' => 'required',
            'location' => 'required',
            'komponen' => 'required',
            'staff_id' => 'required',
            'description' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        // dd($validatedData);
        Agenda::create($validatedData);

        $newEmail = [
            'title' => $validatedData['title'],
            'body' => 'Anda mendapatkan undangan kegiatan baru pada tanggal ' . $validatedData['date'] . ', harap lakukan pengecekan melalui aplikasi siap.bkkbn.go.id'
        ];
        $email = Staff::where('id', $request->staff_id)->get();
        $to = $email[0]->email;
        // $to = 'fmbo.cool@gmail.com';

        Mail::to($to)->send(new SendEmail($newEmail));

        return redirect('/dashboard/agendas')->with('success', 'New Agenda has been added and notification by email has been sended!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    // melihat detail dari sebuah postingan
    public function show(Agenda $agenda)
    {
        return view('dashboard.agendas.show', [
            'agenda' => $agenda
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman ubah data
    public function edit(Agenda $agenda)
    {
        return view('dashboard.agendas.edit', [
            'agenda' => $agenda,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    // delete postingan
    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);
        return redirect('/dashboard/agendas')->with('success', 'Agenda has been deleted');
    }


    // untuk mengisi slug otomatis dari script di crate.blade.php
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Agenda::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]); //dikasih data dalam bentuk json, supaya bisa di olah di script create.blade.php
    }
}
