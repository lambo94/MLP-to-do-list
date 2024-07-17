<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Returns a list of tasks
     */
    public function viewAll()
    {
        $query = Tasks::all();

        // We would check here if user can view tasks
        // Gate::authorize('viewAny', Tasks::class);

        return TaskResource::collection($query);
    }

    /**
     * Create a task
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tasks',
        ]);

        $name = $request->input('name');

        Tasks::create(['name' => $name, 'status' => 'in_progress']);

        return redirect('/')->with('message','Task successfully created.');
    }

    /**
     * Delete a task
     *
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $id = $request->input('id');

        $task = Tasks::find($id);
        // We would check here if user can delete tasks
        // Gate::authorize('delete', $task);

        $task->delete();

        return redirect('/')->with('message','Task successfully deleted.');
    }

    /**
     * Update a task
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $id = $request->input('id');

        $task = Tasks::find($id);

        // We would check here if user can update tasks
//        Gate::authorize('update', $task);

        $task->status = 'completed';

        $task->save();

        return redirect('/')->with('message','Task successfully updated.');
    }
}
