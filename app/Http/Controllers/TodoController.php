<?php

namespace App\Http\Controllers;


use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUserId = Auth::id();
        $todos = Todos::where('user_id', $authUserId)->get();
        return view('dashboard', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'priority' => ['required', 'integer']
        ]);

        $todo = new Todos;
        $todo->fill($validateData);
        $todo->user_id = Auth::id();
        $todo->status = 'In Progress';
        $todo->save();
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Todos::find($id);
        return view('todos.show', compact('todo'));
    }

    public function completed_check($id)
    {
        $todo = Todos::findOrFail($id);
        $todo->status = 'completed';
        $todo->save();

        return redirect()->route('todo.show', $todo->id)->with('success', 'Todo marked as completed!');
    }

    public function uncomplete_check($id)
    {
        $todo = Todos::findOrFail($id);
        $todo->status = 'In Progress';
        $todo->save();

        return redirect()->route('todo.show', $todo->id)->with('success', 'Todo marked as pending!');
    }

    public function completed_check_dash($id)
    {
        $todo = Todos::findOrFail($id);
        $todo->status = 'completed';
        $todo->save();

        return redirect()->route('dashboard')->with('success', 'Todo marked as completed!');
    }

    public function uncomplete_check_dash($id)
    {
        $todo = Todos::findOrFail($id);
        $todo->status = 'In Progress';
        $todo->save();

        return redirect()->route('dashboard')->with('success', 'Todo marked as pending!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
