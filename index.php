<?php

$connect = mysqli_connect("localhost", "root", "", "pegawai");

if (!$connect) {
    die("Connection failed" . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 3</title>
</head>

<body>
    <?php
    ini_set("display_errors", 0);
    if ($_GET['btn'] == 'delete') {
        $sql = "DELETE FROM data_pegawai WHERE id='$_GET[id]'";
        mysqli_query($connect, $sql);
        echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'index.php';
        </script>";
    }
    if ($_POST['btn'] == 'update') {
        $sql = "UPDATE data_pegawai SET nama_depan='$_POST[nama_depan]',nama_belakang='$_POST[nama_belakang]',email='$_POST[email]',alamat ='$_POST[alamat]' WHERE id='$_POST[id]'";
        mysqli_query($connect, $sql);
        echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
        </script>";
    }
    if ($_POST['btn'] == 'input') {
        $id = $_POST['id'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $sql = "INSERT INTO data_pegawai (id,nama_depan,nama_belakang,email,alamat) VALUES ('$id','$nama_depan','$nama_belakang','$email','$alamat')";
        mysqli_query($connect, $sql);
        echo "<script>
            alert('data berhasil ditambah');
            document.location.href = 'index.php';
        </script>";
    }
    $sql = "SELECT * from data_pegawai";
    $result = mysqli_query($connect, $sql);
    ?>
    <h1 style="text-align: center;">Data Pegawai</h1>
    <table border="1" style="margin: 0 auto;">
        <tr>
            <td>id</td>
            <td>nama depan</td>
            <td>nama belakang</td>
            <td>email</td>
            <td>alamat</td>
            <td colspan="2" align="center">aksi</td>
        </tr>
        <?php
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nama_depan"] . "</td>
                    <td>" . $row["nama_belakang"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["alamat"] . "</td>
                    <td><a href=\"update_data.php?id=" . $row["id"] . "&btn=update\">
								update</a></td>
                    <td><a href=\"index.php?id=" . $row['id'] . "&btn=delete\">
                    delete</a> </td>
                    </tr>";
            }
        } else {
            echo "0 result in database";
        }
        ?>

    </table>
    <a href="input_data.php">
        <p align="center">Input Data</p>
    </a>
</body>

</html>