<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\UserNoteResource;
use Illuminate\Http\Request;
use App\Http\Resources\NoteResource;
use App\Models\admin\Note;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class NoteController extends Controller
{
    public function store(NoteRequest $request)
    {

        try {
            Note::create([
                "user_id" => auth()->user()->id,
                "lesson_id" => $request['lesson_id'],
                "content" => $request['content']
            ]);

            return response()->json(['success' => 'Note created'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($id, Request $request)
    {
        try {
            return new NoteResource(Note::where('id', $id)
                ->where('user_id', $request->user()['id'])
                ->firstOrFail());

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note not found'], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $note = Note::where('id', $id)
                ->where('user_id', $request->user()['id'])
                ->firstOrFail()
                ->update([
                    "content" => $request['content']
                ]);

            return response()->json(['success' => 'Note updated']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note not found'], 400);
        }
    }

    public function destroy($id, Request $request)
    {
        try {
            $note = Note::where('id', $id)->where('user_id', $request->user()['id'])->firstOrFail();
            $note->delete();

            return response()->json(['success' => 'Note deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note not found'], 400);
        }
    }

    public function userNote()
    {
        try {
            $notes = Note::with("lesson", "lesson.course")->where("user_id", auth()->user()->id)->latest()->get();

            return $this->success(UserNoteResource::collection($notes));
        }catch (ModelNotFoundException $exception){
            return $this->fail("There is an error");
        }
    }
}
