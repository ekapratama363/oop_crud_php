<?php
include('inventory_controller.php');
$inventory_controller = new inventory_controller();
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
    <h1>List Inventory</h1>

    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>
                    <a href="form.php">Tambah Data</a>
                </td>
                <td>
                    <input type="text" name="search" placeholder="Cari..." value="<?php echo $_GET['search']; ?>">
                </td>
            </tr>
        </table>
    </form>

    <table border="1">
        <tr>
            <td>No</td>
            <td>Kode Barang</td>
            <td>Nama Barang</td>
            <td>Jumlah Barang</td>
            <td>Tanggal</td>
            <td>Aksi</td>
        </tr>
        <?php $no = 1; foreach($inventory_controller->index(empty($_GET['search']) ? null : $_GET['search']) as $data) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['kode_barang']; ?></td>
                <td><?php echo $data['jumlah_barang']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><a href="form.php?id=<?php echo $data['id']; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>