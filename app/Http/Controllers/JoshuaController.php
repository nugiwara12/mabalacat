<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Pagination\Paginator;
use App\Models\Joshua;

class JoshuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joshuas = Joshua::orderBy('created_at', 'DESC')->get();
        return view('joshua.index', compact('joshuas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('joshua.create');
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

        Joshua::create($request->all());

        return redirect()->route('joshuas')->with('success', 'Grades of Joshua Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $joshuas = Joshua::findOrFail($id);
        return view('joshua.show', compact('joshuas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $joshuas = Joshua::findOrFail($id);
        return view('joshua.edit', compact('joshuas'));
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

        $joshuas = Joshua::findOrFail($id);
        $joshuas->update($request->all());

        return redirect()->route('joshuas')->with('success', 'Grades of Joshua Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $joshuas = Joshua::findOrFail($id);
        $joshuas->delete();

        return redirect()->route('joshuas')->with('success', 'Grades of Joshua Deleted Successfully');
    }
}