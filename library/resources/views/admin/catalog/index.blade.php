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
                Data Catalogs
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
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($catalogs as $key => $catalog)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $catalog -> name }}</td>
                    <td>{{ count($catalog -> books) }}</td>
                    <td>{{ date('d/m/y',strtotime($catalog -> created_at)) }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
@endsection
