<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        .form-group.checkbox-group {
            display: flex;
            flex-wrap: wrap;
        }
        .form-group.checkbox-group label {
            width: auto;
            margin-right: 10px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        button {
            width: 48%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .reset-btn {
            background-color: #f44336;
        }
        .reset-btn:hover {
            background-color: #e53935;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        @media (max-width: 768px) {
            .container {
                width: 80%;
            }
        }
        @media (max-width: 480px) {
            .container {
                width: 100%;
                padding: 15px;
            }
            button {
                width: 100%;
                margin-bottom: 10px;
            }
            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form id="registrationForm" method="post" action="submit.php" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="birthPlace">Tempat Lahir</label>
                <input type="text" id="birthPlace" name="birthPlace">
            </div>
            <div class="form-group">
                <label for="birthDate">Tanggal Lahir</label>
                <select id="day" name="day">
                    <option value="">Hari</option>
                    <?php for($i=1; $i<=31; $i++) echo "<option value='$i'>$i</option>"; ?>
                </select>
                <select id="month" name="month">
                    <option value="">Bulan</option>
                    <?php 
                    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    foreach($months as $index => $month) {
                        echo "<option value='".($index+1)."'>$month</option>";
                    }
                    ?>
                </select>
                <select id="year" name="year">
                    <option value="">Tahun</option>
                    <?php for($i=1990; $i<=2020; $i++) echo "<option value='$i'>$i</option>"; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Alamat Rumah</label>
                <input type="text" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="postalCode">Kode Pos</label>
                <input type="text" id="postalCode" name="postalCode">
            </div>
            <div class="form-group">
                <label for="country">Negara</label>
                <input type="text" id="country" name="country">
            </div>
            <div class="form-group">
                <label>Peminatan</label>
                <div class="checkbox-group">
                    <p><input type="checkbox" name="interest[]" value="Art"> Art</p>
                    <p><input type="checkbox" name="interest[]" value="Science"> Science</p>
                    <p><input type="checkbox" name="interest[]" value="Politics"> Politics</p>
                    <p><input type="checkbox" name="interest[]" value="Sports"> Sports</p>
                </div>
            </div>
            <div class="button-group">
                <button type="submit">Submit</button>
                <button type="reset" class="reset-btn" onclick = "resetForm()">Reset</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const birthPlace = document.getElementById('birthPlace').value;
            const day = document.getElementById('day').value;
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;
            const address = document.getElementById('address').value;
            const postalCode = document.getElementById('postalCode').value;
            const country = document.getElementById('country').value;

            if (!name && !email && !password && !birthPlace && !day && !month && !year && !address && !postalCode && !country) {
                alert('Mohon isi form!');
                return false;
            }
            if(!name){
                alert('Mohon isi nama lengkap dengan benar!');
                return false;
            }
            if(!email){
                alert('Mohon isi email dengan benar!');
                return false;
            }
            if(!birthPlace){
                alert('Mohon isi tempat lahir dengan benar!');
                return false;
            }
            if(!day || !month || !year){
                alert('Mohon isi tanggal lahir dengan benar!');
                return false;
            }
            if(!address){
                alert('Mohon isi alamat dengan benar!');
                return false;
            }
            if(isNaN(postalCode) || !postalCode){
                alert('Mohon isi kode pos dengan benar!');
                return false;
            }
            if(!country){
                alert('Mohon isi negara dengan benar!');
                return false;
            }
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(password)) {
                alert('Password setidaknya terdiri dari 8 karakter yang terdapat uppercase, lowercase, symbol, dan angka');
                return false;
            }

            return true;
        }
        function resetForm(){
            document.forms["form"].reset();
        }
    </script>
</body>
</html>
