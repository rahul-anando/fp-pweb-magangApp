<?php

class Magang_model extends CI_Model {
    
public function getAlldatamagang() {


    return $this->db->get('tbl_magang')->result_array();


}

 public function prosesTambahData()
    {
		$image = $this->upload(); // dfgdsf43f2i3y.jpg
        $data = array(
            'nama'    		      => $this->input->post('nama'),
            'nim'                 => $this->input->post('nim'),
            'konsentrasi'         => $this->input->post('konsentrasi'),
            'tahun'     	      => $this->input->post('tahun'),
            'pembimbing'          => $this->input->post('pembimbing'),
            'tempat_magang'       => $this->input->post('tempat_magang'),
            'waktu_mulai'         => $this->input->post('waktu_mulai'),
            'waktu_selesai'       => $this->input->post('waktu_selesai'),
            'dokumen'      		  => $image,
			'status'      		  => $this->input->post('status'),

        );

        $this->db->insert('tbl_magang', $data);
        return $this->db->affected_rows();


    }

	public function upload(){
         
         $nama = $_FILES['image']['name'];
         $type = $_FILES['image']['type'];
         $error = $_FILES['image']['error'];
         $size = $_FILES['image']['size'];
         $temp = $_FILES['image']['tmp_name'];

        //untuk mengecek ekstensi
        $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'pdf']; 
        $ekstensiGambar  = explode('.', $nama); //jpg
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('ekstensi file tidak diizinkan')</script>";
            return false;
        }
        //untuk mengecek size
         if ($size > 5000000) { //5MB
            echo "<script>alert('File terlalu besar')</script>";
            return false;
         }
          $namaBaru =  uniqid() . '.' . $ekstensiGambar; //nama baru    dfgdsf43f2i3y.jpg
          //proses upload
          move_uploaded_file($temp, 'assets/img/' . $namaBaru);  
          return $namaBaru;


    }

	 public function prosesEditData()
    {
		if($_FILES['image']['error'] == 4){
            $image = $this->input->post('old_image');
        }else{
            $image = $this->upload(); //dfgdsf43f2i3y.jpg
        }

        $data = array(
            'nama'                => $this->input->post('nama'),
            'nim'                 => $this->input->post('nim'),
            'konsentrasi'         => $this->input->post('konsentrasi'),
            'tahun'     	      => $this->input->post('tahun'),
            'pembimbing'          => $this->input->post('pembimbing'),
            'tempat_magang'       => $this->input->post('tempat_magang'),
            'waktu_mulai'         => $this->input->post('waktu_mulai'),
            'waktu_selesai'       => $this->input->post('waktu_selesai'),
            'dokumen'      		  => $image,
			'status'      		  => $this->input->post('status'),
        );

        $id = $this->input->post('id');
        $this->db->update('tbl_magang', $data, array('id' => $id));
        return $this->db->affected_rows();
    }
	
 public function prosesDeleteData()
    {

        $id = $this->input->post('id');
        $this->db->delete('tbl_magang',  array('id' => $id));
        return $this->db->affected_rows();
    }

}
?>