<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kembali extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            //$this->Security_model->login_check();
        }
    public function index()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Form Kembali';
            $data['pointer']="Pinjam";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Form Kembali";
            $data['sub_bread']="Form Kembali";
            $data['desc']="Data Master Kembali, Menampilkan data yang akan di Kemblikan";

            /*data yang ditampilkan*/
           /*data yang ditampilkan*/
           $id_pinjam=$this->input->get('id_pinjam');
           $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
           $data['data_pinjam'] = $this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id_pinjam);
            $tmp['content']=$this->load->view('admin/kembali/Form_kembali',$data, TRUE);
            //$tmp['content']=$this->load->view('admin/kembali/View_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
        public function tampil()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Data Kembali';
            $data['pointer']="Pinjam";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Form Kembali";
            $data['sub_bread']="Form Kembali";
            $data['desc']="Data Master Kembali, Menampilkan data yang akan di Kemblikan";

            /*data yang ditampilkan*/
           /*data yang ditampilkan*/
           $id_pinjam=$this->input->get('id_pinjam');
           $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
           $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
           $data['data_pinjam'] = $this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id_pinjam);
            //$data['log'] = $this->Buku_model->getAllData("tb_petugas");
            //$data['isi']=$this->Anggota_model->get_all();
            //$data['js']=$this->load->view('admin/anggota/js');
            //$tmp['content']=$this->load->view('admin/kembali/Form_kembali',$data, TRUE);
            $tmp['content']=$this->load->view('admin/kembali/View_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
    public function View_dt_pinjam($id_pinjam2=0)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Daftar Detail Peminjaman';
            $data['pointer']="pinjam";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Daftar Peminjaman";
            $data['sub_bread']="Detail data Peminjaman";
            $data['desc']="Ddta detail pinjam";

            /*data yang ditampilkan*/
            $id_pinjam1=$this->input->get('id_pinjam');
            if ($id_pinjam1=='') {
                $id_pinjam1=$id_pinjam2;
            }
            if ($id_pinjam1!='') {
                $id = array('id_pinjam' => $id_pinjam1);
                $this->session->set_userdata($id);
                $id_pinjam=$this->session->userdata('id_pinjam');
                //echo $id_pinjam;
            }
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_detail_pinjam1'] = $this->Buku_model->get_detail123("tb_detail_pinjam","id_pinjam",$id_pinjam1);
            $tmp['content']=$this->load->view('admin/Kembali/View_detail_pinjam_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
     public function detail_kembali()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Daftar Detail Kembali';
            $data['pointer']="Pinjam";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Detail Pinjam";
            $data['sub_bread']="Daftar Detail Pinjam";
            $data['desc']="Data Master Detail Kembali, Menampilkan data Detail yang akan di Kemblikan";

            /*data yang ditampilkan*/
            $data['data_detail'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            //$data['data_dt_buku']=$this->Buku_model->getAllData("tb_detail_buku");
            //$data['js']=$this->load->view('admin/anggota/js');
            $tmp['content']=$this->load->view('admin/kembali/Detail_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
     public function kembalikan($id=0)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {

            //*layout 
            $data['title']='Daftar Buku Kembali';
            $data['pointer']="Pinjam";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data buku Kembali";
            $data['sub_bread']="Daftar Buku Kembali";
            $data['desc']="Data Buku Kembali, Menampilkan data Buku yang di Kemblikan";
            
             
            //echo $id;
            $this->db->where('id_pinjam',$id);
            $query=$this->db->get('tb_pinjam')->result();
            foreach ($query as $row)
            {
               $tgl=$row->tgl_kembali;   
            }
            //select dendan dengan status A
            $this->db->where('status','A');
            $query11=$this->db->get('tb_denda')->result();
            foreach ($query11 as $key => $row11)
            {
                $id_denda=$row11->id_denda;
                $d=$row11->denda;
            }
            // Hitung selisih hari pengembalian
            $SLS=((strtotime($this->input->post('tgl_kembali'))-strtotime($tgl))/(60*60*24));
            if ($SLS>0) {
                //hitung jumlah dennda jika terlambat lebih dari 0
                $jumlahdenda=$d*$SLS;
                $telat=$SLS;
            }
            //jika terlambat korang dari 0 maka terlambat & jumlah denda dianggap 0 
            else
            {
                $SLS=0;
                $jumlahdenda=0;
            }
            $jumlahdenda;
            // buat data berupa array untuk dimasukan ke dalam database
            $t= $this->input->post('tgl_kembali');  
            $s=substr($t,0,2);
            $s1=substr($t,3,2);
            $s2=substr($t,6,6);
            $s3=$s2."/".$s.'/'.$s1;
            $kem = array('id_kembali'=>'',
                'id_pinjam' => $id,
                        'tgl_dikembalikan'=>$s3,
                        'terlambat'=>$SLS,
                        'id_denda'=>$id_denda,
                        'denda'=> $jumlahdenda );
            $insert=$this->Buku_model->insertData('tb_kembali',$kem);
            $this->db->where('id_pinjam',$id);
            $query=$this->db->get('tb_detail_pinjam')->result();
            foreach ($query as $key => $row)
            {
                $id_detail_pinjam=$row->id_detail_pinjam;
                $id_buku=$row->id_buku;
                $no_buku=$row->no_buku;
                //update status pada detail buku
                $this->db->set('status',1);
                $this->db->where('id_buku',$id_buku);
                $this->db->where('no_buku',$no_buku);
                $this->db->update('tb_detail_buku');
                //update flag detail pinjam
                $this->db->set('flag',1);
                $this->db->where('id_detail_pinjam',$id_detail_pinjam);
                $this->db->update('tb_detail_pinjam');
            }
            $this->db->set('status',1);
            $this->db->where('id_pinjam',$id);
            $this->db->update('tb_pinjam');
          
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_pinjam']=$this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id);
            $data['kembali']=$this->Buku_model->get_detail1("tb_kembali","id_pinjam",$id); 
            $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $tmp['content']=$this->load->view('admin/kembali/Buku_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
             //redirect('admin/Kembali','refresh');
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
    public function vw_dt_back()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Data Kembali';
            $data['pointer']="Pinjam";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Pengembalian";
            $data['sub_bread']="Struk Kembali";
            $data['desc']="Detail Struk Kembali, Menampilkan data yang telah di Kemblikan";

            /*data yang ditampilkan*/
           /*data yang ditampilkan*/
           $id_pinjam=$this->input->get('id_pinjam');
           $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
           $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
           $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
           $data['kembali'] = $this->Buku_model->get_detail1("tb_kembali","id_pinjam",$id_pinjam);
           $data['data_pinjam'] = $this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id_pinjam);
           $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $tmp['content']=$this->load->view('admin/kembali/Buku_kembali_strc',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
}
?>