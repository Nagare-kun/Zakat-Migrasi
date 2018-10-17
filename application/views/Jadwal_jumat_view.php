<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Jadwal Sholat Jumat
            <small>Miftahul Jannah</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>

            <li class="active">Jadwal Sholat Jumat</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Jadwal Sholat</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">

                <?php if (@$_SESSION['msg'] != NULL) { ?>
                <!-- Page Alert -->
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success </h4>
                    <?php echo $_SESSION['msg']; ?>
                </div>
                <!-- End Page Alert -->
                <?php } ?>

                <!-- FORM VALIDATION ON TABS -->
                <!--===================================================-->
                <div class="tab-base">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="forms-validation.html#demo-bsc-tab-1" data-toggle="tab">
                                <i class="fa fa-history"></i> Jadwal </a>
                        </li>
                        <li>
                            <a href="forms-validation.html#demo-bsc-tab-2" data-toggle="tab">
                                <i class="fa fa-edit"></i> Buat Jadwal </a>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div id="demo-bv-bsc-tabs" class="form-horizontal">
                        <div class="tab-content">
                            <div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Admin</th>
                                            <th class="min-tablet">Tipe</th>
                                            <th class="min-tablet">Jumlah</th>
                                            <th class="min-tablet">Tanggal</th>
                                            <th class="min-desktop">Keterangan</th>
                                            <th class="min-desktop">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="no">
                                                
                                            </td>
                                            <td class="nama">

                                            </td>
                                            <td class="tipe">

                                            </td>
                                            <td class="jumlah">

                                            </td>
                                            <td class="tanggal">

                                            </td>
                                            <td class="keterangan">

                                            </td>
                                            <td>
                                                <!-- <input type="hidden" name="id" id="id" value="<?php echo $item->id; ?>">
                                                <?php if ($this->session->userdata("17view")=="1"){?>
                                                <a href="#">
                                                    <span data-placement='top' data-toggle='tooltip' title='Struk'></span>
                                                    <button class='btn btn-primary btn-xs btnPrint' data-title='Struk'
                                                        id="btnStruk">
                                                        <span class='glyphicon glyphicon-print'></span>
                                                    </button>
                                                </a>
                                                <?php } ?>
                                                <?php if ($this->session->userdata("17edit")=="1"){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                                                    <button id="btnEdit" class='btn btn-warning btn-xs btnEdit'
                                                        data-title='Edit' data-toggle='modal' data-target='#modalEdit'>
                                                        <span class='glyphicon glyphicon-pencil'></span>
                                                    </button>
                                                </a>
                                                <?php } ?>
                                                <?php if ($this->session->userdata("17delete")=="1"){?>
                                                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                                    <button class='btn btn-danger btn-xs btnDelete' data-title='Delete'
                                                        id="btnDelete">
                                                        <span class='glyphicon glyphicon-remove'></span>
                                                    </button>
                                                </span>
                                                <?php } ?> -->

                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total :</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Start Second Tab -->
                            <div class="tab-pane fade" id="demo-bsc-tab-2">
                                <h4 class="mar-btm text-thin">Tambah Data</h4>
                                <hr>
                                <form action="<?php echo site_url('Lap_kotak_amal_controller/input_data'); ?>" method="POST">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nama Admin :</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="addNama" value="<?php echo $_SESSION['nama']; ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-7 col-lg-offset-3">
                                        <input type="submit" value="Submit" class="btn btn-flat btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!-- END FORM VALIDATION ON TABS -->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Np: Keterangan Tidak Harus diisi.
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form id="formEdit" class="form-horizontal" action="<?php echo site_url('Lap_kotak_amal_controller/edit_data')?>"
                        method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data Amal</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Admin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="editPetugas" name="editPetugas"
                                            value="<?php echo $_SESSION['nama'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tipe</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="editTipe" id="editTipe">
                                            <option value="1">Amal Jumatan</option>
                                            <option value="2">Amal Ahad Dhuha</option>
                                            <option value="3">Amal Tarawih</option>
                                            <option value="4">Amal Idul Fitri</option>
                                            <option value="5">Amal Idul Adha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control inputMask" id="editJumlah" name="editJumlah"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control datepicker" id="editTanggal" name="editTanggal"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="editKeterangan" id="editKeterangan" rows="3"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="idEdit" id="idEdit" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btnSave">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "ordering": true,
            "info": true,
            "searching": true,
            "autoWidth": false,
            "responsive": true
        });

        $('.inputMask').inputmask('decimal', {
            digits: 2,
            placeholder: "0",
            digitsOptional: true,
            radixPoint: ",",
            groupSeparator: ".",
            autoGroup: true,
            rightAlign: false,
            prefix: "Rp "
        });

        $(".datepicker").datepicker({
            format: "dd-MM-yyyy",
            autoclose: true,
            todayBtn: "linked",
            todayHighlight: true
        });

        $('#datatable').on('click', '[id^=btnEdit]', function () {
            var $test = $(this).closest('tr');
            var $nama = $test.find('.nama').text().trim();
            var $jumlah = $test.find('.jumlah').text().trim();
            var $id = $test.find('#id').val().trim();
            var $tgl = $test.find('.tanggal').text().trim();
            var $ket = $test.find('.keterangan').text().trim();
            $('#formEdit').find('#editPetugas').val($nama);
            $('#formEdit').find('#editJumlah').val($jumlah);
            $('#formEdit').find('#editTanggal').val($tgl);
            $('#formEdit').find('#editKeterangan').val($ket);
            $('#formEdit').find('#idEdit').val($id);
        });

        $('#datatable').on('click', '[id^=btnDelete]', function () {
            var $item = $(this).closest("tr");
            var $nama = $item.find(".tanggal").text();
            console.log($nama);
            // $item.find("input[id$='no']").val();
            // alert("hai");
            $.confirm({
                theme: 'supervan',
                title: 'Hapus Data Ini ?',
                content: 'Hapus data zakat ' + $nama,
                autoClose: 'Cancel|5000',
                buttons: {
                    Cancel: function () {},
                    delete: {
                        text: 'Delete',
                        action: function () {
                            window.location = "../Lap_kotak_amal_controller/hapus_data/" +
                                $item.find("#id").val();
                        }
                    }
                }
            });
        });
    });
</script>