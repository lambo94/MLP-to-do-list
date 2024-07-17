<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

    <style>
        body {
            background: #E3E3E3;
        }

        table {
            background-color: white;
            border-radius: 5px;
        }

        th {
            margin-top: 5px;
        }

        .add-task-btn {
            margin-top: 5%;
            width: 100%;
        }

        .logo-row {
            margin-top: 2%;
            margin-bottom: 10%;
        }

        button.action {
            width: 30px;
            height: 30px;
        }

        .actions {
            display:flex;
            flex-direction: row;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(!empty($message))
            <div class="alert alert-success"> {{ $message }}</div>
        @endif
        <div class="row logo-row">{{--logo row--}}
            <div>
                <span><img src="{{URL::asset('/assets/logo.png')}}" alt="MLP logo" title="MLP logo"></span>
            </div>
        </div>
        <div class="row">{{--content row--}}
            <div class="col-md-4">
                <form method="POST" action="/create_task">
                    @csrf
                    <input type="text" class="form-control" id="name" name="name" placeholder="Insert task name">
                    <button type="submit" class="btn btn-primary add-task-btn">Add</button>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>
                                    @if ($task->status === 'completed')
                                        <del>{{ $task->name }}</del>
                                    @else
                                        {{ $task->name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($task->status !== 'completed')
                                        <div class="actions">
                                            <form method="POST" action="/update_task">
                                                @csrf
                                                <input type="hidden" value="{{$task->id}}" name="id"/>
                                                <button type="submit" class="btn btn-success action" title="Done">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form method="POST" action="/delete_task">
                                                @csrf
                                                <input type="hidden" value="{{$task->id}}" name="id"/>
                                                <button type="submit" class="btn btn-danger action" title="Cancel">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <footer>
                    Copyright © 2020 All Rights Reserved
                </footer>
            </div>
        </div>
    </div>
</body>
</html>
