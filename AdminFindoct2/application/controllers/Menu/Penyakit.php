<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Illness extends CI_Controller {
	function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper(array('url', 'form'));
	}
}