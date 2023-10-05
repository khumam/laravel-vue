@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="{{ asset ('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

  <style>
    div.dataTables_wrapper div.dataTables_length select {
      min-width: 50px;
    }
  </style>
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
            <div class="col-sm-6">
              <h1 class="m-0">{{ $data['title'] }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div id="member" class="container-fluid">
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
              <div class="card">
                  {{-- modal --}}
                  <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Member</h4>
                          <button ref="close" id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="quickFormmember" @submit=submitForm($event)>
                        <div class="modal-body">
                          <div class="card">
                            
                                @csrf()
                                <input v-if="editStatus" type="hidden" name="_method" value="PUT">

                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputNama1">Nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputNama1" placeholder="Masukkan Nama" v-model="{{ json_encode(old('name')) }} || data.name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" v-model="{{ json_encode(old('email')) }} || data.email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" v-model="{{ json_encode(old('password')) }} || data.password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password" v-model="{{ json_encode(old('new_password')) }} || data.new_password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Gender</label>
                                    <select class="form-select" aria-label=".form-select example">
                                      <option selected>Pilih Satu</option>
                                      <option value="L">Laki - Laki</option>
                                      <option value="P">Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPhone1">Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputPhone1" placeholder="Enter Phone Number" v-model="{{ json_encode(old('phone_number')) }} || data.phone_number" required>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputaddress1">Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputaddress1" placeholder="Enter address" v-model="{{ json_encode(old('address')) }} || data.address">
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
                              <button type="submit" class="btn btn-primary">
                                <div v-if=loading class="spinner-border" role="status">
                                  <span class="sr-only">Loading...</span>
                                </div>
                                Submit
                              </button>
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
                        {{-- <a href="{{ route('member.create') }}" type="button" class="btn btn-primary float-right">
                          <i class="fas fa-plus"></i><span> Add member</span>
                        </a> --}}
                        <button @click="addData()" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default">
                          <i class="fas fa-plus"></i><span> Add member</span>
                        </button>
                      </div>
                    </div>
                    
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="myTable2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Action</th>
                      </tr>
                      </thead>
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
                    {{-- <div class="pagination">
                      {{ $members->links() }}
                    </div> --}}
                  </div>
                  <!-- /.card-body -->
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

@push('js')
{{-- vue --}}
<script type="text/javascript">
  var columns = [
              {
                  'data': 'DT_RowIndex',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'name',
                  'class': 'text-center',
                  'width' : '200px',
                  'orderable': true
              },
              {
                  'data': 'gender',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'email',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'phone_number',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'address',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  render: (index, row, data, meta) => {
                    return `
                    <a href="#" type="button" onclick=member.editData(event,${data.id}) class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" type="button" onclick=member.deleteData(event,${data.id}) class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                    </a>`
                  },
                  'width': '100px',
                  'orderable': false
              }
      ];

  var member = new Vue({
    el: '#member',
    data : {
      // apiUrl: {{ url('api/member/list') }},
      loading:false,
      data: {},
      datas: [],
      columns,
      actionUrl: '{{ route('member.store') }}',
      editStatus: false
    },
    mounted: function () {
      this.dataTable();
    },
    created: function () {
    },
    methods: {
      dataTable(){
       const _this = this
       _this.table =  $('#myTable2').DataTable({
                    "processing": true,
                    "serverSide": true,
                    ajax: {
                        url:  'api/member/list',
                        error: function (xhr, error, thrown) {
                            console.log('Kesalahan AJAX:', error);
                            console.log('Detail Kesalahan:', thrown);
                            // Tindakan yang sesuai, misalnya menampilkan pesan kesalahan kepada pengguna
                        }
                    },
                    columns:  _this.columns
                    }).on('xhr', function () {
                      // console.log(_this.table.ajax.json().data);
                      _this.datas = _this.table.ajax.json().data;
                    })
      },
      addData(){
        this.actionUrl = '{{ route('member.store') }}'
        this.data = {
          name: '',
          gender: '',
          email: '',
          phone_number: '',
          address: ''
        }
        this.editStatus = false
      },
      editData(event, val){
        console.log(event, val, this.datas);
        this.editStatus = true
        this.data = this.datas.filter(el => el.id == val)[0];
        console.log(this.data);
        this.actionUrl = `{{ url('member') }}/${this.data.id}`
        // $('#modal-default').modal();
      },
      deleteData(event,id){
        this.actionUrl = `{{ url('member') }}/${id}`
        if (confirm('Are you sure ?')) {
          axios.post(this.actionUrl, {_method : 'DELETE'}).then(response => {
            alert('Data has been removed')
            this.table.ajax.reload()
          })
        }
      },
      submitForm(event){
        event.preventDefault();
        this.loading = true;
        axios.post(this.actionUrl, new FormData($(event.target)[0])).then( response => {
          this.table.ajax.reload()
          this.loading = false
          const element = this.$refs.close;
          // Check if the element exists and trigger the click event close modal
          if (element) {
            element.click();
          }
          
        })
      }
    }
  })

</script>
    
@endpush