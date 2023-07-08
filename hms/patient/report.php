<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
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
                    <h5 class="text-center my-2">Total Report</h5>
                    <?php
                        $pat = $_SESSION['patient'];
                        $querys = mysqli_query($connect,"SELECT * FROM report WHERE username='$pat");
                        $output = "";
                        $output .= "
                            <table class='table table-bordered'>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Messages</td>
                                <td>Username</td>
                                <td>Date Send</td>
                            </tr>
                        ";
                        if (mysqli_num_rows($res)<1) {
                            $output .="
                            <tr>
                                <td colspan='6' class='text-center'>NO Report Yet </td>
                            </tr> 
                            ";
                        }
                        while ($row = mysqli_fetch_array($res)) {
                            $output .="
                            <tr>
                            <td>".$row['id']." </td>
                            <td>".$row['title']." </td>
                            <td>".$row['message']." </td>
                            <td>".$row['username']." </td>
                            <td>".$row['date_send']." </td>
                            ";
                        }
                        $output .= "
                        </tr>
                        </table>
                        ";
                        
                        echo $output;

                    ?>
                </div>
            </div>  
        </div>
    </div>
    
</body>
</html>