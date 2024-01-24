<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">TEST NSA</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_Alamat = $result['Alamat'];
                $res_Jenis_kelamin = $result['Jenis_kelamin'];
                $res_id = $result['Id'];
            }
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hallo <b><?php echo $res_Uname ?></b>, Selamat Datang!</p>
            </div>
            <div class="box">
                <p>Ini adalah email kamu : <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>Jenis Kelamin <b><?php echo $res_Jenis_kelamin ?></b>.</p> 
                <p>Kamu saat ini berumur <b><?php echo $res_Age ?> years old</b>.</p> 
                <p>Dan tinggal di <b><?php echo $res_Alamat ?> </b>.</p> 
            </div>
          </div>

          <!-- <br>
            <div class="box">
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql = "SELECT * FROM users";
                        $query = mysqli_query($con, $sql);
                        while($siswa = mysqli_fetch_array($query)){
                            echo "<tr>";

                            echo "<td>".$siswa['Id']."</td>";
                            echo "<td>".$siswa['Username']."</td>";
                            echo "<td>".$siswa['Age']."</td>";
                            echo "<td>".$siswa['Alamat']."</td>";
                            echo "<td>".$siswa['Jenis_kelamin']."</td>";
                           

                            echo "<td>";
                            // echo "<a href='form-edit.php?id=".$siswa['Id']."'>Edit</a> | ";
                            echo "<a href='hapus.php?id=".$siswa['Id']."'>Hapus</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div> -->
       </div>
    </main>
</body>
</html>