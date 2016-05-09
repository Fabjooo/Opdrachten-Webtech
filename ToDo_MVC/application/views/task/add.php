<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <h1>Add a new task</h1>
        <form action="" method="POST">
            <?php if(!empty($feedback) ):  ?>
            <div class="alert alert-success"><?php echo $feedback ?></div>
            <?php endif; ?>

            <?php echo validation_errors(); ?>
            <div class="form-group">
                <label for="todo_name">Todo name</label>
                <input type="text" class="form-control" id="todo_name" name="todo_name" placeholder="text">
            </div>

            <button type="submit" value="submit">Add Task</button>
        </form>
    </div>
</div>

</body>
</html>