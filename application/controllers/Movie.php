<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

	public function index()
	{
		// $productID =  $this->uri->segment(3);
  		// $factoryID =  $this->uri->segment(4);

		  redirect('movie/page/1');

	}

	public function page($id) {
		
		$itemsPerPage = 3;
		$storage = readFolder('storage');
		$totalPage = ceil(count($storage)/$itemsPerPage);

		if ($id > $totalPage) {
			$id = 3;
			
		} 

		// Menghitung indeks awal dan akhir untuk halaman yang diminta
		$startIndex = ($id - 1) * $itemsPerPage;
		$endIndex = $startIndex + $itemsPerPage;
		 // Mendapatkan data untuk halaman yang diminta
		$pagedStorage = array_slice($storage, $startIndex, $itemsPerPage);


		$data = [
			"Response" => "Success",
			"Data" => $pagedStorage,
			"Page" => $id.' of '.$totalPage,
		];

		// Tambahkan header JSON
		header('Content-Type: application/json');
		echo json_encode($data);

	}
}
