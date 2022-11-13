@extends('common.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Mark List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('student-mark.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student-mark.update', $mark->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Student Name:</strong>
                    <select name="student_id" class="form-control">
                        <option selected disabled>--Select Student--</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" @if ($mark->student_id == $student->id) selected @endif>
                                {{ $student->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Term:</strong>
                    <select name="term" class="form-control">
                        <option selected disabled>--Select Term--</option>
                        <option value="One" {{ $mark->term == 'One' ? 'selected' : '' }}>One</option>
                        <option value="Two" {{ $mark->term == 'Two' ? 'selected' : '' }}>Two</option>
                        <option value="Three" {{ $mark->term == 'Three' ? 'selected' : '' }}>Three</option>
                        <option value="Four" {{ $mark->term == 'Four' ? 'selected' : '' }}>Four</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Maths:</strong>
                    <input type="number" name="maths_mark" class="form-control" placeholder="Maths Mark"
                        value="{{ $mark->maths_mark }}" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Science:</strong>
                    <input type="number" name="science_mark" class="form-control" placeholder="Science Mark"
                        value="{{ $mark->science_mark }}" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>History:</strong>
                    <input type="number" name="history_mark" class="form-control" placeholder="History Mark"
                        value="{{ $mark->history_mark }}" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
