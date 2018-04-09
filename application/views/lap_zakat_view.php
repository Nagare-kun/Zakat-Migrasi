<?php
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Zakat & Infaq
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-gear"></i> Laporan</a>
      </li>
      <li class="active">Zakat & Infaq</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

  <!-- Start Modal Delete -->
  <div class="modal modal-danger fade" id="modalDelete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Danger Modal</h4>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Start Modal Edit -->
  <div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Zakat</h4>
        </div>
        <div class="modal-body">
        
          <div class="row">
          <form action="<?php echo site_url('zakat_ctrl/simpanEdit');?>" method="POST">
            <div class="form-group">
              <div class="col-sm-12">
                <input placeholder="Nama" type="text" name="namaEdt" id="namaEdt" class="form-control">
              </div>
              <div class="col-sm-12"><br>
                <input placeholder="Alamat" type="text" name="alamatEdt" id="alamatEdt" class="form-control">
              </div>
              <div class="col-sm-12"><br>
                <input placeholder="Zakat Fitrah" type="text" name="zakatFitrahEdt" id="zakatFitrahEdt" class="form-control">
              </div>
              <div class="col-sm-12"><br>
                <select class="form-control" name="pembelianEdt" id="pembelianEdt">
                  <option value="0">Beli</option>
                  <option value="1">Tidak</option>
                </select>
              </div>
              <div class="col-sm-12"><br>
                <input placeholder="Zakat Mall" type="text" name="zakatMalEdt" id="zakatMalEdt" class="form-control">
              </div>
              <div class="col-sm-12"><br>
                <input placeholder="Infaq" type="text" name="infaqEdt" id="infaqEdt" class="form-control">
              </div>
            </div>
            <input type="hidden" name="nomor" id="nomor" value="">
            <input type="hidden" name="id_admin" value="<?php echo $_SESSION['id_admin']; ?>">
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Input</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove">
            <i class="fa fa-times"></i>
          </button>
        </div>
      </div>

      <div class="box-body" id="bodyInput">
        <?php if (isset($_SESSION['msg'])) {?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
              <h5><span class='glyphicon glyphicon-ok'></span> Info!</h5>
            <?php echo $_SESSION['msg'];?>
          </div>
        <?php } ?>
        <div class="row">
          <form id="form" action="<?php echo site_url('zakat_ctrl/tambahData');?>" method="POST">
            <div class="form-group">
              <div class="col-sm-2">
                <input placeholder="Nama" type="text" name="nama" id="nama" class="form-control" autofocus>
              </div>
              <div class="col-sm-2">
                <input placeholder="Alamat" type="text" name="alamat" id="alamat" class="form-control">
              </div>
              <div class="col-sm-2">
                <input placeholder="Zakat Fitrah" type="text" name="zakatFitrah" id="zakatFitrah" class="form-control">
              </div>
              <div class="col-sm-2">
                <select class="form-control" name="pembelian" id="pembelian">
                  <option value="0">Beli</option>
                  <option value="1">Tidak</option>
                </select>
              </div>
              <div class="col-sm-2">
                <input placeholder="Zakat Mall" type="text" name="zakatMal" id="zakatMal" class="form-control">
              </div>
              <div class="col-sm-2">
                <input placeholder="Infaq" type="text" name="infaq" id="infaq" class="form-control">
              </div>
            </div>
          </form>
        </div>
        <small class="text-muted">Np: Tekan 'ENTER' pada bagian infaq untuk submit</small>
      </div>
    </div>

    <!-- Default box -->
    <div class="box box-success">
      <div class="box-header">
        <form method="post" action="<?php echo site_url("/zakat_ctrl/index ")?>" id="formsearch">

          <div class="col-sm-12">
            <div class="form-inline col-sm-4">
              Dari :
              <input type="text" class="form-control" id="t1" name="t1" placeholder="YYYY-MM-DD" value="<?php echo $t1; ?>">
            </div>
            <div class="form-inline col-sm-4">
              Sampai :
              <input type="text" class="form-control" id="t2" name="t2" placeholder="YYYY-MM-DD" value="<?php echo $t2; ?>">
            </div>
            <div class="col-sm-1">
              <button type="submit" class="btn btn-primary" id="btnSearch">
                <u>S</u>earch</button>
            </div>
            <h3 class="box-title col-sm-1">
              <button type="button" class="btn btn-default" id="btnPrint">
                <i class="fa fa-print"></i> Print</button>
            </h3>
          </div>

        </form>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th class="min-tablet">Alamat</th>
              <th class="min-tablet">Zakat Fitrah</th>
              <th class="min-tablet">Pembelian</th>
              <th class="min-desktop">Zakat Mall</th>
              <th class="min-desktop">Infaq</th>
              <th class="min-desktop">Tanggal</th>
              <th class="min-desktop">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 0;
                foreach ($data as $row): 
                  if ($row->beli == 0) {
                    $beli = 'Beli';
                  }else {
                    $beli = 'Tidak Beli';
                  }
                  $tgl = explode('-', $row->tanggal);
                  $tanggal = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
                  $no++;
                ?>

              <tr>
                <td class="no">
                  <?php echo $no; ?>
                </td>
                <td class="nama">
                  <?php echo $row->nama; ?>
                </td>
                <td class="data_alamat">
                  <?php echo $row->alamat;?>
                </td>
                <td class="zakat_fitrah">
                  <?php echo $row->zakat_fitrah;?> Kg
                </td>
                <td class="beli">
                  <?php echo $beli;?>
                </td>
                <td class="zakat_mall">
                  <?php echo number_format((double)$row->zakat_mall,0,"," , ".");?>
                </td>
                <td class="data_infaq">
                  <?php echo number_format((double)$row->infaq,0,",",".");?>
                </td>
                <td>
                  <?php echo $tanggal;?>
                </td>
                <td align="center">
                  <input type="hidden" name="nomor" id="id" value="<?php echo $row->nomor ?>">
                  <input type="hidden" name="data_nama" id="data_nama" value="<?php echo $row->nama ?>">
                  <?php if ($this->session->userdata("17view")=="1"){?>
                  <a href="#">
                    <span data-placement='top' data-toggle='tooltip' title='Struk'></span>
                    <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                      <span class='glyphicon glyphicon-print'></span>
                    </button>
                  </a>
                  <?php } ?>
                  <?php if ($this->session->userdata("17edit")=="1"){?>
                  <a href='#'>
                    <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                    <button onclick="edit(<?php echo $row->nomor; ?>)" id="btnEdit" class='btn btn-warning btn-xs btnEdit' data-title='Edit' data-toggle='modal' data-target='#modalEdit'>
                      <span class='glyphicon glyphicon-pencil'></span>
                    </button>
                  </a>
                  <?php } ?>
                  <?php if ($this->session->userdata("17delete")=="1"){?>
                      <span data-placement='top' data-toggle='tooltip' title='Delete'>
                        <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' id="btnDelete">
                        <span class='glyphicon glyphicon-remove'></span>
                        </button>
                      <?php } ?>

                </td>
              </tr>
              <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <td>Total :</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/controlside');
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<!--DataTables [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/media/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/media/js/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js'); ?>"></script>

<script>
$(document).ready(function(){
});

  function edit(nomor){
    var url = "<?php echo site_url('zakat_ctrl/edit/'); ?>"+nomor;
    // console.log(url);
    $.ajax({
      url: url,
      type: 'POST',
      beforeSend:function(){
        // loading section
      },
      success:function(result){
        var data = JSON.parse(result);
        // console.log(data[0]);
        $('#nomor').val(data[0].nomor);
        $('#namaEdt').val(data[0].nama);
        $('#alamatEdt').val(data[0].alamat);
        $('#zakatFitrahEdt').val(data[0].zakat_fitrah);
        $('#pembelianEdt').val(data[0].beli);
        $('#zakatMalEdt').val(data[0].zakat_mall);
        $('#infaqEdt').val(data[0].infaq);
      }
    })
  }

  $(function () {
    $('#datatable').DataTable({
      "responsive": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#infaq').keypress(function (e) {
      if (e.which == 13) {
        if ($('#nama').val() == '') {
          alert('Nama Harus Diisi');
        } else if ($('#alamat').val() == '') {
          alert('Alamat Tidak Boleh Kosong');
        } else if ($('#zakatFitrah').val() == '') {
          alert('Zakat Fitrah Tidak Boleh Kosong');
        } else {
          $('#form').submit();
        }
      }
    })

    $('#t1, #t2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $('#zakatMal, #infaq, #zakatMalEdt, #infaqEdt').inputmask('decimal', {
      digits: 2,
      placeholder: "0",
      digitsOptional: true,
      radixPoint: ",",
      groupSeparator: ".",
      autoGroup: true
    });

    $('#btnPrint').click(function () {
      var tanggal1 = '<?php echo str_replace(' - ','.
      ',$t1); ?>';
      var tanggal2 = '<?php echo str_replace(' - ','.
      ',$t2); ?>';
      var url = '<?php echo site_url("/zakat_ctrl/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
      console.log(url);
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
    });

    $('#datatable').on('click', '[id^=btnDelete]', function() {
      var $item = $(this).closest("tr");
      var $nama = $item.find("#data_nama").val();
      console.log($nama);
      // $item.find("input[id$='no']").val();
        // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus Data Ini ?',
        content: 'Hapus data zakat '+$nama,
        autoClose: 'Cancel|5000',
        buttons: {
            deleteUser: {
                text: 'Delete',
                action: function () {
                  window.location = "zakat_ctrl/hapus/"+$item.find("#id").val();
                }
            },
            Cancel: function () {
            }
        }
      });
    });

  });
</script>
<?php
  $this->load->view('template/endbody');
  ?>