@extends('home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Department List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Department List</li>
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
              <a href="{{route('department.create')}}" class="btb-sm btn btn-primary"><i class="fa fa-plus"></i>Add department</a>
            <br><br>
            <table class="table table-bordered myTable">
              <thead>
                <tr class="text-center">
                  <th>#sl</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if('departments')
                @foreach($departments as $key=>$department)
                <tr class="text-center">
                  <td>{{++$key}}</td>
                  <td>{{$department->name??''}}</td>
                  <td >
                    <a href="{{route('department.edit',$department->id)}}" class="btb-sm btn btn-primary" title="Edit"><i class="fas fa-pen"></i>Edit</a>
                    <a href="javascript:;" class="btb-sm btn btn-danger sa-delete"  data-form-id="department-delete-{{$department->id}}" title="Delete"><i class="fas fa-trash-restore-alt"></i>Delete</a>
                    <form id="department-delete-{{$department->id}}" action="{{route('department.destroy',$department->id)}}" method="POST">
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