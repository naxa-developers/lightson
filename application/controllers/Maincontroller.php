<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Main_model');


	}

	/**1
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

$light=$this->Main_model->get_data();

if(isset($_POST['submit'])){


unset($_POST['submit']);

if(array_key_exists("other",$_POST)){

$_POST['type_of_street_light_poles']=$this->input->post('type_of_street_light_poles_other');
unset($_POST['type_of_street_light_poles_other']);
unset($_POST['other']);

}else{
unset($_POST['type_of_street_light_poles_other']);
}


$insert=$this->Main_model->insert($_POST);
// var_dump($_POST);
// var_dump($insert);
// exit();
if($insert!=''){

	$file_name = $_FILES['photo']['name'];

	$ext = pathinfo($file_name, PATHINFO_EXTENSION);

	$img_upload=$this->Main_model->do_upload($file_name,$insert);

	if ($img_upload['status']== 1) {

		$image_path=base_url() . 'uploads/'.$insert.'.'.$ext ;

		$data=array(

			'photo'=>$image_path,
			'photo_thumb'=>base_url() . 'uploads/'.$insert.'_thumb.'.$ext

		);

		$this->Main_model->update($insert,$data);

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
$this->session->set_flashdata('msg','Form Submitted Succssfully');
}else{

	$this->session->set_flashdata('msg',strip_tags($img_upload['error']));
}


}
redirect(base_url());
}

		foreach($light as $data){

			$features_report[]= array(
				"type" =>"Feature",
				"properties"=>$data,
				"geometry"=>array(

					'type'=>'Point',
					'coordinates'=>array(
						$data['longitude'],
						$data['latitude'],
						1.0
					),
				),
			);


		}

		$map_report= array(
			'type' => 'FeatureCollection',
			'features' => $features_report,
		);

		$bar_data=$this->Main_model->bar_graph();
		$bar_data_s=$this->Main_model->pie_graph('solar');
		$bar_data_e=$this->Main_model->pie_graph('electric');

		foreach($bar_data as $bar){
	$b_data[]=[$bar['name'],(int)str_replace(" ", '', $bar['total'])];


		}

		$this->body['bar_data']=json_encode($b_data);

		$this->body['pie_data_s']=sizeof($bar_data_s);
		$this->body['pie_data_e']=sizeof($bar_data_e);

$this->body['light_data']=json_encode($map_report, JSON_NUMERIC_CHECK);


		$this->load->view('frontend/home',$this->body);
	}




}
