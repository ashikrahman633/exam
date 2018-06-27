<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/header.php');
include_once ($filepath.'/../classes/User.php');
$user = new User();

?>

<?php
    if (isset($_GET['dis'])){
        $getid = (int)$_GET['dis'];
        $dbluser = $user->disableUser($getid);
    }

    if (isset($_GET['ena'])){
        $enabid = (int)$_GET['ena'];
        $enluser = $user->enableUser($enabid);
    }

    if (isset($_GET['del'])){
        $delid = (int)$_GET['del'];
        $deluser = $user->removeUser($delid);
    }
?>


    <div class="main">
        <h1>Admin Panel - User List</h1>
        <?php
            if (isset($dbluser)){
                echo $dbluser;
            }

            if (isset($enluser)){
                echo $enluser;
            }

            if (isset($deluser)){
                echo $deluser;
            }
        ?>
        <div class="manageuser">
            <table class="tblone">
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
        <?php
                $alluser = $user->getAllUser();
                if ($alluser){
                    $i = 0;
                    while ($value = $alluser->fetch_assoc()) {
                        $i++;
        ?>
                <tr>
                    <td>
                        <?php
                        if ($value['status'] == 1){
                            echo "<span class='error'>".$i."</span>";
                        }else{
                            echo $i;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['status'] == 1){
                            echo "<span class='error'>".$value['name']."</span>";
                        } else{
                            echo $value['name'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['status'] == 1){
                            echo "<span class='error'>".$value['username']."</span>";
                        } else{
                            echo $value['username'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['status'] == 1){
                            echo "<span class='error'>".$value['email']."</span>";
                        } else{
                            echo $value['email'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['status'] == 0){ ?>
                            <a onclick="return confirm('Are You Sure to Disable?')" href="?dis=<?php echo $value['userId']; ?>">Disable</a>
                        <?php } else{ ?>
                            <a onclick="return confirm('Are You Sure to Enable?')" href="?ena=<?php echo $value['userId']; ?>">Enable</a>
                        <?php } ?>
                        ||<a onclick="return confirm('Are You Sure to Remove?')" href="?del=<?php echo $value['userId']; ?>">Remove</a>
                    </td>
                </tr>
        <?php
            }}
        ?>
            </table>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>