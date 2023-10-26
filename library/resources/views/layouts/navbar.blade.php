<nav id="notification" class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}
      <!-- Notifications Dropdown Menu -->
      <li v-if="loading" class="spinner-border nav-item" role="status" style="position: relative; top: 10px;">
        <span class="sr-only">Loading...</span>
      </li>
      <li v-else class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">@{{ total }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">@{{ total }} Notifications</span>
          <div v-for="data in datas" :key="data.id">
            <div class="dropdown-divider"></div>
            <a :href="`{{ url('transaction') }}/${data.id}`" class="dropdown-item" style="display: flex; justify-content:space-between;">
             <strong>
              @{{ data.member.name.slice(0, 10) }}
            </strong>
            <span>
              terlambat
            </span>
              <span class="float-right text-muted text-sm">@{{ data.terlambat || 0 }} hari</span>
            </a>
          </div>
          <div class="card-tools" style="padding-bottom: 8px;">
            <ul class="pagination pagination-md" style="justify-content: space-around;">
              <li class="page-item"><button @click="handlePage($event,'false')" :disabled="page==1">Previous</button></li>
              <li class="page-item"><button @click="handlePage($event,'true')" :disabled="page==lastPage">Next</button></li>
            </ul>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
  </nav>

  @push('js')
  <script type="text/javascript">
    var transaction = new Vue({
      el: '#notification',
      data : {
        loading:false,
        datas: [],
        page: 1,
        total: 0,
        lastPage: 1,
        interval: null
      },
      mounted: function () {
        this.interval = setInterval(this.fetchData, 10000);
        this.fetchData();
        // window.addEventListener('scroll', this.handleScroll);
      },
      beforeDestroy() {
        // Clear the interval when the component is destroyed to prevent memory leaks
        clearInterval(this.interval);
      },
      methods: {
        handlePage(ev,val) {
          switch (val) {
            case 'true':
              if (this.page < this.lastPage) {
                this.page++;
              }
              break;
            case 'false':
              if (this.page > 1) {
                this.page--;
              }
              break;
          }

          this.fetchData();
          
        },
        async fetchData(){
          if (this.loading || this.noMoreData) return;
          this.loading = true
          let url = `/api/transaction/notif`;
           await axios.get(url, { params: { page: this.page} }).then(response => {
              console.log(response);
              this.datas = response.data.data.data;
              this.total = response.data.data.total || 0;
              this.lastPage = response.data.data.last_page || 1;
              
              this.loading = false;
            }).catch(error => {
              this.loading = false;
              console.log(error);
            })
        },
      }
    })
  
  </script>
  @endpush