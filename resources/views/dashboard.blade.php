@include('layout.header')
@include('layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Mahasiswa</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $jumlahMahasiswa }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Data Program Studi</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bookmarks-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $jumlahProdi }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chart Jumlah mahasiswa berdasarkan Prodi</h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        chart: {
                                            height: 350,
                                            type: 'bar', // Bar chart untuk melihat ranking
                                        },
                                        series: [{
                                            name: 'Jumlah Mahasiswa',
                                            data: @json(
                                                $data) // Data jumlah mahasiswa per prodi
                                        }],
                                        xaxis: {
                                            categories: @json(
                                                $categories), // Nama-nama prodi sebagai kategori
                                        },
                                        dataLabels: {
                                            enabled: true
                                        },
                                        title: {
                                            text: 'Jumlah Mahasiswa per Program Studi',
                                            align: 'center'
                                        },
                                        colors: ['#FF4560', '#008FFB', '#00E396', '#FEB019', '#775DD0',
                                            '#546E7A'
                                        ]
                                    }).render();
                                });
                                </script>

                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main>
@include('layout.footer')