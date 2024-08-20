<?php

namespace App\Http\Controllers;

use App\DTO\ListDTO;
use App\Services\ListService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListController extends Controller
{
    protected $listService;

    public function __construct(ListService $listService)
    {
        $this->listService = $listService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia('Lists/Index', [
            'title' => 'My todo lists',
            'lists' => $this->listService->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('Lists/Create', [
            'title' => 'My todo lists',
            'subCategory' => 'Membuat list baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->listService->create(ListDTO::storeRequest($request));
        return redirect()->route('lists.index')->with('success', 'List berhasil disimpan');
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
        $list = $this->listService->find($id);
        $todos = $list->todos;

        return Inertia('Lists/Edit', [
            'title' => 'My todo lists',
            'subCategory' => 'Mengubah list',
            'list' => $list,
            'todos' => $todos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->listService->update(ListDTO::updateRequest($request), $id);
        return redirect()->route('lists.index')->with('success', 'List berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->listService->delete($id);
        return redirect()->route('lists.index')->with('success', 'List berhasil dihapus');
    }
}
