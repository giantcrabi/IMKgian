<?php
class Maps extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('googlemaps');
                $this->load->model('maps_model');
        }

	/*public function index()
        {
			$config = array();
			$config['center'] = 'auto';
			$config['directions'] = TRUE;
			$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
					position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
				});
			}
			centreGot = true;';
			$config['directionsStart'] = 'auto';
			$config['directionsEnd'] = 'Jalan Raya Gubeng No.70, Kota Surabaya, Jawa Timur 60281';
			$config['directionsDivID'] = 'directionsDiv';

			$this->googlemaps->initialize($config);

			/*$marker = array();
			$this->googlemaps->add_marker($marker);

			$data['title'] = 'Nyoba Map';
			$data['map'] = $this->googlemaps->create_map();
			
			$this->load->view('templates/headmap', $data);
			$this->load->view('templates/header');
			$this->load->view('maps/viewspek', $data);
			$this->load->view('templates/footer');
		}
		*/

	public function index($gelar = FALSE, $nama = FALSE, $idtpraktek = FALSE)
        {
			$config = array();
			$config['center'] = 'auto';
			if($nama != FALSE){
				$data['identitasdok'] = $nama.', '.$gelar;
			}
			else{
				$data['identitasdok'] = null;
			}

			$doctors = $this->maps_model->get_doctors($gelar);
			if (empty($doctors)){
                show_404();
            }

			$data['places'] = $this->maps_model->get_tpraktek($doctors);
			if (empty($data['places'])){
                show_404();
            }

            foreach ($data['places'] as &$places_item){
            	$identitasdok = $this->maps_model->get_doc($places_item['EMAIL']);
            	$places_item['EMAIL'] = $identitasdok['Nama'];
            	$places_item['GELAR'] = $identitasdok['Gelar'];
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
				$config['directionsEnd'] = $data['specific_places']['NAMATPRAKTEK'].', '.$data['specific_places']['KOTA'].', '.$data['specific_places']['PROVINSI'];
				if(!empty($data['specific_places']['KODEPOS'])){
					$config['directionsEnd'] .= ', '.$data['specific_places']['KODEPOS'];
				}
				$config['directionsDivID'] = 'directionsDiv';
				$this->googlemaps->initialize($config);
			}
			$data['title'] = 'Nyoba Map';
			$data['map'] = $this->googlemaps->create_map();
			
			$this->load->view('templates/headmap', $data);
			$this->load->view('templates/header');
			$this->load->view('maps/my_view', $data);
			$this->load->view('templates/footer');
		}
}