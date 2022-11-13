@extends('common.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Mark List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student-mark.create') }}">Add Marks</a>
                <a class="btn btn-info" href="{{ route('student.index') }}">Student list</a>
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
            <th>Student Name</th>
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created On</th>
            <th  width="280px">Action</th>
        </tr>
        
        @foreach ($studentMarks as $key => $mark)
        @php 
            $total=($mark->maths_mark??0)+($mark->science_mark??0)+($mark->history_mark??0);
        @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mark->student->name??'Deleted Student' }}</td>
                <td>{{ $mark->maths_mark??"" }}</td>
                <td>{{ $mark->science_mark??''	 }}</td>
                <td>{{ $mark->history_mark??''	 }}</td>
                <td>{{ $mark->term??'' }}</td>
                <td>{{$total}}</td>
                <td>{{ date_format($mark->created_at,'M d,Y g:i a') }}</td>
                <td style='white-space: nowrap'>
                    <a class="btn btn-primary" href="{{ route('student-mark.edit', $mark->id) }}">Edit</a>
                    <form action="{{ route('student-mark.destroy', $mark->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
