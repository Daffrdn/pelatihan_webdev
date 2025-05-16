@include('layout.header')
@include('layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Data Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a></li>
                <li class="breadcrumb-item active">Tambah Data Mahasiswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <br>
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                                value="{{ $mahasiswa->nama_mahasiswa }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="umur" name="umur"
                                value="{{ $mahasiswa->umur }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="no_wa" name="no_wa"
                                value="{{ $mahasiswa->no_wa }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Program Studi</label>
                        <div class="col-sm-10">
                            <select id="nama_prodi" name="nama_prodi" class="form-select">
                                <option selected value="{{ $mahasiswa->nama_prodi }}">{{ $mahasiswa->nama_prodi }}
                                </option>
                                @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->nama_prodi }}">{{ $prodi->nama_prodi }}
                                </option>
                                @endforeach
                            </select>
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