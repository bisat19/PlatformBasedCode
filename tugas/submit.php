<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $birthPlace = htmlspecialchars($_POST['birthPlace']);
    $day = htmlspecialchars($_POST['day']);
    $month = htmlspecialchars($_POST['month']);
    $year = htmlspecialchars($_POST['year']);
    $address = htmlspecialchars($_POST['address']);
    $postalCode = htmlspecialchars($_POST['postalCode']);
    $country = htmlspecialchars($_POST['country']);
    $departemen = htmlspecialchars($_POST['departemen']);
    $interest = isset($_POST['interest']) ? implode(", ", $_POST['interest']) : "None";

    echo "Data User";
    echo "<table border='1'>";
    echo "<tr><th>Username</th><td>$username</td></tr>";
    echo "<tr><th>Nama Lengkap</th><td>$name</td></tr>";
    echo "<tr><th>Alamat Email</th><td>$email</td></tr>";
    echo "<tr><th>Tempat Lahir</th><td>$birthPlace</td></tr>";
    echo "<tr><th>Tanggal Lahir</th><td>$day-$month-$year</td></tr>";
    echo "<tr><th>Alamat Rumah</th><td>$address</td></tr>";
    echo "<tr><th>Kode Pos</th><td>$postalCode</td></tr>";
    echo "<tr><th>Negara</th><td>$country</td></tr>";
    echo "<tr><th>Departemen</th><td>$departemen</td></tr>";
    echo "<tr><th>Peminatan</th><td>$interest</td></tr>";
    echo "</table>";
}
?>
