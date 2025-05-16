@include('layout.header')
@include('layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">

        <div class="d-flex justify-content-between">
            <div class="mt-t">
                <h1>Data Program Studi</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Program Studi</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('prodi.create') }}" class="btn btn-primary" type="button">
                    <i class="bi bi-bookmark-plus-fill"> Add Program Studi</i>
                </a>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th class="text-center">
                                        <b>N</b>ama Prodi
                                    </th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodis as $prodi)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prodi->nama_prodi }}</td>
                                    <td>
                                        <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-primary"
                                            type="button">
                                            <i class="bi bi-pencil-fill"> Edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $prodi->id }}">
                                            <i class="bi bi-trash-fill"> Hapus</i>
                                        </button>
                                        <div class="modal fade" id="deleteModal{{ $prodi->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('prodi.destroy', $prodi->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Prodi -
                                                                {{ $prodi->nama_prodi }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data dibawah ini?<br>
                                                            <b>{{ $prodi->nama_prodi }}</b>
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