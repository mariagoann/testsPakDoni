<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
 
/**
 * Description of Account_model
 *
 * @author g
 */
class Produk_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->db = $this->load->database('default',true);
	}

	public function getAll(){
		$return= $this->db->select('*')
						->from('produk')
						->get()
						->result_array();
		return $return;
	}

	public function get($id){
		$return= $this->db->select('*')
						->from('produk')
						->where(['id'=>$id['id']])
						->get()
						->result_array();
		return $return;
	}

	public function insert($post){
		$return=[
			'status'=>0,
			'message'=>'Data tidak berhasil disimpan',
		];
		$insert = $this->db->insert('produk', [
										'nama_user'=>$post['user'],
										'nama_produk'=>$post['produk'],
									]);
		if($insert){
			$return = [
				'status'=>1,
				'message'=>'Data berhasil disimpan',
			];
		}
		return $return;
	}

	public function edit($put){
		$return=[
			'status'=>0,
			'message'=>'Data tidak berhasil diubah',
		];
		$data = array(
		        'nama_produk' => $put['produk'],
		);
		$insert = $this->db->where(['id'=>$put['id']])
						->update('produk',$data);
		if($insert){
			$return = [
				'status'=>1,
				'message'=>'Data berhasil diubah',
			];
		}
		return $return;
	}

	public function hapus($post){
		$return =[
			'status'=>0,
			'message'=>'Data tidak berhasil dihapus',
		];
		$hapus = $this->db->delete('produk', ['id' => $post['id']]);
		if($hapus){
			$return = [
				'status'=>1,
				'message'=>'Data berhasil dihapus'
			];
		}
		return $return;
	}
}