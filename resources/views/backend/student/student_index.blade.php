@extends('home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Student List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Student List</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-body">
              <a href="{{route('student.create')}}" class="btb-sm btn btn-primary"><i class="fa fa-plus"></i>Add Student</a>
            <br><br>
            <table class="table table-bordered myTable">
              <thead>
                <tr class="text-center">
                  <th>#sl</th>
                  <th> Student Name</th>
                  <th>Department Name</th>
                  <th>Mobile_no</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if('students')
                @foreach($students as $key=>$student)
                <tr class="text-center">
                  <td>{{++$key}}</td>
                  <td>{{$student->name??''}}</td>
                  <td>{{$student['department']['name']??''}}</td>
                  <td>{{$student->mobile_no??''}}</td>
                  <td>{{$student->email??''}}</td>
                  <td >
                    <a href="{{route('student.edit',$student->id)}}" class="btb-sm btn btn-primary" title="Edit"><i class="fas fa-pen"></i>Edit</a>
                    <a href="javascript:;" class="btb-sm btn btn-danger sa-delete"  data-form-id="student-delete-{{$student->id}}" title="Delete"><i class="fas fa-trash-restore-alt"></i>Delete</a>
                    <form id="student-delete-{{$student->id}}" action="{{route('student.destroy',$student->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div><!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection