@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogs</h1>
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
                <h5>Data Catalogs</h5>
                <a href="{{route('catalog.create')}}" class = "btn btn-primary mt-2">Create Catalog</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Catalog</th>
                    <th>Total Books</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($catalogs as $key => $catalog)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $catalog -> name }}</td>
                    <td>{{ count($catalog -> books) }}</td>
                    <td>{{ date('d/m/y',strtotime($catalog -> created_at)) }}</td>
                    <td><form action="{{route('catalog.destroy', $catalog->id)}}" method="post">
                        @csrf
                        <a href="{{route('catalog.edit', $catalog->id)}}" class = "btn btn-primary me-2">Edit</a>
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
