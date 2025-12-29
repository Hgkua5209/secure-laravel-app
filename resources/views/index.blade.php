<h1>Tasks</h1>

@foreach ($tasks as $task)
    <p>
        <strong>{{ $task->title }}</strong><br>
        {{ $task->description }}<br>
        Status: {{ $task->status }}
    </p>
@endforeach
