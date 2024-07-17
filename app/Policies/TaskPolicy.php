<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        // We would check here if user can view tasks
die();
        return (true)
            ? Response::allow()
            : Response::deny('You do not have permission to view any tasks.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Task $task)
    {
        // We would check here if user can view tasks

        return (true)
            ? Response::allow()
            : Response::deny('You do not have permission to view any tasks.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // We would check here if user can create tasks

        return (true)
            ? Response::allow()
            : Response::deny('You do not have permission to create any tasks.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ?Task $task)
    {
        // We would check here if user can update task

        return (true)
            ? Response::allow()
            : Response::deny('You do not own this task.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Task $task)
    {
        // We would check here if user can delete task

        return (true)
            ? Response::allow()
            : Response::deny('You do not own this task.');
    }
}
