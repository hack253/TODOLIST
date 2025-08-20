<?php
$host='localhost';
$name='root';
$pass='';
$db='todo';
$conn=mysqli_connect($host,$name,$pass,$db);
//button add task in php
if(isset($_POST['add'])){
    $task=$_POST['task'];
    mysqli_query($conn,"INSERT INTO task(task) VALUES('$task')");
    header("location: index.php");
    //show task in table
  
}
if(isset($_GET['del_task'])){
    $del=$_GET['del_task'];
    mysqli_query($conn,"DELETE FROM task WHERE id=$del");
}
  $tasks = mysqli_query($conn,"SELECT * FROM task");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة المهام</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
    <form action="index.php" method="post">
        <h1>قائمة المهام اليومية</h1>
         <button type="submit" name='add'>إضافة مهمة</button>
        <input type="text" name="task" required placeholder="اكتب مهامك اليوم">
        <label>ماهي المهمة التي تريد تسجيلها؟</label>
    </form>
   
<table>
    <thead>
        <tr>
            <th>الرقم</th>
            <th>المهمة</th>
            <th>الحدث</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_array($tasks)) 
        {
             ?>
        <tr>
            <td>
                <?php
                 echo $row['id'];
                 ?>
                 </td>
            <td class='task'tabindex="0"><?php 
            echo $row['task'];
            ?>
            </td>
            <td class="delete"><a href="index.php?del_task=<?php echo $row['id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</center>
<footer>devopler by AmroMohammed,AminHUssien,Alnoor Babiker</footer>
</body>
</html>