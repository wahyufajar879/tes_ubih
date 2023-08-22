
@include('layouts.headers')

@include('layouts.sidebar')

@include('layouts.navbar')


<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

 @include('layouts.content')

 @if (Session::has('Success'))
 <div class="col-12 col-lg-12">
     <div class="alert alert-success">
         {{ Session::get('Success') }}
     </div>
 </div>

 @endif


	</div><!--End Row-->

	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">

         <div class="card-body">
            <h5 class="card-title">Tabel Siswa</h5>
            <div class="table-responsive">
            <table class="table table-hover">
                <div class="pb-3">
                    <a href="{{ url('siswa/create') }}" class="btn btn-primary"><i class="zmdi zmdi-account-add"></i> Tambah Data</a>
                </div>
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = $data->firstItem()?>
                @foreach ($data as $item)

                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $item->nim }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->tanggal_lahir }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->jenis_kelamin }}{{ $item->jeniskelamin->jenis_kelamin }}</td>
                  <td>
                    <a href="{{ url('siswa/'.$item->nim.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin Akan Menghapus Data?')" class="d-inline" action="{{ url('siswa/'.$item->nim) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>

                    </form>
                  </td>
                </tr>
                <?php $i++ ?>
                @endforeach

              </tbody>
            </table>
            {{ $data->withQueryString()->links() }}
          </div>
          </div>
	   </div>
	 </div>
	</div><!--End Row-->

      <!--End Dashboard Content-->

	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

	@include('layouts.footer')

  <!--start color switcher-->
   {{-- <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>

      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>

      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>

     </div>
   </div>
  <!--end color switcher--> --}}

  </div><!--End wrapper-->

  @include('layouts.headers')
