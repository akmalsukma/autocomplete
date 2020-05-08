<?php 
include 'koneksi.php';

$namasiswa = '%' . htmlspecialchars($_POST['namasiswa']) . '%';

$i = 1;

$query = "SELECT * FROM siswa WHERE namasiswa LIKE ? ORDER BY namasiswa ASC LIMIT 5";
$execute = $db->prepare($query);
$execute->bind_param("s" , $namasiswa);
$execute->execute();
$result = $execute->get_result();
while($baris = $result->fetch_assoc()){
    $data[$i]['nipd'] = $baris['nipd'];
    $data[$i]['namasiswa'] = $baris['namasiswa'];
    $data[$i]['umur'] = $baris['umur'];
    $data[$i]['alamat'] = $baris['alamat'];


    $i++;
}

    $hasil = array_values($data);
    echo json_encode($hasil);


?>