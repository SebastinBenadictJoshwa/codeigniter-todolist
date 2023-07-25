<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container shadow p-3 mt-3 rounded">
    <div class="h2 text-center text-dark">Todo list</div>
    </div>
    <?php if(isset($_GET['message'])){
    echo '<div class="alert alert-warning" id="msg">';
    $message=urldecode($_GET['message']);
        echo $message;
    } ?>
    </div>
    <div class="container align-items-end mt-5">
    <a class="btn btn-primary text-white h2" href="<?php echo base_url('index.php/Taskcontroller/add'); ?>">Add new task</a>
    </div>
    <?php if(isset($records) && !empty($records)) {?>
    <table class="table px-5 mx-5 mt-5 shadow">
    <div class="h4 text-center">Tasks pending</div>
        <tr class="table-white">
            <th>No</th>
            <th>Tasks</th>
            <th>Status</th>
            <th>action</th>
        </tr>
        <?php
        $i=1;
        foreach($records as $r){
        echo "<tr>";
        echo "<td>".$i++."</td>";
        echo "<td>".$r->task_name."</td>";
        echo "<td>".$r->status."</td>";
        echo "<td>";
        echo "<a class='btn btn-success me-2' href= ' ".base_url('index.php/Taskcontroller/done/').$r->id." '>Done</a>";
        echo "<a class='btn btn-warning me-2' href= ' ".base_url('index.php/Taskcontroller/editor/').$r->id." '>Edit</a>";
        echo "<a class='btn btn-danger me-2' href= ' ".base_url('index.php/Taskcontroller/delete/').$r->id." '>Delete</a>";
        echo "</td>";
}
?>
    </table>
    <?php } else {
        echo "<h3><center>No tasks in pending list</center></h3>";
    }
    ?>
    <br><br>
    <?php if(isset($recorddone) && !empty($recorddone)) {?>
    <table class="table px-5 mx-5 mt-5 shadow">
        <div class="h4 text-center">Tasks done</div>
        <tr class="table-white">
            <th>No</th>
            <th>Tasks</th>
            <th>Status</th>
            <th>action</th>
        </tr>
        <?php
        $j=1;
        foreach($recorddone as $s){
        echo "<tr>";
        echo "<td>".$j++."</td>";
        echo "<td>".$s->task_name."</td>";
        echo "<td>".$s->status."</td>";
        echo "<td>";
        echo "<a class='btn btn-success me-2' href= ' ".base_url('index.php/Taskcontroller/undone/').$s->id." '>Not completed</a>";
        echo "<a class='btn btn-warning me-2' href= ' ".base_url('index.php/Taskcontroller/editor/').$s->id." '>Edit</a>";
        echo "<a class='btn btn-danger me-2' href= ' ".base_url('index.php/Taskcontroller/delete/').$s->id." '>Delete</a>";
        echo "</td>";
}
?>
    </table>
    <?php } else {
        echo "<h3><center>No tasks in done list</center></h3>";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script>
    setTimeout(function() {
        document.getElementById('msg').style.display = 'none';
    }, 3000);
</script>
</body>
</html>