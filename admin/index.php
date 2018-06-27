<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>

    <style>
        .adminpanel{
            width: 500px;
            border: 1px solid #ddd;
            margin: 30px auto 0;
            padding: 50px;
            color: #999;
        }
    </style>

<div class="main">
<h1>Admin Panel</h1>
<div class="adminpanel">
    <h2 style="color: green">Welcome to Admin Panel</h2>
    <p>You can manage your user and online exam system from here....</p>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>