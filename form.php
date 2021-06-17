<?php
include('inventory_controller.php');
$inventory_controller = new inventory_controller();

if(!empty($_GET['id'])) {
    $value = $inventory_controller->show($_GET['id']);
} 

if(!empty($_POST)) {
    if($_POST['action'] == 'edit') {
        $inventory_controller->edit(
            $_POST['kode_barang'],
            $_POST['nama_barang'],
            $_POST['jumlah_barang'],
            $_POST['tanggal'],
            $_POST['id']
        );
    } else if($_POST['action'] == 'add') {
        $inventory_controller->add(
            $_POST['kode_barang'],
            $_POST['nama_barang'],
            $_POST['jumlah_barang'],
            $_POST['tanggal']
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?php echo empty($_GET['id']) ? 'Tambah' : 'Edit'; ?> Inventory</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="hidden" name="action" value="<?php echo empty($value[0]) ? 'add' : 'edit'; ?>">
        <input type="hidden" name="id" value="<?php echo empty($value[0]) ? '' : $value[0]; ?>">

        <table>
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td><input type="text" name="kode_barang" 
                    value="<?php echo empty($value[2]) ? '' : $value[2]; ?>" 
                    required></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" 
                    value="<?php echo empty($value[1]) ? '' : $value[1]; ?>" 
                    required></td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td>:</td>
                <td><input type="number" name="jumlah_barang" 
                    value="<?php echo empty($value[3]) ? '' : $value[3]; ?>" 
                    required></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" 
                    value="<?php echo empty($value[4]) ? date('Y-m-d') : $value[4]; ?>" 
                    required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Simpan</button>
                </td>
                <td>
                    <a href="index.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>