<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Invoice</title>
</head>
<body>
    <?php
        include("../header.php");
        include("../connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">My Invoice</h5>
                        <?php
                            $pat = $_SESSION['patient'];
                            $query = "SELECT * FROM patient WHERE username='$pat'";
                            $res = mysqli_query($connect,$query);
                            $row = mysqli_fetch_array($res);
                            $fname = $row['firstname'];
                            $querys = mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname");
                            $output = "";
                            $output.= "
                            <table class='table table-bordered'>
                                <tr>
                                    <td>ID</td>
                                    <td>Doctor</td>
                                    <td>Patient</td>
                                    <td>Date Discharged</td>
                                    <td>Amount Paid</td>
                                    <td>Description</td>
                                </tr>
                            ";
                            if(mysqli_num_rows($res)<1)
                            {
                                $output .= "
                                    <tr>
                                        <td class='text-center' colspan='6'> No Invoice Yet </td>
                                    </tr>
                                ";
                            }
                            while($row = mysqli_fetch_array($res))
                            {
                                $output .= "
                                    <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['doctor']."</td>
                                        <td>".$row['patient']."</td>
                                        <td>".$row['date_discharge']."</td>
                                        <td>".$row['amount_paid']."</td>
                                        <td>".$row['description']."</td>
                                        <td>
                                            <a href='view.php?id=".$row['id']."'>
                                                <button class='btn btn-info'>View</button>
                                            </a> 
                                        </td>
                                ";
                            }

                            $output .="
                                </tr>
                            </table>";
                            echo $output;
                        ?>
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>