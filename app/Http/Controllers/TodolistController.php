<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;

class TodolistController extends Controller
{
    public function todolist()
    {
        $tasks = Task::all();
        return view('home-template', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'task' => 'required|min:5|max:255',
        ]);

        Task::create([
            'task' => $validation['task'],
            'tanggal' => now()
        ]);

        return Redirect('/');
    }

    public function edit($id)
    {
        $tasks = Task::find($id);

        if (!$tasks) {
            dd("Task tidak ditemukan untuk ID: " . $id);
        }
        return view('edit', [
            'tasks' => $tasks
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'task' => 'required|min:5|max:255',
        ]);

        Task::where('id', $request->id)
            ->update([
                'task' => $validation['task'],
                'tanggal' => NOW()
            ]);
        return Redirect('/');
    }

    public function delete($id){
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            }
            return Redirect('/')->with('success', 'Task deleted!');
    }
}
