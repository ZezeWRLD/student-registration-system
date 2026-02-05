<!DOCTYPE html>
<html>
<head>
    <title>Student Notification</title>
</head>
<body>
    <p>
        @if($action === 'created')
            The student "{{ $student->name }}" has been created.
        @elseif($action === 'updated')
            The student "{{ $student->name }}" has been updated.
        @elseif($action === 'deleted')
            The student "{{ $student->name }}" has been deleted.
        @endif
    </p>

    @if($action !== 'deleted')
        <p>
            <a href="{{ url('/students/' . $student->id) }}">
                View the student details
            </a>
        </p>
    @endif
</body>
</html>
