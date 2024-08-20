<?php

namespace App\Http\Controllers;

use App\DTO\NoteDTO;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Services\NoteService;

class NoteController extends Controller
{
    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia('Notes/Index', [
            'title' => 'My notes',
            'notes' => $this->noteService->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('Notes/Create', [
            'title' => 'My notes',
            'subCategory' => 'Membuat note baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $this->noteService->create(NoteDTO::storeRequest($request));
        return redirect()->route('notes.index')->with('success', 'Catatan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia('Notes/Edit', [
            'title' => 'My notes',
            'subCategory' => 'Mengubah note',
            'note' => $this->noteService->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, string $id)
    {
        $this->noteService->update(NoteDTO::updateRequest($request), $id);
        return redirect()->route('notes.index')->with('success', 'Catatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->noteService->delete($id);
        return back()->with('success', 'Catatan berhasil dihapus');
    }
}
