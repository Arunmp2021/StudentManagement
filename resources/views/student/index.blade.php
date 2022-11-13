@extends('common.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student.create') }}"> Create New Student</a>
                <a class="btn btn-info" href="{{ route('student-mark.index') }}">Marklist</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Reporting Teacher</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->name??'' }}</td>
                <td>{{ $student->age??'' }}</td>
                <td>{{ $student->gender??'' }}</td>
                <td>{{ $student->teacher->name??'' }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('student.edit', $student->id) }}">Edit</a>

                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">
       
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach

    </table>
@endsection
