<?php include 'inc/header.php'; ?>
<?php
    Session::checkSession();

    $question = $exm->getQuestion();
    $total = $exm->getTotalQuestionNumber();
?>
<div class="main">
    <h1>Welcome to Online Exam</h1>
    <div class="starttest">
        <h3>Test your Knowledge</h3>
        <p>This is multiple choice quize to test your knowledge</p>
        <ul>
            <li><strong>Number of Question:</strong> <?php echo $total; ?></li>
            <li><strong>Question Type:</strong> Multiple Choice</li>
        </ul>
        <a href="test.php?q=<?php echo $question['quesNo']; ?>">Start Test</a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>