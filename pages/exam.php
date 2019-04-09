<?php require 'header.php'; ?>
<?php if (isset($_GET['error']) && $_GET['error'] == '3') : ?>
    <script>
        alert('You\'ve already submitted the exam');
        window.location = 'index.php?rel=home&method=dashboard'; 
    </script>
<?php endif ?>

<?php if (isset($_GET['status']) and $_GET['status'] == '1') : ?>
    <script>
        alert('exam submitted successfully !');
        window.location = 'index.php?rel=home&method=dashboard';
    </script>
<?php endif; ?>

<?php if (count($data['answers']) > 0) : ?>
    <script>
        alert('You\'ve already submitted the exam');
        window.location = 'index.php?rel=home&method=dashboard';
    </script>
<?php endif ?>
<div class="container">
    <div style="margin-left:20px;">
     <h3>Exam</h3>
     <hr>
    </div>

    <div class="col-md-3">

        <?php require 'sidebar.php'; ?>
    </div>
    <div class="col-md-8"> 
        <?php if (count($data['questions']) > 0) : ?>
            <form method="post" action="index.php?rel=form&method=exam">
            <ul class="list-group">
            <?php foreach ($data['questions'] as $key => $question) : ?>
                <li class="list-group-item">
                    <input type="hidden" value="<?=$question['id']?>" name="question_id[]">
                    <?php echo ($key+1)?>) <?php echo $question['question'] ?>
                    <br>
                    <input type="radio" name="option_<?=$question['id']?>" value="A_<?php echo $question['answer'].'_'.$question['id']?>"> A) <?php echo $question['optionA'] ?>
                    <br>
                    <input type="radio" name="option_<?=$question['id']?>" value="B_<?php echo $question['answer'].'_'.$question['id'] ?>"> B) <?php echo $question['optionB'] ?>
                     <br>
                    <input type="radio" name="option_<?=$question['id']?>" value="C_<?php echo $question['answer'].'_'.$question['id']?>"> C) <?php echo $question['optionC'] ?>
                     <br>
                    <input type="radio" name="option_<?=$question['id']?>" value="D_<?php echo $question['answer'].'_'.$question['id']?>"> D) <?php echo $question['optionD'] ?>
                </li>
            <?php endforeach; ?>
            </ul>
            <button class="btn btn-primary btn-lg" type="submit">Submit </button>
            </form>
        <?php endif ?>   
    </div>
   
</div>
<?php require 'footer.php'; ?>