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
            </div><!-- /.col -->
            <div class="col-md-6">
              <form action="{{ route('author.index') }}">
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
        <div id="author" class="container-fluid">
          <div class="row">
            <div class="col">
              @if ($errors->any())
                  <div class="alert alert-danger">
                    <div><strong>Failed</strong></div>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if (count($authors) === 0)
                <div class="card">
                  <div class="card-body">
                    <p><strong>Data not found.</strong></p>
                  </div>
                </div>
              @else
              <div class="card">
                  {{-- modal --}}
                  <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Author</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="quickFormAuthor" :action="actionUrl" method="POST">
                        <div class="modal-body">
                          <div class="card">
                            
                                @csrf()
                                <input v-if="editStatus" type="hidden" name="_method" value="PUT">

                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputNama1">Nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputNama1" placeholder="Masukkan Nama Publisher" :value="{{ json_encode(old('name')) }} || data.name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" :value="{{ json_encode(old('email')) }} || data.email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPhone1">Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputPhone1" placeholder="Enter Phone Number" :value="{{ json_encode(old('phone_number')) }} || data.phone_number" required>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputaddress1">Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputaddress1" placeholder="Enter address" :value="{{ json_encode(old('address')) }} || data.address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                      </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-6"><h3 class="card-title">DataTable with minimal features & hover style</h3></div>
                      
                      <div class="col-md-6">
                        {{-- <a href="{{ route('author.create') }}" type="button" class="btn btn-primary float-right">
                          <i class="fas fa-plus"></i><span> Add author</span>
                        </a> --}}
                        <button @click="addData()" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default">
                          <i class="fas fa-plus"></i><span> Add author</span>
                        </button>
                      </div>
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
                        @foreach ($authors as $key => $author)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                              {{ $author->name }}
                            </td>
                            <td>
                              {{ $author->email }}
                            </td>
                            <td>
                              {{ $author->phone_number }}
                            </td>
                            <td>
                              {{ $author->address }}
                            </td>
                            <td>{{ date("j F Y, H:i:s", strtotime($author->created_at))}}</td>
                            <td>
                              <div class="row">
                                <div class="col-md-6">
                                  {{-- <a href="{{ route('author.edit', ['author' => $author->id]) }}" type="button" class="btn btn-outline-warning">
                                    <i class="fas fa-pen"></i> --}}
                                    {{-- <span> Edit</span> --}}
                                  {{-- </a> --}}
                                  <button @click="editData({{ $author }})" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-pen"></i>
                                  </button>
                                </div>
                                <div class="col-md-6">
                                  <button type="submit" class="btn btn-outline-danger" @click="deleteData({{ $author->id }})">
                                    <i class="fas fa-trash"></i>
                                    {{-- <span> Delete</span> --}}
                                </button>
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
                      {{ $authors->links() }}
                    </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              @endif
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

@push('js')
{{-- vue --}}
<script type="text/javascript">
  var author = new Vue({
    el: '#author',
    data : {
      data: {
          name: '',
          email: '',
          phone_number: '',
          address: ''
        },
      actionUrl: '{{ route('author.store') }}',
      editStatus: false
    },
    mounted: function () {
      
    },
    methods: {
      addData(){
        this.actionUrl = '{{ route('author.store') }}'
        this.data = {
          name: '',
          email: '',
          phone_number: '',
          address: ''
        }
        this.editStatus = false
      },
      editData(val){
        this.editStatus = true
        this.data = val
        this.actionUrl = `{{ url('author') }}/${this.data.id}`
      },
      deleteData(id){
        this.actionUrl = `{{ url('author') }}/${id}`
        if (confirm('Are you sure ?')) {
          axios.post(this.actionUrl, {_method : 'DELETE'}).then(response => {
            location.reload();
          })
        }
      }
    }
  })

</script>
    
@endpush