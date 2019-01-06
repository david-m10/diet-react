<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Note
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $note = new Note($request->all());
        $note->save();

        return $note;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
