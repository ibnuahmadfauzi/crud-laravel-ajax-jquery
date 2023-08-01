<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Data Pegawai</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-light">
        <main class="container">

            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <!-- TOMBOL TAMBAH DATA -->
                    <div class="pb-3">
                    <div class="text-center mb-2">
                        <a href='' class="btn btn-outline-primary tombol-tambah"><i class="fa-solid fa-square-plus"></i> Tambah Data</a>
                    </div>
                    </div>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-5 text-center">Nama</th>
                                <th class="col-md-4 text-center">Email</th>
                                <th class="col-md-2 text-center"><i class="fa-solid fa-gear"></i></th>
                            </tr>
                        </thead>
                    </table>
                    <div class="text-center mt-3 text-secondary">
                        <p>Aplikasi CRUD Laravel - Ajax - jQuery</p>
                    </div>
            </div>
            <!-- AKHIR DATA -->
        </main>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- START FORM -->
                    <input type="hidden" id="url" value="">
                    <input type="hidden" id="method" value="">
                    <div class="alert alert-danger d-none"></div>
                    <div class="alert alert-success d-none"></div>
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='nama' id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='email' id="email">
                            </div>
                        </div>
                    </div>
                    <!-- AKHIR FORM -->
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tombol-simpan">SIMPAN</button>
                </div>
            </div>
            </div>
        </div>
        @include('pegawai.script')
    </body>
</html>