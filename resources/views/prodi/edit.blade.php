@include('layout.header')
@include('layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Data Program Studi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Data Program Studi</li>
                <li class="breadcrumb-item active">Tambah Data Program Studi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <br>
                <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                                value="{{ $prodi->nama_prodi }}" required>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- End Horizontal Form -->

            </div>
        </div>
    </section>
</main>
@include('layout.footer')