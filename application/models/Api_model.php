<?php
class Api_model extends CI_Model {




public function insert($data){

  $this->db->insert('light',$data);
  if ($this->db->affected_rows() > 0)
  {
   return $this->db->insert_id();
  }
  else
  {
    $error = $this->db->error();
    return $error;
  }
}

  public function do_upload($filename,$name)
  {

    $field_name                     ='photo';
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['max_size']             = 70000;
    $config['overwrite']            = TRUE;
    $config['file_name']           = $name;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload($field_name))
    {
      $error = array('error' => $this->upload->display_errors());
      $error['status']=0;
      return $error;


    }
    else
    {


      $data = array('upload_data' => $this->upload->data());
        $data['status']=1;

      return $data;

    }
  }

  public function update_img_path($id,$data){

    $this->db->where('id',$id);
    $this->db->update('light',$data);
  }


}
