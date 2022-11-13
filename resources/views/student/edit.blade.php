@extends('common.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('student.index') }}"> Back</a>
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
   
<form action="{{ route('student.update',$student->id) }}" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{$student->name}}" placeholder="Name" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="number" name="age" class="form-control" value="{{$student->age}}" placeholder="Age"required >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>&nbsp;
                <input type="radio" name="gender" value="Male"  {{ $student->gender=="Male" ? 'checked' : '' }}>&nbsp;<span>Male</span>
                <input type="radio" name="gender" value="Female" {{ $student->gender=="Female" ? 'checked' : '' }}>&nbsp;<span>Female</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Teacher:</strong>&nbsp;
                <select name="teacher_id"  class="form-control">
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" {{ $student->teacher_id==$teacher->id ? 'selected' : '' }}>{{$teacher->name}}</option>
                    @endforeach
                    
                  </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection