<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ url('pegawaiAjax') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'dt-center'
                },
                {
                    data: 'nama',
                    name: 'Nama'
                },
                {
                    data: 'email',
                    name: 'Email'
                },
                {
                    data: 'aksi',
                    name: 'Aksi'
                }
            ]
        });
    });

    // GLOBAL SETUP
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let var_url = "";
    let var_type = "";

    // PROSES SIMPAN
    $('body').on('click', '.tombol-tambah', function(e) {
        e.preventDefault();
        var_url = "";
        var_type = "";
        $('#exampleModal').modal('show');
        $('#url').val('pegawaiAjax');
        $('#method').val('POST');
    });



    // FUNGSI SIMPAN DAN UPDATE
    $('.tombol-simpan').on('click', function(){
            // var_url = "pegawaiAjax";
            // var_type = "POST"
            // simpan(var_url, var_type);
            $.ajax({
                url: $('#url').val(),
                type: $('#method').val(),
                data: {
                    nama: $('#nama').val(),
                    email: $('#email').val()
                },
                success: function(response) {
                    if(response.errors) {
                        console.log(response.errors);
                        $(".alert-danger").removeClass("d-none");
                        $(".alert-danger").append("<ul>");
                        $.each(response.errors, function(key, value){
                            $(".alert-danger").find('ul').append("<li>" + value + "</li>");
                        });
                        $(".alert-danger").append("</ul>");
                    } else {
                        $('.alert-success').removeClass('d-none');
                        $('.alert-success').html(response.success);
                    }
                    $('#myTable').DataTable().ajax.reload();
                }
            });
        });
    // var simpan = function(url,method) {
        // if(id !== null) {
        //     var_url = 'pegawaiAjax/' + id;
        //     var_type = 'PUT';
        // }
        // else {
        //     let var_url = 'pegawaiAjax/' + id;
        //     let var_type = 'PUT';
        // }

        // alert(url + ' ' + method);
        // $.ajax({
        //     url: url,
        //     type: method,
        //     data: {
        //         nama: $('#nama').val(),
        //         email: $('#email').val()
        //     },
        //     success: function(response) {
        //         if(response.errors) {
        //             console.log(response.errors);
        //             $(".alert-danger").removeClass("d-none");
        //             $(".alert-danger").append("<ul>");
        //             $.each(response.errors, function(key, value){
        //                 $(".alert-danger").find('ul').append("<li>" + value + "</li>");
        //             });
        //             $(".alert-danger").append("</ul>");
        //         } else {
        //             $('.alert-success').removeClass('d-none');
        //             $('.alert-success').html(response.success);
        //         }
        //         $('#myTable').DataTable().ajax.reload();
        //     }
        // });
    // }

    // PROSES EDIT
    $('body').on('click', '.tombol-edit', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'pegawaiAjax/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#exampleModal').modal('show');
                $('#nama').val(response.result.nama);
                $('#email').val(response.result.email);
                $('#url').val("pegawaiAjax/" + id);
                $('#method').val('PUT')
                console.log(response);
            }
        });
    });

    // PROSES DELETE
    $('body').on('click', '.tombol-del', function(e) {
        if(confirm("Yakin mau hapus data ini?") == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'pegawaiAjax/' + id,
                type: 'DELETE',
            });
            $('#myTable').DataTable().ajax.reload();
        }
    });


    $('#exampleModal').on('hidden.bs.modal', function(){
        $('#nama').val('');
        $('#email').val('');

        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');

        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');

        var_url = "";
        var_type = "";


    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
