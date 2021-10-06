@extends('home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Student Page</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Student Page</li>
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
            <h5 class="card-title">Student</h5>
            <br>
            <form method="POST" action="{{route('student.update',$editStudent->id)}}">
            @csrf
             @method('PUT')
            <div class="card-body">
              <dv class="row">
                 <div class="col-md-4">
                <div class="form-group">
                  <label>Department Name</label>
                  <select name="department_id"  class="select2bs4 form-control"   style="width: 100%;">
                    <option value="">Select Supplier</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}" {{($editStudent->department_id==$department->id)?"Selected":''}} >{{$department->name}}</option> 
                    @endforeach
                  </select>
                </div>
              </div>
                <div class="form-group col-md-4">
                <label for="name">Student Name</label>
                <input type="text" name="name" value="{{$editStudent->name}}" class="form-control"  placeholder="Enter Name">
                @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
              </div>
               <div class="form-group col-md-4">
                <label for="mobile_no">Mobile_no</label>
                <input type="text" name="mobile_no" value="{{$editStudent->mobile_no}}"  class="form-control"  placeholder="Enter Name">
                @if($errors->has('mobile_no'))
                  <span class="text-danger">{{$errors->first('mobile_no')}}</span>
                @endif
              </div>
               <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{$editStudent->email}}"   class="form-control"  placeholder="Enter email">
                @if($errors->has('email'))
                  <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
              </div>
              </dv>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          </div>
        </div><!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection