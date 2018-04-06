<?php 
    defined('BASEPATH') or exit('Error');

    class Zakat_ctrl extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Lap_zakat_model');
           
        }

        public function index(){
           if(isset($_SESSION['username'])){
            if($this->input->post('t1')=="" && $this->input->post('t2')==""){
                $data['t1'] = date("01-m-Y");
                $data['t2'] = date("t-m-Y");
                $t1 = str_replace("-","",$data['t1']);
                $t2 = str_replace("-","",$data['t2']);
                $pieces1 = explode("-",$data['t1']);
                $pieces2 = explode("-",$data['t2']);
                $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
                $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
                $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_zakat_view',$data);
            }
            else{
                $data['t1'] = $this->input->post('t1');
                $data['t2'] = $this->input->post('t2');
                $t1 = str_replace("-","",$this->input->post('t1'));
                $t2 = str_replace("-","",$this->input->post('t2'));
                $pieces1 = explode("-",$data['t1']);
                $pieces2 = explode("-",$data['t2']);
                $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
                $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
                $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_zakat_view',$data);
            }
   
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }
     
    public function laporan_print($t1,$t2)
    {
        $pieces1 = explode(".",$t1);
        $pieces2 = explode(".",$t2);
        $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
        $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
        
        $data['t1'] = $pieces1[0].'-'.$pieces1[1].'-'.$pieces1[2];
        $data['t2'] = $pieces2[0].'-'.$pieces2[1].'-'.$pieces2[2];
    
        $data['selBeli'] = $this->Lap_zakat_model->sel_beli($t1,$t2)->result();
        $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();
        $this->load->view('prints/zakat_print',$data);
    }

    public function tambahData()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $zakatFitrah = $this->input->post('zakatFitrah');
        $pembelian = $this->input->post('pembelian');
        $zakatMal = $this->input->post('zakatMal');
        $infaq = $this->input->post('infaq');
        $tanggal = date('Y-m-d');

        $this->Lap_zakat_model->input('list_zakat',$nama,$alamat,$zakatFitrah,$pembelian,$zakatMal,$infaq,$tanggal);
        redirect(site_url('zakat_ctrl'));
    }

 }
?>