<?php

include_once("../server.php");
include_once("../admin_panel/sessionAdmin.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");
include_once("../benchmarks/benchmark.php");


$id = $_GET['id'];

$sql = "SELECT * FROM computer C WHERE C.computer_id = '$id'";
$result = $DBconn->query($sql);
$row = mysqli_fetch_assoc($result);

$computer = new Computer();
$computerService = new ComputerManager();


$computerService->connectionWithDBorForm($computer, $row);



if(!$_POST){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer EDIT</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/computer.css">
</head>
<body>

    <div id="computer_add_form" style="margin-left: 40%;">
        <h2>Edit computer</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Name</td> <td><textarea name="name" cols="20" rows="1"><?php echo $row['name'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Stock</td> <td><textarea name="stock" cols="20" rows="1"><?php echo $row['stock'] ?></textarea></td>
                </tr>
                <tr>
                    <td>CPU</td> <td>
                    <input name="cpu" list="cpu" value="<?php echo $row['cpu']."|".$row['cpu_bench']; ?>">
                    
                    <datalist id="cpu" name="cpu">

                        <?php for($i=0; $i<count($cpu_array); $i++){ ?>
                            <option value="<?php echo $cpu_array[$i];?>">
                        <?php } ?>
                    </datalist></td>
                </tr>
                <tr>
                    <td>GPU</td> <td>
                    <input name="gpu" list="gpu" value="<?php echo $row['gpu']."|".$row['gpu_bench']; ?>">
                    <datalist id="gpu" name="gpu">

                        <?php for($i=0; $i<count($gpu_array); $i++){ ?>
                            <option value="<?php echo $gpu_array[$i];?>">
                        <?php } ?>
                    </datalist></td>
                </tr>
                <tr>
                    <td>RAM</td> <td><textarea name="ram" cols="20" rows="1"><?php echo $row['ram']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Storage</td> <td><textarea name="storage" cols="20" rows="1"><?php echo $row['storage']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Price</td> <td><textarea name="price" cols="20" rows="1"><?php echo $row['price']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Discount</td> <td><textarea name="discount" cols="20" rows="1"><?php echo $row['discount']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Type</td> <td><select name="type">
                        <option value="gaming">Gaming</option>
                        <option value="normal">Normal</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Description</td><td><textarea name="description" cols="20" rows="20"><?php echo $row['description']; ?></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Edit it"></td> <td>Delete it <a href="./computer_delete.php?id=<?php echo $id ?>"><img src="../images/icons/remove.png" alt="" height="20px" width="20px"></a></td>
                </tr>
                
            </table>
        </form>
    
        </body>
</html>
<?php }else{
    
    echo $computerService->edit($computer, $id, $_POST['name'], $_POST['stock'] , $_POST['cpu'], $_POST['gpu'], $_POST['ram'], $_POST['storage'], $_POST['price'], $_POST['discount'], $_POST['type'], $_POST['description']);

    header("Refresh: 2; url=../admin_panel/adminHomepage.php");
    

}?>