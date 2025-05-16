@include('layout.header')
@include('layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">

        <div class="d-flex justify-content-between">
            <div class="mt-t">
                <h1>Data Mahasiswa</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Mahasiswa</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary" type="button">
                    <i class="bi bi-person-plus"> Add Mahasiswa</i>
                </a>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <br>
                        <table class="table datatable">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th class="text-center">
                                        <b>N</b>ame
                                    </th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Umur</th>
                                    <th class="text-center">No Whatsapp</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $mahasiswa)
                                <tr align="center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                    <td>{{ $mahasiswa->nama_prodi }}</td>
                                    <td>{{ $mahasiswa->umur }}</td>
                                    <td>{{ $mahasiswa->no_wa }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-primary"
                                            type="button">
                                            <i class="bi bi-pencil-fill"> Edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $mahasiswa->id }}">
                                            <i class="bi bi-trash-fill"> Hapus</i>
                                        </button>
                                        <div class="modal fade" id="deleteModal{{ $mahasiswa->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Mahasiswa -
                                                                {{ $mahasiswa->nama_mahasiswa }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data dibawah ini?<br>
                                                            <b>{{ $mahasiswa->nama_mahasiswa }}</b>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@include('layout.footer')