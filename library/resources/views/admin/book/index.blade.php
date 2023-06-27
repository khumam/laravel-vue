@extends('layouts.admin')

@section('content')
<div id = "controller">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Book</h1>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-md-5 offset-md-3">
                        <div class = "input-group mb-3">
                            <div class = "input-group-prepend">
                                <span class = "input-group-text"><i class = "fas fa-search"></i></span>
                            </div>
                            <input type = "text" class = "form-control" autocomplete = "off" placeholder = "Search from title" v-model = "search">
                        </div>
                    </div>

                    <div class = "col-md-2">
                        <button class = "btn btn-primary" @click="addData()">Create New Book</button>
                    </div>
                </div>

                <hr>

                <div class = "row">
                    <div class = "col-md-3 col-sm-6 col-xs-12" v-for = "book in filteredList">
                        <div class = "info-box" v-on:click="editData(book)">
                            <div class = "info-box-content">
                                <span class = "info-box-text h5">@{{book.title}} (@{{book.qty}})</span>
                                <span class = "info-box-number">Rp.@{{numberWithSpaces(book.price)}},-<small></small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" :action="actionUrl" autocomplete="off">
                            <div class="modal-header">
                            <h4 class="modal-title">Book</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div> 
                            <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="number" class="form-control" name="isbn" placeholder="Enter ISBN" :value = "book.isbn" required="">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title" :value = "book.title" required="">
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" class="form-control" name="year" placeholder="Enter Year" :value = "book.year" required="">
                            </div>
                            <div class="form-group">
                                <label>Publisher</label>
                                <select name="publisher_id" class="form-control">
                                    @foreach($publishers as $publisher)
                                    <option :selected="book.publisher_id == {{ $publisher->id }}" value = "{{$publisher->id}}">{{$publisher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <select name="author_id" class="form-control">
                                    @foreach($authors as $author)
                                    <option :selected="book.author_id == {{ $author->id }}" value = "{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Catalog</label>
                                <select name="catalog_id" class="form-control">
                                    @foreach($catalogs as $catalog)
                                    <option :selected="book.catalog_id == {{ $catalog->id }}" value = "{{$catalog->id}}">{{$catalog->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>QTY</label>
                                <input type="number" class="form-control" name="qty" placeholder="Enter QTY" :value = "book.qty" required="">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter Price" :value = "book.price" required="">
                            </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                     /.modal-content
                </div>
                <!-- /.modal-dialog -->
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  var actionUrl = '{{url('books')}}';
  var apiUrl = '{{url('api/books')}}';

  var app = new Vue({
    el: '#controller',
    data: {
        books: [],
        search: '',
        book: {},
        editStatus: false
    },
    mounted: function(){
        this.get_books();
    },
    methods: {
        get_books(){
            const _this = this;
            $.ajax({
                url: apiUrl,
                method:'GET',
                success: function(data){
                    _this.books = JSON.parse(data);
                },
                error: function(error){
                    console.log(error);
                }
            });
        },
        numberWithSpaces(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        },
        addData(){
            this.editStatus= false;
            this.book = {};
            $('#modal-default').modal();
        },
        editData(book){
            this.editStatus= true;
            this.book = book;
            this.actionUrl = '{{url('books')}}'+'/'+book.id;
            $('#modal-default').modal();
        },
        deleteData(id){
            this.actionUrl = '{{url('books')}}'+'/'+id;
            if(confirm("Are You Sure ?")){
              axios.post(this.actionUrl, {_method:'DELETE'}).then(response => {
                location.reload();
              });
            }
          }
    },
    computed: {
        filteredList(){
            return this.books.filter(book=>{
                return book.title.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }
  })
</script>
@endsection