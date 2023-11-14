<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/bootstrap.min.bundle.js') }}" defer></script>
    @livewireStyles()
</head>
<body class="bg-info-subtle">
    <main class="container mt-3">
        <div class="d-flex justify-content-center">

            <form method="post" 
                @isset($todo) 
                    action="{{ route('todo.update', $todo->id) }}" 
                @else
                    action="{{ route('todo.create') }}" 
                @endisset 
            >

                @csrf

                <h4 class="text-center">{{ env('APP_NAME') }}</h4>
                <div class="input-group">
                    <input name="content" placeholder="Task content" class="form-control" 
                    @isset ($todo)
                        value="{{ $todo->content }}" 
                    @endisset
                    />
                    <input type="submit" value="Save" class="btn btn-success" />
                </div>

                <table class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr class="table-primary fw-bold">
                            <td>#</td>
                            <td>Content</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($todos as $todo)
                        
                        <tr>
                            <td class="fw-bold table-primary">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $todo->content }}
                            </td>
                            <td class="input-group">
                                <a class="btn btn-primary" href="{{ route('todo.update',$todo->id) }}" wire:navigate>Edit</a>
                                <a class="btn btn-danger" href="{{ route('todo.delete',$todo->id) }}" wire:navigate>Delete</a>
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="3">
                                No available task ! Please a one !
                            </td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </main>

    @livewireScripts()
</body>
</html>