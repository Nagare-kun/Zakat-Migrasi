<?php 
$this->load->view('template/head');
$this->load->view('template/side');
$date = date("d-m-Y H:i:s");
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Ahad Dhuha
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gear"></i> Laporan</a></li>
        <li class="active">Ahad Dhuha</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo site_url('ahad_dhuha/update')?>" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Laporan Amal Ahad Dhuha</h4>
          </div>
          <div class="modal-body">              
                <div class="box-body">
                
          <?php
          {
          $admin = $_SESSION['id_admin'] ;
          ?>
          
                       <input type="hidden" class="form-control" id="kode_user" name="kode_user" value="<?php echo $admin ;?>">
                 
          <?php
          }
          ?>
                  
          <?php
          {
          $nama = $_SESSION['nama'] ;
          ?>
          
                       <input type="hidden" class="form-control" id="kode_cabang" name="kode_cabang" value="<?php echo $nama ;?>">
                 
          <?php
          }
          ?>
        
          <div class="form-group">
                    <label  class="col-sm-3 control-label">Nomor</label>
                    <div class="col-sm-9">
                          <input type="text" class="form-control" id="nomor" name="nomor" readonly>
                    </div>
                  </div>
          
        <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama" name="nama" readonly>
              </div> 
        </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Tanggal</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Total" readonly>
                    </div>
                  </div>
                
          <div class="form-group">
                    <label  class="col-sm-3 control-label">Jumlah</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="jumlah" name="jumlah" required autofocus="on">
                    </div>
                  </div>
                   
                  <input type="hidden" class="form-control" id="log_time" name="log_time" placeholder="Log Time">
                    
                </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="action" id="action" value="add">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btnSave">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Default box -->
    <div class="box">        
        <div class="box-header">

        <?php if (isset($_SESSION['msg'])) {?>  
          <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                <h5><span class='glyphicon glyphicon-ok'></span> Info!</h5>
                <?php echo $_SESSION['msg'];?>
          </div>
          <?php } ?>

         <form method="post" action="<?php echo site_url("/ahad_dhuha/index")?>" id="formsearch">
         <div class="col-sm-12">
          <div class="form-inline col-sm-1">
            <button type="button" class="btn btn-primary" id="btnNew" data-toggle="modal" data-target="#myModal">New</button>
          </div>
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
        
        </div>
        <!-- /.box-header -->
        <div class="box-body">
       <div class="table-responsive"> 
          <table id="datatable" class="table table-bordered table-hover no-margin">
            <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Log Time</th>
              <?php if ($this->session->userdata("17view")=="1") {?>
              <th>Action</th>
              <?php } ?>
            </tr>
            </thead>
            <tbody>
                <?php 
        foreach ($data as $row): ?>
                    <tr>                              
                        <td class="no">
                        <?php echo $row->nomor; ?>
                          <input type="hidden" name="no" id="no" value="<?php echo $row->nomor ;?>">
                        </td>
                        <td class="nama">
                        <?php echo $row->admin; ?>
                          <input type="hidden" value="<?php echo $row->admin ;?>">
                        </td>
                        <td class="tanggal">
                        <?php $alih=explode('-',$row->tanggal); $tanggal = $alih[2] .'-'. $alih[1] .'-'. $alih[0]; echo $tanggal; ?>
                          <input type="hidden" id="tanggal" value="<?php echo $row->tanggal ;?>">
                        </td>
                        <td class="jumlah">
                        <?php echo number_format((double)$row->jumlah,0,"," , ".");?>
                          <input type="hidden" value="<?php echo number_format((double)$row->jumlah,0,"," , ".") ;?>">
                        </td>
                        <td class="logtime">
                        <?php $time = $row->log_time; $pecah = explode(' ',$time); $pieces =explode('-',$pecah[0]);echo $hasil = $pieces[2].'-'.$pieces[1].'-'.$pieces[0].' '.$pecah[1];  ?>
                          <input type="hidden" value="<?php echo $row->log_time ;?>">
                        </td>
                        <td align="center">
            
<?php if ($this->session->userdata("17view")=="1"){?>
                            <a href="#">
                                <span data-placement='top' data-toggle='tooltip' title='Struk'>
                                <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                                <span class='glyphicon glyphicon-print'></span>
                                </button>
                            </a>

              <?php } ?>
<?php if ($this->session->userdata("17edit")=="1"){?>
                            <a href='#'>
                                <span data-placement='top' data-toggle='tooltip' title='Edit'>
                                <button class='btn btn-warning btn-xs btnEdit' data-title='Edit' data-toggle='modal' data-target='#myModal' id="btnEdit">
                                <span class='glyphicon glyphicon-pencil'></span>
                                </button>
                            </a>
              <?php } ?>
<?php if ($this->session->userdata("17delete")=="1"){?>
                            <a class ="buttonDelete" href='#'>
                                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' data-toggle='modal' data-target='#deleteModal' id="btnDelete">
                                <span class='glyphicon glyphicon-remove'></span>
                                </button>
                            </a>
<?php } ?>

                           
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        </div>
    </div><!-- /.box -->

</section><!-- /.content -->
 

 </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
<script>
  // setInterval(function(){ 
  //   $.ajax({
  //     url:'<?php echo site_url('/ahad_dhuha');?>/gettime',
  //     success:function(result){
  //       $("#log_time").html(result);
  //     }
  //   });
  // },1000);
  $(function () { 
    $('#datatable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
   $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-sucess").slideUp(500);
    });
    $(".btnSave").click(function (){ 
        $('#form-horizontal').submit(function () {
            return false;
           });
    });
    
    $("#btnNew").click(function (){ 
    $("#action").val("add");
    $("#nomor").val("<?php echo $no; ?>");
    $("#kode_user").val();
    $("#nama").val("<?php echo $_SESSION['nama'];?>");
    $("#tanggal").val("<?php echo date("d-m-Y");?>");
    $("#jumlah").val();
    });

    $("#jumlah").inputmask('decimal', {
        digitsOptional: true,
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true
     });

    $('#datatable').on('click', '[id^=btnEdit]', function() {
        var $item = $(this).closest("tr");
        $("#nomor").val($.trim($item.find(".no").text()));
        $("#nama").val($.trim($item.find(".nama").text()));
        $("#jumlah").val($.trim($item.find(".jumlah").text()));
        $("#tanggal").val($.trim($item.find(".tanggal").text()));
        $("#logtime").val($.trim($item.find(".logtime").text()));
        $("#action").val("edit");
    });
  // $('#datatable').on('click', '[id^=btnInfo]', function() {
  //       var $item = $(this).closest("tr");  
  //       $("#kode_transaksi_info").text($item.find(".no").text());
  //   $("#nama_cabang_info").text($item.find(".nama_cabang").text());
  //       $("#jenis_pemasukan_info").text($item.find(".nama_jenis_pemasukan").text());
  //       $("#tanggal_info").text($item.find(".tanggal").text());
  //       $("#total_info").text($item.find(".total").text());
  //       $("#keterangan_info").text($item.find(".keterangan").text());
  //   });
  // $('#datatable').on('click', '[id^=btnDelete]', function() {
  //       var $item = $(this).closest("tr");
  //       $("#kode_trans_delete").text('Are You Sure to Delete Transaksi "'+$item.find(".kode_trans_kas_masuk").text() + '" ?');
  //   $("#no_trans_kas_masuk_delete").val($item.find("input[id$='no_trans_kas_masuk']:hidden:first").val());
  //   });
   $('#t1').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
    $('#t2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
    // $('#tanggal').datepicker({
    //   format: 'dd-mm-yyyy',
    //   autoclose:true
    // })
   $('#datatable').on('click', '[id^=btnStruk]', function() {
      var $item = $(this).closest("tr");
      console.log($item.find("input[id$='no']").val());
      var url = '<?php echo site_url("/ahad_dhuha/printstruk/")?>'+$item.find("input[id$='no']").val();
      console.log(url);
      newwindow=window.open(url,'Print Nota','height=500,width=1100');
      if (window.focus) {newwindow.focus()}
      return false;
    });
   $('#btnPrint').click(function() {
      var tanggal1 = '<?php echo str_replace('-','.',$t1); ?>';
      var tanggal2 = '<?php echo str_replace('-','.',$t2); ?>';
      var url = '<?php echo site_url("/ahad_dhuha/laporan_print/");?>'+tanggal1+'/'+tanggal2;
    console.log(url);
      newwindow=window.open(url,'Print','height=500,width=1100');
      if (window.focus) {newwindow.focus()}
      return false;
    });
    $('#datatable').on('click', '[id^=btnDelete]', function() {
      var $item = $(this).closest("tr");
      var $kode = $item.find(".no").text();
      // $item.find("input[id$='no']").val();
        // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus Transaksi?',
        content: 'Anda yakin ingin menghapus laporan nomor '+$kode,
        autoClose: 'Cancel|10000',
        buttons: {
            deleteUser: {
                text: 'Delete',
                action: function () {
                  window.location = "ahad_dhuha/delete/"+$item.find("input[id$='no']").val();
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