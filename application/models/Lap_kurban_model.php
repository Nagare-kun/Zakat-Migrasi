<?php
	defined('BASEPATH') or exit('ERROR');

	class Lap_kurban_model extends CI_model{

		public function sel_date($t1,$t2){
		return $this->db->query("SELECT h.id,h.id_admin,h.penyumbang,h.jenis,h.jumlah,date_format(h.tanggal,'%d-%M-%Y') as tanggal_transaksi, h.tanggal,h.alamat,h.log_time, m.id_admin,m.nama AS admin,m.username
          FROM hewan_kurban h, master_login m
          WHERE h.id_admin = m.id_admin
          AND date_format(h.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(h.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
        }
        
        public function insert_data($table,$data)
        {
            return $this->db->insert($table,$data);
        }

        public function update_data($table,$data,$id)
        {
            $this->db->where('id',$id);
            return $this->db->update($table,$data);
        }

        public function delete_data($table,$id)
        {
            $this->db->where('id',$id);
            return $this->db->delete($table);
        }
	}

?>