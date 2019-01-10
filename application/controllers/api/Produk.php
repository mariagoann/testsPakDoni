<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
// use namespace
use Restserver\Libraries\REST_Controller;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**  
 * Raksa Claim Web Service
 *
 * @author g
 */ 
class Produk extends REST_Controller { 
    public function __construct() { 
        parent::__construct();
        $this->load->model('produk_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    //method : get
	public function allProduk_get(){
		$http_response = REST_Controller::HTTP_OK;
		$result = $this->produk_model->getAll();
		$this->set_response($result, $http_response);
	}

	//method:get
	public function produk_get(){
		$http_response = REST_Controller::HTTP_OK;
		$result = $this->produk_model->get($this->get());
		$this->set_response($result, $http_response);
	}

	//method:POST
	public function insert_post(){
		$http_response = REST_Controller::HTTP_OK;
		$result = $this->produk_model->insert($this->post());
		$this->set_response($result, $http_response);
	}

	//method: put
	public function edit_put(){
		$http_response = REST_Controller::HTTP_OK;
		$result = $this->produk_model->edit($this->put());
		$this->set_response($result, $http_response);
	}

	//method: delete
	public function hapus_post(){
		$http_response = REST_Controller::HTTP_OK;
		$result = $this->produk_model->hapus($this->post());
		$this->set_response($result, $http_response);
	}
}
