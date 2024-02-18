<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->id());
        //
        // $notes=Note::all();
        // $notes=Note::where('user_id',auth()->id())->get();

        $notes=Note::whereUserId(auth()->id())->latest()->paginate(5);
        return view('notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //validation
        $validated=$request->validate([
            'title'=>'required|string|min:5|max:255|unique:notes',
            'body'=>'required|string|min:10'
        ]);

        //create Note
        $request->user()->notes()->create($validated);
        return redirect(route('notes.index'))->with('success','Note Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $this->authorize('view',$note);//ilk parametre policy parametresi
        //
        return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
        $this->authorize('update',$note);
        return view('notes.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
        $this->authorize('update',$note);

        $validated=$request->validate([
            'title'=>['required','string','min:5','max:255',Rule::unique('notes')->ignore($note->id)],
            'body'=>'required|string|min:10'
        ]);
        $note->update($validated);
        return redirect(route('notes.index'))->with('success','Note Update Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->authorize('delete',$note);
        $note->delete();
        return redirect(route('notes.index'))->with('success','Note Delete Successfuly');


    }
}
