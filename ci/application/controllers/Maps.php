<?php
class Maps extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('googlemaps');
                $this->load->model('maps_model');
                $this->load->library('session');
        }

	public function index()
        {
			$config = array();
			$config['center'] = 'auto';
			$config['directions'] = TRUE;
			/*$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
					position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
				});
			}
			centreGot = true;';*/
			$config['directionsStart'] = 'auto';
			$config['directionsEnd'] = 'Rumah Sakit Siloam, Jalan Raya Gubeng No.70, Kota Surabaya, Jawa Timur 60281';
			$config['directionsDivID'] = 'directionsDiv';

			$this->googlemaps->initialize($config);

			/*$marker = array();
			$this->googlemaps->add_marker($marker);*/

			$data['map'] = $this->googlemaps->create_map();
			
			$this->load->view('maps/my_view', $data);
		}
	public function view($username = FALSE,$idtpraktek = FALSE)
        {
        	$config = array();
			$config['center'] = 'auto';
			$data['identitasdok'] = $this->maps_model->get_docname($username);
			if (empty($data['identitasdok'])){
                show_404();
            }
			$data['places'] = $this->maps_model->get_maps($username);
			if (empty($data['places'])){
                show_404();
            }
        	if($idtpraktek === FALSE){
        		$config['onboundschanged'] = 'if (!centreGot) {
					var mapCentre = map.getCenter();
					marker_0.setOptions({
						position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
					});
				}
				centreGot = true;';
        	}
        	else {
        		$data['specific_places'] = $this->maps_model->get_specific_maps($idtpraktek);
        		if (empty($data['specific_places'])){
               		show_404();
            	}
        	}
			if($idtpraktek === FALSE){
				$this->googlemaps->initialize($config);
				$marker = array();
				$marker['infowindow_content'] = 'YOU ARE HERE!!!';
				$marker['animation'] = 'BOUNCE';
				$this->googlemaps->add_marker($marker);
			}
			else{
				$config['directions'] = TRUE;
				$config['directionsStart'] = 'auto';
				$config['directionsEnd'] = $data['specific_places']['NAMAT'].', '.$data['specific_places']['KOTA'].', '.$data['specific_places']['PROVINSI'].', '.$data['specific_places']['KODEPOS'];
				$config['directionsDivID'] = 'directionsDiv';
				$this->googlemaps->initialize($config);
			}
			$data['map'] = $this->googlemaps->create_map();
			$this->load->view('templates/header', $data);
			$this->load->view('maps/my_view', $data);
		}
}