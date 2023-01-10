<?php 
include 'dashboard.php';

$sql = "SELECT * FROM domain WHERE user_id = '".$_SESSION['id']."' ORDER BY created_on DESC limit 5";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Domain</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #000000;
            font-size: xx-large;
        }

        td {
            background-color: #c0c0c0;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <section>
        <hr>
        <h1>Recent Domains</h1>
        <table>
            <?php
            if (mysqli_num_rows($result)) {
            ?>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Registration Date</td>
                <td>Expiry Date</td>
                <td>Domain Owner</td>
            </tr>
            <?php
                while ($rows = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['register_date'] ?></td>
                        <td><?php echo $rows['expire_date'] ?></td>
                        <td><?php echo $rows['owner'] ?></td>
                    </tr>
                <?php
                }
            } else { ?>
                <table>
                    <tr>
                        <td><?php echo "No Record Found" ?></td>
                    </tr>
                </table>
            <?php
            }
            ?>
        </table>
    </section>
</body>
</html>