<?php 
include 'dashboard.php';

if (isset($_POST['submit'])) {
    $errors = array();
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $register_date = $_POST['register_date'];
    $expire_date = $_POST['expire_date'];
    $owner = $_POST['owner'];

    //name
    if (empty($name)) {
        $errors['n'] = "Enter your Domain Name";
    } else {
        if (strlen($name) < 3) {
            $errors['n'] = "Minimum 3 character is required";
        } elseif (strlen($name) > 20) {
            $errors['n'] = "Maximum 20 Charcter is required";
        }
        elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $name)) {
            $errors['n'] = "Invalid Domain";
          }
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO `domain`(user_id,name,register_date,expire_date,owner) VALUES('$user_id','$name','$register_date','$expire_date','$owner')";
        $result = mysqli_query($con, $sql);
?>
        <script type="text/javascript">
            alert('Data Inserted Successfully');
            location.href = 'recentDomain.php';
        </script>
<?php
    }
}

?>
<html>

<head>
    <title>Add Contact</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box
        }

        h1 {
            text-align: center;
            color: #000000;
            font-size: xx-large;
        }

        input[type=text],
        input[type=password],
        input[type=date] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 0 0;
            display: inline-block;
            border: none;
            background: #c0c0c0;
        }

        input[type=submit] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 0 0;
            display: inline-block;
            border: none;
            background: #c0c0c0;
        }

        input[type=text]:focus,
        input[type=password]:focus,
        input[type=date]:focus,
        input[type=submit]:focus {
            background-color: lightgray;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        hr {
            order: 1px solid #f1f1f1;
            margin-bottom: 5px;
        }

        .text-danger {
            color: red;
        }

        .div-class {
            width: 50%;
            padding: 15px;
            margin: 0px 325px;
        }
    </style>

    <script>
        function c_validation() {
            var name =
                document.forms.domainForm.name.value;
            var register_date =
                document.forms.domainForm.register_date.value;
            var expire_date =
                document.forms.domainForm.expire_date.value;
            var owner =
                document.forms.domainForm.owner.value;

            var regName = /\d+$/g; // Javascript reGex for Name validation

            //name
            if (name == "" || regName.test(name)) {
                window.alert("Please enter your domain name properly.");
                // name.focus();
                return false;
            }
            //email
            if (register_date == "" ) {
                window.alert("Please enter a registration date.");
                // email.focus();
                return false;
            }
            //mobile number
            if (expire_date == "") {
                window.alert("Please enter a expiry date");
                // mobile.focus();
                return false;
            }
            //address
            if (owner == "") {
                window.alert("Please enter your owner name.");
                // address.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <form name="domainForm" method="post">
        <div class="div-class">
            <hr>
            <h1>Add Domain Form</h1>
            <label for="name"><b>Domain Name</b></label>
            <input type="text" placeholder="Enter Domain Name" name="name" value="<?php echo $name ?>">
            <p class="text-danger">
                <?php if (isset($errors['n'])) echo $errors['n']; ?>
            </p>

            <label for="register_date"><b>Registration Date</b></label>
            <input type="date" placeholder="Enter Registration Date" name="register_date" value="<?php echo $email ?>">
            <p class="text-danger">
                <?php if (isset($errors['e'])) echo $errors['e']; ?>
            </p>

            <label for="expire_date"><b>Expiry Date</b></label>
            <input type="date" placeholder="Enter Expiry Date" name="expire_date" value="<?php echo $phone ?>">
            <p class="text-danger">
                <?php if (isset($errors['p'])) echo $errors['p']; ?>
            </p>

            <label for="owner"><b>Owner</b></label>
            <input type="text" placeholder="Enter your Owner Name" name="owner" value="<?php echo $address ?>">
            <p class="text-danger">
                <?php if (isset($errors['a'])) echo $errors['a']; ?>
            </p>
            <input type="submit" value="Add" name="submit" onclick="return c_validation()" />
        </div>
    </form>
</body>

</html>