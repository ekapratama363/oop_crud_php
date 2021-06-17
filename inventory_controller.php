<?php 
include('inventory_model.php');
// $db = new inventory_model();

class inventory_controller {

    var $db;

    function __construct() {
        $this->db = new inventory_model();
    }

    public function add($nama_barang, $kode_barang, $jumlah_barang, $tanggal) {

        $save = $this->db->add($nama_barang, $kode_barang, $jumlah_barang, $tanggal);

        if($save) {
            header('location:index.php');
        } else {
            echo 'gagal simpan data';
        }
    }

    public function edit($nama_barang, $kode_barang, $jumlah_barang, $tanggal, $id) {
        $save = $this->db->edit($nama_barang, $kode_barang, $jumlah_barang, $tanggal, $id);

        if($save) {
            header('location:index.php');
        } else {
            header("location:form.php?id={$id}");
            echo 'gagal edit data';
        }
    }

    public function show($id) {
        $data = $this->db->show($id);

        return $data;
    }

    public function index($search = null) {
        $data = $this->db->index($search);

        return $data;
    }
}