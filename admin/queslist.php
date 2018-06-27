<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../classes/Exam.php');
    $exm = new Exam();

?>
<?php
    if (isset($_GET['delque'])){
        $queno = (int)$_GET['delque'];
        $delQue = $exm->delQuestion($queno);

    }
?>
    <div class="main">
        <h1>Admin Panel - Question List</h1>
<?php
    if (isset($delQue)){
        echo $delQue;
    }
?>
        <div class="quelist">
            <table class="tblone">
                <tr>
                    <th width="10%">Serial</th>
                    <th width="70%">Questions</th>
                    <th width="20%">Action</th>
                </tr>
            <?php
                $getdata = $exm->getAllQuestion();
                if ($getdata){
                    $i = 0;
                    while ($value = $getdata->fetch_assoc()) {
                        $i++;
            ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['ques']; ?></td>
                            <td>
                                <a onclick="return confirm('Are You Sure to Remove?')" href="?delque=<?php echo $value['quesNo']; ?>">Remove</a>
                            </td>
                        </tr>
                <?php
                  }}
                ?>
            </table>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>