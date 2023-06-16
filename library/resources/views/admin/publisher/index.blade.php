@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Publisher</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5>Data Publisher</h5>
                <a href="{{route('publisher.create')}}" class = "btn btn-primary mt-2">Input Publisher</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Total Books</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($publishers as $key => $publisher)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $publisher -> name }}</td>
                    <td>{{ $publisher -> email }}</td>
                    <td>{{ $publisher -> address }}</td>
                    <td>{{ $publisher -> phone_number }}</td>
                    <td>{{ count($publisher -> books) }}</td>
                    <td><form action="{{route('publisher.destroy', $publisher->id)}}" method="post">
                        @csrf
                        <a href="{{route('publisher.edit', $publisher->id)}}" class = "btn btn-primary me-2">Edit</a>
                        <button class = "btn btn-danger" onClick="return confirm('Are you sure for delete ?')">Delete</button>
                    </form></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
@endsection
