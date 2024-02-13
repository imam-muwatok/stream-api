<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;


class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Api_model');
        folderExist();
    }

    public function movie_get() {
        $id = $this->get('id');
        if ($id) {
            $datas = $this->Api_model->get_id('movie', $id)->row_array();
            if ($datas) {
                $this->response([
                    'status' => true,
                    'result' => $datas
    
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'result' => 'Data not found!'
    
                ], RestController::HTTP_NOT_FOUND);
            }
        } else {
            $datas = $this->Api_model->get('movie')->result();

            if ($datas) {
                $this->response([
                    'status' => true,
                    'result' => $datas
    
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'result' => 'Datas not found!'
    
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    // ========================== Mahasiswa ===============

    public function mahasiswa_get() {
        $id = $this->get('id');
        if ($id) {
            $datas = $this->Api_model->get_id('mahasiswa', $id)->row_array();
            if ($datas) {
                $this->response([
                    'status' => true,
                    'result' => $datas
    
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'result' => 'Data not found!'
    
                ], RestController::HTTP_NOT_FOUND);
            }
        } else {
            $datas = $this->Api_model->get('mahasiswa')->result();

            if ($datas) {
                $this->response([
                    'status' => true,
                    'result' => $datas
    
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'result' => 'Datas not found!'
    
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function mahasiswa_post() {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        // echo json_encode($data);

        if ($this->Api_model->create('mahasiswa', $data) > 0) {
            $this->response([
                'status' => true,
                'result' => 'Data has been created!'

            ], RestController::HTTP_CREATED);

        } else {
            $this->response([
                'status' => false,
                'result' => 'Fail to create new data!'

            ], RestController::HTTP_BAD_REQUEST);
        }

    }

    public function mahasiswa_put() {
        $id = $this->put('id');
        // $nama = $this->put('nama');
        // echo $nama;
        $data = [
            // 'id' => $this->post('id'),
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->Api_model->update('mahasiswa', $data , $id) > 0) {
            $this->response([
                'status' => true,
                'result' => 'Data has been update!'

            ], RestController::HTTP_OK);

        } else {
            $this->response([
                'status' => false,
                'result' => 'Fail to update data!'

            ], RestController::HTTP_BAD_REQUEST);
        }

    }

    public function mahasiswa_delete() {
        $id = $this->delete('id');
        
        if ($id) {
            if ($this->Api_model->delete('mahasiswa',$id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'result' => 'Deleted!'
    
                ], RestController::HTTP_OK);

            } else {
                $this->response([
                    'status' => false,
                    'result' => 'Id not found!'
    
                ], RestController::HTTP_BAD_REQUEST);
            }

        } else {
            $this->response([
                'status' => false,
                'result' => 'Provide an id!'

            ], RestController::HTTP_BAD_REQUEST);
        }


    }
}