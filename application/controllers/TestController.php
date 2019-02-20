<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

	function __construct()
	{
		parent::__construct();

        $this->load->model('Api_model');


	}

  public function street_light_api(){

    //echo $_POST['data'];



    $data_array=json_decode($_POST['data'],TRUE);
    $insert=$this->Api_model->insert($data_array);
    // echo $insert;
    // exit();



    if ($insert=="") {




    }else{

      $file_name = $_FILES['photo']['name'];

      $ext = pathinfo($file_name, PATHINFO_EXTENSION);

      $img_upload=$this->Api_model->do_upload($file_name,$insert);


      if ($img_upload['status']== 1) {

        $image_path=base_url() . 'uploads/'.$insert.'.'.$ext ;

        $data=array(

          'photo'=>$image_path,
          'photo_thumb'=>base_url() . 'uploads/'.$insert.'_thumb.'.$ext

        );

        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/'.$insert.'.'.$ext;
        $config['new_image'] = './uploads/'.$insert.'.'.$ext;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 500;
       $config['height']       = 500;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);


          $this->image_lib->resize();
          //var_dump($this->image_lib->resize());
          //var_dump($this->image_lib->display_errors());
        //  exit();
          if(!$this->image_lib->resize())
  {
     echo $this->image_lib->display_errors();
  }

        $this->Api_model->update_img_path($insert,$data);
        $response['status']=200;
        $response['data']='Reported';
        echo json_encode($response);

      }else {

        $code= strip_tags($img_upload['error']);
        $response['status']=201;
        $response['data']=$code;
        echo json_encode($response);

      }

    }


  }

}
