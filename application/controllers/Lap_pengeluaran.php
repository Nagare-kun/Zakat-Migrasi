<?php defined('BASEPATH') or exit('ERROR');

class Lap_pengeluaran extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Lap_pengeluaran_model');
    }

    public function index() {
        if(isset($_SESSION['username'])) {
            if($this->input->post('t1')==""&& $this->input->post('t2')=="") {
                $data['t1']=date("01-F-Y");
                $data['t2']=date("t-F-Y");
                $date1=date_create($data['t1']);
                $date2=date_create($data['t2']);
                $t1=date_format($date1, "Ymd");
                $t2=date_format($date2, "Ymd");
                $data['data']=$this->Lap_pengeluaran_model->sel_date($t1, $t2)->result();
                $this->load->view('lap_pengeluaran_view', $data);
            }

            else {
                $data['t1']=$this->input->post('t1');
                $data['t2']=$this->input->post('t2');
                $date1=date_create($data['t1']);
                $date2=date_create($data['t2']);
                $t1=date_format($date1, "Ymd");
                $t2=date_format($date2, "Ymd");
                $data['data']=$this->Lap_pengeluaran_model->sel_date($t1, $t2)->result();
                $this->load->view('lap_pengeluaran_view', $data);
            }

        }

        else {
            redirect(site_url().'/Auth/logout');
        }
    }

    public function Action() {
        $p=$this->input->post();
        $tgl=date_create($p['addTanggal']);
        $date=date_format($tgl, "Ymd");
        $jumlah=str_replace(".", "", $p['addJumlah']);
        if ($p['action']=="add") {
            $data=array('id_admin'=> $_SESSION['id_admin'],
            'tanggal'=> $date,
            'jumlah'=> htmlspecialchars($jumlah),
            'keterangan'=> htmlspecialchars($p['addKeterangan']));
            $query=$this->Lap_pengeluaran_model->InsertData('lap_pengeluaran', $data);
        }

        else {
            $data=array('id_admin'=> $_SESSION['id_admin'],
            'tanggal'=> $date,
            'jumlah'=> htmlspecialchars($jumlah),
            'keterangan'=> htmlspecialchars($p['addKeterangan']));
            $mainID=$p['idPengeluaran'];
            $query=$this->Lap_pengeluaran_model->UpdateData("lap_pengeluaran", $data, $mainID);
        }

        if ($query) {
            $this->session->set_flashdata('succ', 'Berhasil tambah data <i><b>pengeluaran</b></i>');
            redirect('Lap_pengeluaran');
        }

        else {
            $this->session->set_flashdata('fail', 'Gagal tambah data pengeluaran, segera hubungi admin');
            redirect('Lap_pengeluaran');
        }
    }

    public function HapusData($id) {
        $query=$this->Lap_pengeluaran_model->DeleteData("lap_pengeluaran", $id);

        if ($query) {
            $this->session->set_flashdata('succ', 'Berhasil tambah data <i><b>pengeluaran</b></i>');
            redirect('Lap_pengeluaran');
        }

        else {
            $this->session->set_flashdata('fail', 'Gagal tambah data pengeluaran, segera hubungi admin');
            redirect('Lap_pengeluaran');
        }
    }


    Public function laporan_print($t1,$t2) {
        $c1 = date_create($t1);
        $c2 = date_create($t2);
        $tgl1 = date_format($c1, "Ymd");
        $tgl2 = date_format($c2, "Ymd");
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $data['data'] = $this->Lap_pengeluaran_model->sel_date($tgl1, $tgl2)->result();
        $this->load->view('prints/Pengeluaran_print', $data);
    }
}

?>