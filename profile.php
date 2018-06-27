<?php include 'inc/header.php'; ?>
<?php
    Session::checkSession();
    $userid = Session::get("userId");
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $updatedata = $user->getUpdateData($userid, $_POST);
    }
?>
    <style>
        .profile{width: 440px;margin: 0 auto; border: 1px solid #dddddd;padding: 30px 50px 50px 138px;
    </style>

    <div class="main">
        <h1>Online Exam System - User Profile</h1>
        <div class="profile">
<?php
    if (isset($updatedata)){
        echo $updatedata;
    }
?>
            <form action="" method="post">
        <?php
            $getdata = $user->getUserData($userid);
            if (isset($getdata)){
                while ($value = $getdata->fetch_assoc()){
        ?>
                <table class="tbl">
                    <tr>
                        <td>Name</td>
                        <td><input name="name" type="text" value="<?php echo $value['name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input name="email" type="text" value="<?php echo $value['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Username </td>
                        <td><input name="username" type="text" value="<?php echo $value['username']; ?>"></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update Profile">
                        </td>
                    </tr>
                </table>
                    <?php } } ?>
            </form>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>