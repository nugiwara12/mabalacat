<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Pagination\Paginator;
use App\Models\Julius;

class JuliusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juliuses = Julius::orderBy('created_at', 'DESC')->get();
        return view('julius.index', compact('juliuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('julius.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email_address' => ['required', 'string', 'email', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'LRN_number' => ['required', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'grade' => ['nullable', 'string', 'max:255'],
            'teacher_name' => ['nullable', 'string', 'max:255'],
        ]);

        Julius::create($request->all());

        return redirect()->route('julius')->with('success', 'Grades of Julius Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $juliuses = Julius::findOrFail($id);
        return view('julius.show', compact('juliuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $juliuses = Julius::findOrFail($id);
        return view('julius.edit', compact('juliuses'));
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
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email_address' => ['required', 'string', 'email', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'LRN_number' => ['required', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'grade' => ['nullable', 'string', 'max:255'],
            'teacher_name' => ['nullable', 'string', 'max:255'],
        ]);

        $juliuses = Julius::findOrFail($id);
        $juliuses->update($request->all());

        return redirect()->route('julius')->with('success', 'Grades of Julius Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juliuses = Julius::findOrFail($id);
        $juliuses->delete();

        return redirect()->route('julius')->with('success', 'Grades of Julius Deleted Successfully');
    }
}