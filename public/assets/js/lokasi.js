$(document).ready(function () {
    loadLokasi();

    $(document).on("click", "#btnRefresh", function () {
        if (lokasiTable) {
            lokasiTable.ajax.reload(); // Reload data dari server
        }
        var Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
        });

        Toast.fire({
            icon: "success",
            title: "Data Lokasi Berhasil Di Refresh",
        });
    });

    $(".btn-tambahLokasi").on("click", function () {
        $("#mdTambahLokasi").modal("show");
    });

    // Inisialisasi tooltip Bootstrap
    function initializeTooltip() {
        $('[data-toggle="tooltip"]').tooltip()
    }

    function loadLokasi() {
        lokasiTable = $("#tableLokasi").DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            ajax: {
                url: `/lokasi/getLokasi`, // Ganti dengan URL endpoint server Anda
                type: "GET", // Metode HTTP (GET/POST)
                dataSrc: "Data", // Jalur data di response JSON
            },
            columns: [
                {
                    data: null, // Kolom nomor urut
                    className: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + 1; // Nomor urut dimulai dari 1
                    },
                    orderable: false,
                },
                {
                    data: "lokasi",
                    className: "text-center",
                },
                {
                    data: "status",
                    className: "text-center",
                    render: function (data, type, row) {
                        // Menampilkan badge sesuai dengan status
                        if (data == 1) {
                            return `<span class="badge badge-success">Aktif</span>`;
                        } else if (data == 2) {
                            return `<span class="badge badge-danger"> Tidak Aktif</span>`;
                        } else {
                            return `<span class="bg-dark"> Unknown</span>`;
                        }
                    },
                },
                {
                    data: null, // Kolom aksi
                    orderable: false, // Aksi tidak perlu diurutkan
                    className: "text-center",
                    render: function (data, type, row, meta) {
                        return `
                        <button type="button" class="btn btn-outline-warning btn-sm btnedit" data-id="${row.id}" data-toggle="tooltip" data-placement="top" title="EDIT DATA"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger btn-sm btndelete" data-id="${row.id}" data-toggle="tooltip" data-placement="top" title="HAPUS DATA"><i class="fa fa-trash"></i></button>
                    `;
                    },
                },
            ],
            drawCallback: function () {
                // Re-inisialisasi tooltip Bootstrap setelah render ulang DataTable
                initializeTooltip();
            },
            initComplete: function () {
                // Tambahkan tombol refresh ke dalam header tabel
                $("#tableLokasi_wrapper .dataTables_filter").append(`
                <button id="btnRefresh" class="btn btn-primary btn-sm ml-2">
                    <i class="fa fa-sync"></i> Refresh
                </button>
            `);
            },
        });
    }

    //kirim data ke server <i class=""></i>
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
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

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
                        icon: "error",
                        title: errorMessage,
                    });
                } else {
                    Toast.fire({
                        icon: "error",
                        title: response.message,
                    });
                }
            },
        });
    });

    //ketika button edit di tekan
    $(document).on("click", ".btnedit", function () {
        const lokasiID = $(this).data("id");

        $.ajax({
            url: `/lokasi/${lokasiID}`, // Endpoint untuk mendapatkan data pegawai
            type: "GET",
            success: function (response) {
                // Isi modal dengan data lokasi
                $("#editid").val(response.Data.id);
                $("#editlokasi").val(response.Data.lokasi);

                // // Update preview gambar
                // let imageSrc = response.data.icon
                //     ? `/storage/icon/${response.data.icon}`
                //     : `/assets/img/notfound.png`;
                // $("#editPreview img").attr("src", imageSrc);

                // // Update dropdown status sesuai dengan data yang diterima
                // // Cek status dan pilih option yang sesuai menggunakan Select2
                // if (response.data.status == 2) {
                //     $("#editstatus").val(2).trigger("change"); // Pilih option dengan value=2 dan update Select2
                // } else {
                //     $("#editstatus").val(1).trigger("change"); // Pilih option dengan value=1 dan update Select2
                // }

                // Tampilkan modal edit
                $("#mdEditLokasi").modal("show");
                console.log(response.Data.id)
            },
            error: function () {
                Toast.fire({
                    icon: "error",
                    title: "Tidak dapat mengambil data lokasi.",
                });
            },
        });
    });

    // Ketika modal ditutup, reset semua field
    $("#mdEditLokasi").on("hidden.bs.modal", function () {
        // Reset form input (termasuk gambar dan status)
        $("#storeEditLokasi")[0].reset();
    });
});
