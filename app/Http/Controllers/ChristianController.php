<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Pagination\Paginator;
use App\Models\Christian;

class ChristianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $christians = Christian::orderBy('created_at', 'DESC')->get();
        return view('christian.index', compact('christians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('christian.create');
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

        Christian::create($request->all());

        return redirect()->route('christians')->with('success', 'Christian created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $christian = Christian::findOrFail($id);
        return view('christian.show', compact('christian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $christian = Christian::findOrFail($id);
        return view('christian.edit', compact('christian'));
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

        $christian = Christian::findOrFail($id);
        $christian->update($request->all());

        return redirect()->route('christians')->with('success', 'Christian updated successfully');
    }

    

    public function loadChristians(Request $request)
    {
        $christians = Christian::paginate(2); // Paginate with 2 items per page (adjust as needed)
    
        return view('components.models.christianModel', compact('christians'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $christian = Christian::findOrFail($id);
        $christian->delete();

        return redirect()->route('christians')->with('success', 'Christian deleted successfully');
    }
}