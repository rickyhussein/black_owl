<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $title = 'Sosial';
        $search = request()->input('search');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $socials = Social::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when($search, function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('day', 'LIKE', '%' . $search . '%');
        })
        ->orderBy('type', 'DESC')
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('social.index', compact(
            'title',
            'socials'
        ));
    }

    public function calendar()
    {
        $title = 'Sosial';
        $socials = Social::orderBy('id', 'ASC')->get();

        return view('social.calendar', compact(
            'title',
            'socials'
        ));
    }

    public function tambah()
    {
        $title = 'Sosial';
        return view('social.tambah', compact(
            'title'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'day' => 'required_if:type,Jadwal Tetap|unique:socials|nullable',
            'date' => 'required_if:type,Event',
            'title' => 'required',
            'note' => 'nullable',
            'contact_person' => 'nullable',
        ]);

        $validated['created_by'] = auth()->user()->id;
        Social::create($validated);

        return redirect('/social')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Sosial';
        $social = Social::find($id);

        return view('social.edit', compact(
            'title',
            'social',
        ));
    }

    public function update(Request $request, $id)
    {
        $social = Social::find($id);

        $rules = [
            'type' => 'required',
            'date' => 'required_if:type,Event',
            'title' => 'required',
            'note' => 'nullable',
            'contact_person' => 'nullable',
        ];

        if ($request->day != $social->day) {
            $rules['day'] = 'required_if:type,Jadwal Tetap|unique:socials|nullable';
        }

        $validated = $request->validate($rules);

        $validated['updated_by'] = auth()->user()->id;
        $social->update($validated);

        return redirect('/social')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $social = Social::find($id);
        $social->delete();
        return redirect('/social')->with('success', 'Data Berhasil Dihapus');
    }

    public function mySocial()
    {
        $title = 'Sosial';
        $socials = social::orderBy('id', 'ASC')->get();

        return view('social.mySocial', compact(
            'title',
            'socials'
        ));
    }
}
