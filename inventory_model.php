
<?php

class inventory_model{
 
    var $koneksi;
    var $host = "localhost";
    var $username = "";
    var $password = "";
    var $database = "";

    public function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
    }
 
    public function index($search = null){

		if(!empty($search)) {
			$query = "SELECT * FROM inventory WHERE kode_barang LIKE '%{$search}%' OR nama_barang LIKE '%{$search}%' OR jumlah_barang LIKE '%{$search}%'";
		} else {
			$query = "select * from inventory";
		}

		$data = mysqli_query($this->koneksi, $query);

		$results = [];
		while($row = mysqli_fetch_array($data)){
			$results[] = $row;
		}
		return $results;
    }
 
    public function show($id){

		$query = "select * from inventory where id = {$id}";

		$data = mysqli_query($this->koneksi, $query);

		$results = mysqli_fetch_row($data);

		return $results;
    }

    public function add($nama_barang,$kode_barang,$jumlah_barang,$tanggal)
	{
		$query = "INSERT INTO `inventory` (`id`, `nama_barang`, `kode_barang`, `jumlah_barang`, `tanggal`) VALUES (NULL, '{$nama_barang}', '{$kode_barang}', '{$jumlah_barang}', '{$tanggal}')";
		return mysqli_query($this->koneksi,$query);
	}

    public function edit($nama_barang,$kode_barang,$jumlah_barang,$tanggal, $id)
	{
		$query = "UPDATE `inventory` SET `kode_barang` = '{$kode_barang}', `nama_barang` = '{$nama_barang}', `jumlah_barang` = '{$jumlah_barang}', `tanggal` = '{$tanggal}' WHERE `inventory`.`id` = {$id};";
		
		return mysqli_query($this->koneksi,$query);
	}

} 

