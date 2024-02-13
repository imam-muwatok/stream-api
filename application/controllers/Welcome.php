<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = [
			'response'=>'Success',
			'data' => readFolder('storage')
		];

		  //add the header here
		  header('Content-Type: application/json');
		  echo json_encode( $data );
	}
}
