<?php
if (isset($_SESSION['login']) != true) {
    if (isset($_POST["login"])) {
        // menangkap data
        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        // cek username dalam database
        if (mysqli_num_rows($result) === 1) {
            //cek password dalam database
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                // set session
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION["login"] = true;

                echo "<script>
                Swal.fire({
                    type: 'success',
                    title: 'Login',
                    text: 'Berhasil',
                  });
                setTimeout(function() {
                    document.location='index.php';
                    document.location='index.php';
                }, 3000)
                
                </script>
                ";

                $login = true;
                $success = true;
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }
    }
}
