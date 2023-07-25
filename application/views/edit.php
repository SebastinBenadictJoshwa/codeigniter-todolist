<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        body{
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container d-flex aligns-items-center justify-content-center" >
    <div class="shadow mt-5 rounded p-3 w-50">
    <form class="form" action="<?php echo base_url('index.php/Taskcontroller/edit'); ?>" method="post">
    <div class="h2 mb-4">Add task</div>
    <div class="form-floating mb-3 mt-3">
    <?php foreach($records as $r){
        echo "<input type='hidden' name='id' value='".$r->id."'>";
        ?>
    <textarea name="task" class="form-control" id="task" rows="4" ><?php echo $r->task_name; }?></textarea>
    <label for="task">Task</label>
    </div>
    <button for="submit" class="btn btn-outline-primary  mt-3 mb-3">Edit task</button>
    </form>
    </div>
    </div>
</body>
</html>