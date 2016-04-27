<?php
class Maps extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('googlemaps');
        }

	public function index()
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
			$this->googlemaps->add_marker($marker);*/

			$data['title'] = 'Nyoba Map';
			$data['map'] = $this->googlemaps->create_map();
			
			$this->load->view('templates/headmap', $data);
			$this->load->view('templates/header');
			$this->load->view('maps/viewspek', $data);
			$this->load->view('templates/footer');
		}
}