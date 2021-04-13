<?php
$connect = mysqli_connect("localhost", "root", "", "pegawai");

if (!$connect) {
    die("Connection failed" . mysqli_connect_error());
}
$sql = "SELECT * FROM data_pegawai WHERE id= '$_GET[id]'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form method="post" action="index.php">
    Id : <input type="text" name="id" value="<?php echo $row["id"]; ?>"><br>
    Nama Depan : <input type="text" name="nama_depan" value="<?php echo $row["nama_depan"]; ?>"><br>
    Nama Belakang : <input type="text" name="nama_belakang" value="<?php echo $row["nama_belakang"]; ?>"><br>
    Email : <input type="text" name="email" value="<?php echo $row["email"]; ?>"><br>
    Alamat : <input type="text" name="alamat" value="<?php echo $row["alamat"]; ?>"><br>
    <input type="submit" name="btn" value="update"><br><br>

    <p>Catatan:<br>
        Primary Key: ID<br>
        Primary Key Tidak Dapat DI Ubah</p>

</form>