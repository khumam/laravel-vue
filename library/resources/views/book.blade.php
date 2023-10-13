@extends('layouts.app')

@push('css')
    <style>
      .card {
        min-height: 150px;
      }

      .list:hover{
        box-shadow: 5px 5px #343A40;
      }

      .loader {
        width: 48px;
        height: 48px;
        border: 5px solid grey;
        border-bottom-color: transparent;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
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
    <div id="book" class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ $data['title'] }}</h1>
              <button style="margin-top: 20px;" @click="addData()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus"></i><span> Add Book</span>
              </button>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="input-group">
                    <input class="form-control form-control-md" placeholder="Type Judul Buku" v-model="search"
                    @keypress="doSearchBook"
                    @clear="doSearchBook"
                    @keyup="doSearchBook">
                    <div class="input-group-append">
                        <button class="btn btn-md btn-default btn-outline-secondary" style="border-color: rgb(222, 226, 230);" disabled>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
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
              {{-- modal --}}
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">book</h4>
                      <button ref="close" id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form id="quickFormbook" @submit=submitForm($event)>
                    <div class="modal-body">
                      <div class="card">
                        
                            @csrf()
                            <input v-if="editStatus" type="hidden" name="_method" value="PUT">

                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputisbn1">ISBN</label>
                                <input type="number" name="isbn" class="form-control @error('isbn') is-invalid @enderror" id="exampleInputisbn1" placeholder="Masukkan ISBN" v-model="{{ json_encode(old('isbn')) }} || data.isbn" required>
                                @error('isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputtitle1">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputtitle1" placeholder="Enter title" v-model="{{ json_encode(old('title')) }} || data.title" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="year">Tahun</label>
                                <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="year" v-model="{{ json_encode(old('year')) }} || data.year" required autocomplete="new-year">
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="publisher">Publisher</label>
                                <select id="publisher" name="publisher_id" v-model="{{ json_encode(old('publisher_id')) }} || data.publisher_id" class="form-select" aria-label=".form-select example">
                                  @foreach($publishers as $publisher)
                                  <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                  @endforeach
                                </select>
                                @error('publisher_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="author">Author</label>
                                <select id="author" name="author_id" v-model="{{ json_encode(old('author_id')) }} || data.author_id" class="form-select" aria-label=".form-select example">
                                  @foreach($authors as $author)
                                  <option value="{{ $author->id }}">{{ $author->name }}</option>
                                  @endforeach
                                </select>
                                @error('author_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="catalog">Catalog</label>
                                <select id="catalog" name="catalog_id" v-model="{{ json_encode(old('catalog_id')) }} || data.catalog_id" class="form-select" aria-label=".form-select example">
                                  @foreach($catalogs as $catalog)
                                  <option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                  @endforeach
                                </select>
                                @error('catalog_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputqty1">Qty Stock</label>
                                <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" id="exampleInputqty1" placeholder="Enter Jumlah Stock" v-model="{{ json_encode(old('qty')) }} || data.qty" required>
                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputprice1">Harga Pinjam</label>
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="exampleInputprice1" placeholder="Enter price" v-model="{{ json_encode(old('price')) }} || data.price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button v-if="editStatus" @click="deleteData(data.id)" type="button" class="btn btn-danger">Delete</button>
                          <button type="submit" class="btn btn-primary">
                            <div v-if=loading class="spinner-border" role="status">
                              <span class="sr-only">Loading...</span>
                            </div>
                            @{{ editStatus ? 'Update' : 'Add' }}
                          </button>
                        </div>
                    </div>
                  </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <div v-if="getLoading" class="row"><div class="col" style="text-align: center;">
                <span class="loader"></span>
              </div>
              </div>
              <div v-else class="row">
                <div class="col" style="text-align: center;" v-if="datas.length == 0"><strong>Data Not Found</strong></div>
                <div v-for="book in datas" class="col-md-3">
                  <div style="cursor: pointer;" class="card list" :key="book.id" @click="editData(book.id)" data-toggle="modal" data-target="#modal-default">
                  
                    <div class="card-header">
                      <div class="row">
                        <div class="col"><h3 class="card-title">@{{ book.title }}</h3></div>
                      </div>
                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row"><div class="col">@{{ convertToRupiah(book.price) }}</div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                </div>
              </div>
              
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
  const actionUrl = '{{ route('book.store') }}'

  var book = new Vue({
    el: '#book',
    data : {
      // apiUrl: {{ url('api/book/list') }},
      getLoading: false,
      loading:false,
      data: {},
      datas: [],
      actionUrl,
      editStatus: false,
      search: "",
      timeout: null
    },
    mounted: function () {
      this.getData();
    },
    // Untuk search di sisi FE
    // computed: {
    //   filterBooks(){
    //     return this.datas.filter(el => {
    //       return el.title.toLowerCase().includes(this.search.toLowerCase())
    //     })
    //   }
    // },
    methods: {
      // Untuk search di sisi BE
      doSearchBook(ev) {
        clearTimeout(this.timeout);
        this.timeout = setTimeout(() => {
          if (this.search.length >= 1) {
          this.getData(this.search);
          } else {
          this.getData();
          }
        }, 300);
		  },
      convertToRupiah(angka)
      {
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('') + ' ,-';
      },
     async getData(search){
       this.getLoading = true;
       this.actionUrl = "{{ url('api/book/list') }}"
       await axios({
				method: 'get',
				url: this.actionUrl,
				params: {search: search}}).then(response => {
        if (response.status == 200) {
          this.datas = response.data
        }
        this.getLoading = false;
        })
        .catch(error=>{
          console.log(error);
          this.getLoading = false;
        })
      },
      addData(){
        this.actionUrl = '{{ route('book.store') }}'
        this.data = {
          isbn: '',
          title: ''
        }
        this.editStatus = false
      },
      editData(val){
        console.log(val, this.datas);
        this.editStatus = true
        this.data = {...this.datas.filter(el => el.id == val)[0]};
        console.log(this.data);
        this.actionUrl = `{{ url('book') }}/${this.data.id}`
        // $('#modal-default').modal();
      },
      deleteData(id){
        this.actionUrl = `{{ url('book') }}/${id}`
        if (confirm('Are you sure ?')) {
          axios.post(this.actionUrl, {_method : 'DELETE'}).then(response => {
            const element = this.$refs.close;
            // Check if the element exists and trigger the click event close modal
            if (element) {
              element.click();
            }
            setTimeout(() => {
              alert('Data has been removed')
            }, 500);
            this.getData()
          })
        }
      },
      submitForm(event){
        event.preventDefault();
        this.loading = true;
        axios.post(this.actionUrl, new FormData($(event.target)[0])).then( response => {
          this.getData()
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