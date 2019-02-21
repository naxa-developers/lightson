<?php
class Main_model extends CI_Model {



public function get_data(){

  $this->db->select('*');
  $query=$this->db->get('light');
  return $query->result_array();
}

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
  $config['max_size']             = 7000;
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

public function update($id,$data){ // update the edited table

  $this->db->where('id',$id);
  $q=$this->db->update('light',$data);

}

public function bar_graph(){
$this->db->select('type_of_street_light_poles as name,count(id) as total ');
$this->db->group_by('type_of_street_light_poles');
$q=$this->db->get('light');
return $q->result_array();

}

public function pie_graph($type){
  $this->db->select('*');
  $this->db->where('type_of_street_light',$type);
  $q=$this->db->get('light');
  return $q->result_array();
}

}
