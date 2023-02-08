<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('front/assets/img/navbar-logo.svg') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                        <form class="d-none d-md-flex" action="{{ url('/welcome') }}">
                            <input class="form-control border-0" type="search" placeholder="Search" name="search" value="{{ request('search') }}">
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Selamat Datang di Website Pengaduan</div>
                <div class="masthead-heading text-uppercase">Klik tombol dibawah ini untuk mulai melapor</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#contact">Laporkan</a>
            </div>
        </header>
         <!-- Services-->
         <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Pengaduan</h2>
                    <h3 class="section-subheading text-muted">Data Pengaduan</h3>
                </div>
                <div class="row text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">No</th>
                                    <th scope="col" style="text-align:center;">Nama</th>
                                    <th scope="col" style="text-align:center;">Lokasi</th>
                                    <th scope="col" style="text-align:center;">Keterangan</th>
                                    <th scope="col" style="text-align:center;">Foto</th>
                                    <th scope="col" colspan="3" style="text-align:center;" width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pengaduans)>0)
                                @foreach ($pengaduans as $pengaduan)
                                <tr>
                                    <th scope="row" style="text-align:center;">{{ $loop->iteration }}</th>
                                    <td style="text-align:center;">{{ $pengaduan->siswa->nama }}</td>
                                    <td style="text-align:center;">{{ $pengaduan->lokasi }}</td>
                                    <td style="text-align:center;">{{ $pengaduan->keterangan }}</td>
                                    <td style="text-align:center;"><a href="{{ asset('foto') }}/{{ $pengaduan->foto }}" target="_blank"><img src="{{ asset('foto') }}/{{ $pengaduan->foto }}" width="120px"></a></td>
                                    <td style="text-align:center;"><a href="{{ route('pengaduan.show', [$pengaduan->id]) }}"
                                            class="btn btn-warning">View</a></td>
                                    <td style="text-align:center;"><a href="{{ route('pengaduan.edit', [$pengaduan->id]) }}"
                                            class="btn btn-info">Edit</a></td>
                                    <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal{{$pengaduan->id}}">Delete</button></td>
                                </tr>
                                @endforeach
                                @else
                                <td colspan="7" style="text-align:center;"><br>
                                    <p>Tidak ada pengaduan yang dapat ditampilkan.</p>
                                </td>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </section>
        <!-- Form Pengaduan-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Pengaduan</h2>
                    <h3 class="section-subheading text-muted">Berikan pengaduan mu di form dibawah ini</h3>
                    @if(Session::has('message'))
                    <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} </p>
                    @endif
                </div>
                <form id="contactForm" action="{{ route('pengaduan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <label for="">Nama Siswa</label>
                            <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror" style="height:3em">
                                <option value="">Pilih Nama Siswa</option>
                                @foreach(App\Models\Siswa::all() as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                
                                @error('siswa_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <label for="">Kategori</label>
                            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror"  style="height:3em">
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Kategori::all() as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->keterangan }}</option>
                                @endforeach
                
                                @error('kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror"  placeholder="Lokasi" id="phone">
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input type="file" name="foto" class = "form-control @error('foto') is-invalid @enderror" placeholder="Foto" style="margin-top:1.5em;">
                                @error('foto')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                                
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea name="keterangan" class = "form-control @error('keterangan') is-invalid @enderror" id="message" placeholder="Keterangan">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Submit</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
