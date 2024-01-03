<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('todos.index', [
            'todos' => Todo::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'item' => 'required|string|max:255',
        ]);
 
        $request->user()->todos()->create($validated);
 
        return redirect(route('todos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo): View
    {
        $this->authorize('update', $todo);
 
        return view('todos.edit', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo): RedirectResponse
    {
        $this->authorize('update', $todo);
 
        $validated = $request->validate([
            'item' => 'required|string|max:255',
        ]);
 
        $todo->update($validated);
 
        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        $this->authorize('delete', $todo);
 
        $todo->delete();
 
        return redirect(route('todos.index'));
    }
}
