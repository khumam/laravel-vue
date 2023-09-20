@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset ('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake"  src="{{ asset ('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
  
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-md-6">
              <h1 class="m-0">{{ $data['title'] }}</h1>
            </div>
            <div class="col-md-6">
              <form action="{{ route('publisher.index') }}">
                <div class="input-group">
                    <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" name="search" value="{{ request('search') ?? '' }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default btn-outline-secondary" style="border-color: rgb(222, 226, 230);">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col">
                  @if (count($publishers) === 0)
                    <div class="card">
                      <div class="card-body">
                        <p><strong>Data not found.</strong></p>
                      </div>
                    </div>
                  @else
                  <div class="card">
                      <div class="card-header">
                        <div class="row">
                          <div class="col-md-6"><h3 class="card-title">DataTable with minimal features & hover style</h3></div>
                          
                          <div class="col-md-6"><a href="{{ route('publisher.create') }}" type="button" class="btn btn-primary float-right">
                            <i class="fas fa-plus"></i><span> Add Publisher</span>
                          </a></div>
                        </div>
                        
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($publishers as $key => $publisher)
                              <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                  {{ $publisher->name }}
                                </td>
                                <td>
                                  {{ $publisher->email }}
                                </td>
                                <td>
                                  {{ $publisher->phone_number }}
                                </td>
                                <td>
                                  {{ $publisher->address }}
                                </td>
                                <td>{{ date("j F Y, H:i:s", strtotime($publisher->created_at))}}</td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="{{ route('catalog.edit', ['catalog' => $publisher->id]) }}" type="button" class="btn btn-outline-warning">
                                        <i class="fas fa-pen"></i><span> Edit</span>
                                      </a>
                                    </div>
                                    <div class="col-md-6">
                                      <form action="{{ route('catalog.destroy', ['catalog' => $publisher->id]) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure ?')">
                                            <i class="fas fa-trash"></i><span> Delete</span>
                                        </button>
                                    </form>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                          {{-- <tfoot>
                          <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                          </tr>
                          </tfoot> --}}
                        </table>
                        <div class="pagination">
                          {{ $publishers->links() }}
                        </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col">
              Ini adalah halaman <strong>{{ $data['title'] }}</strong>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

@endsection