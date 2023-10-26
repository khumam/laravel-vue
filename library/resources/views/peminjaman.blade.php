@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="{{ asset ('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

  <style>
    div.dataTables_wrapper div.dataTables_length select {
      min-width: 50px;
    }

    span.deleteicon {
        position: relative;
        display: inline-flex;
        align-items: center;
        width: 100%;
    }
    span.deleteicon span {
        position: absolute;
        display: block;
        right: 10px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        color: #fff;
        background-color: #ccc;
        font: 13px monospace;
        text-align: center;
        line-height: 1em;
        cursor: pointer;
    }
    span.deleteicon input {
        padding-right: 18px;
        box-sizing: border-box;
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
              <h1 class="m-0">Peminjaman</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div id="transaction" class="container-fluid">
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
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-4"><a href="{{ route('transaction.create') }}" type="button" class="btn btn-primary float-left">
                        <i class="fas fa-plus"></i><span> Add Peminjaman</span>
                      </a></div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select v-model="status" @change="changeFilter" class="custom-select">
                                <option value="" selected>Filter Status</option>
                                <option value="false">Belum Dikembalikan</option>
                                <option value="true">Sudah Dikembalikan</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="input-group" >
                                <div class="input-group-prepend" style="width: 100%;">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                  <span class="deleteicon">
                                    <input type="text" class="form-control float-right" id="reservation" placeholder="Filter Tanggal">
                                    <span onclick="var input = this.previousElementSibling; input.value = ''; transaction.filterDate='';">x</span>
                                  </span>
                                </div>
                                
                              </div>
                              <!-- /.input group -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="myTable2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Nama Peminjam</th>
                        <th>Lama Pinjam (hari)</th>
                        <th>Total Buku</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- /.card-body -->
              </div>
            </div>
          </div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col">
              Ini adalah halaman <strong>Transaction</strong>
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
<script>
  $(".form-control-sm").removeAttr('placeholder')
  setTimeout(() => {
      $(".form-control-sm").attr("placeholder", "Nama Peminjam");
  }, 500);
</script>
{{-- vue --}}
<script type="text/javascript">
  var apiUrl = 'api/transaction/list';
  var columns = [
              {
                  'data': 'date_start',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'date_end',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'namaPeminjam',
                  'class': 'text-center',
                  'width': '200px',
                  'orderable': true
              },
              {
                  'data': 'lamaPinjam',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'totalBuku',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'totalBayar',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'status',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  render: (index, row, data, meta) => {
                    return `
                    <a type="button" onclick=transaction.showData(event,${data.id}) class="btn btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                    </a>
                    <a type="button" onclick=transaction.editData(event,${data.id}) class="btn btn-outline-warning">
                                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" type="button" onclick=transaction.deleteData(event,${data.id}) class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                    </a>`
                  },
                  'width': '150px',
                  'orderable': false
              }
      ];

  var transaction = new Vue({
    el: '#transaction',
    data : {
      loading:false,
      data: {},
      datas: [],
      columns,
      status: "",
      filterDate: "",
      actionUrl: '{{ route('transaction.store') }}',
      editStatus: false
    },
    mounted: function () {
      this.dataTable();
    },
    created: function () {
    },
    methods: {
      changeDate(){
        this.table.ajax.url(apiUrl + (this.filterDate ? `?date=${this.filterDate}${this.status ? '&status='+this.status : ''}` : (this.status?`?status=${this.status}`:''))).load()
      },
      changeFilter(){
        this.table.ajax.url(apiUrl + (this.status ? `?status=${this.status}${this.filterDate ? '&date='+this.filterDate : ''}` : (this.filterDate?`?date=${this.filterDate}`:''))).load()
      },
      dataTable(){
       const _this = this
       _this.table =  $('#myTable2').DataTable({
                    order: [[0, 'desc']],
                    "processing": true,
                    "serverSide": true,
                    ajax: {
                        type: "get",
                        url:  apiUrl,
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
        this.actionUrl = '{{ route('transaction.store') }}'
        this.data = {}
        this.editStatus = false
      },
      editData(event, val){
      
        this.editStatus = true
        this.data = this.datas.filter(el => el.id == val)[0];
        console.log(this.data);
        this.actionUrl = `{{ url('transaction') }}/${this.data.id}/edit`
        location.replace(this.actionUrl)
      },
      showData(event, val){
      
        this.data = this.datas.filter(el => el.id == val)[0];
        this.actionUrl = `{{ url('transaction') }}/${this.data.id}`
        location.replace(this.actionUrl)
      },
      async deleteData(event,id){
        this.actionUrl = `{{ url('transaction') }}/${id}`
        console.log(axios);
        if (confirm('Are you sure ?')) {
         await axios.delete(this.actionUrl).then(response => {
            console.log(response);
            alert('Data has been removed')
            this.table.ajax.reload()
          }).catch(error => {
            console.log(error);
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
    },
    watch:{
      filterDate: function () {
        this.changeDate();
      }
    }
  })

</script>

<script defer>
  $(function () {
    //Date range picker

    $('#reservation').daterangepicker({locale: {
        format: 'DD/MM/YYYY'
      }}).on('change', function (el) {
        const value = el.currentTarget.value.split(" ").join("");
        transaction.filterDate = value.split('-');
      })[0].value = "";
  })
</script>
    
@endpush