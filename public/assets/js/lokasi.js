$(document).ready(function () {

    loadLokasi();

    $(".btn-tambahLokasi").on("click", function () {
        $("#mdTambahLokasi").modal("show");
    });

    function loadLokasi() {
        lokasiTable = $('#tableLokasi').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            ajax: {
                url: `/lokasi/getLokasi`, // Ganti dengan URL endpoint server Anda
                type: 'GET', // Metode HTTP (GET/POST)
                dataSrc: 'Data' // Jalur data di response JSON
            },
            columns: [
                {
                    data: null, // Kolom nomor urut
                    render: function (data, type, row, meta) {
                        return meta.row + 1; // Nomor urut dimulai dari 1
                    },
                    orderable: false,
                },
                {
                    data: 'lokasi',
                },
                {
                    data: 'status',
                    render: function (data, type, row) {
                        // Menampilkan badge sesuai dengan status
                        if (data == 1) {
                            return `<span class="badge badge-sm bg-outline-success"> Active</span>`;
                        } else if (data == 2) {
                            return `<span class="badge badge-sm bg-outline-danger"> Inactive</span>`;
                        } else {
                            return `<span class="badge badge-sm bg-outline-secondary"> Unknown</span>`;
                        }
                    }
                },
                {
                    data: null,        // Kolom aksi
                    orderable: false,  // Aksi tidak perlu diurutkan
                    className: "action-table-data",
                    render: function (data, type, row, meta) {
                        return `
                        <div class="edit-delete-action">
                            <a class="me-2 p-2 btn-edit" data-id="${row.id}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit Data">
                                <i data-feather="edit" class="feather-edit"></i>
                            </a>
                            <a class="confirm-text p-2" data-id="${row.id}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus Data">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                        </div>
                    `;
                    }
                }
            ],
        });
    }

    //kirim data ke server
    $("#storeLokasi").on("submit", function (event) {
        event.preventDefault(); // Mencegah form submit secara default
        // Ambil elemen input file

        // Buat objek FormData
        const formData = new FormData(this);
        $.ajax({
            url: "/lokasi", // Endpoint Laravel untuk menyimpan pegawai
            type: "POST",
            data: formData,
            processData: false, // Agar data tidak diubah menjadi string
            contentType: false, // Agar header Content-Type otomatis disesuaikan
            success: function (response) {

                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'success',
                    title: response.message
                })

                $("#mdTambahLokasi").modal("hide"); // Tutup modal
                $("#storeLokasi")[0].reset(); // Reset form
                lokasiTable.ajax.reload(); // Reload data dari server
            },
            error: function (xhr) {
                // Tampilkan pesan error dari server
                const errors = xhr.responseJSON.errors;
                if (errors) {
                    let errorMessage = "";
                    for (let key in errors) {
                        errorMessage += `${errors[key][0]}\n`;
                    }
                    Toast.fire({
                        icon: 'error',
                        title: errorMessage
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    })
                }
            },
        });
    });
});