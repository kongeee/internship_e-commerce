<?php
include_once("../server.php");
include_once("../admin_panel/sessionAdmin.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");
include_once("../benchmarks/benchmark.php");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer ADD</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/computer.css">
</head>
<body>
    
    <?php if(!$_POST){ ?>
    
    <div id="computer_add_form" style="margin-left: 40%;">
        <h2>Add a new computer</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Name</td> <td><input name="name" type="text"></td>
                </tr>
                <tr>
                    <td>CPU</td> <td>
                    <input name="cpu" list="cpu">
                    <datalist id="cpu" name="cpu">

                        <?php for($i=0; $i<count($cpu_array); $i++){ ?>
                            <option value="<?php echo $cpu_array[$i];?>">
                        <?php } ?>
                    </datalist></td>
                </tr>
                <tr>
                    <td>GPU</td> <td>
                    
                    <input name="gpu" list="gpu"> 
                    <datalist id="gpu" name="gpu">

                        <?php for($i=0; $i<count($gpu_array); $i++){ ?>
                            <option value="<?php echo $gpu_array[$i];?>">
                        <?php } ?>
                    </datalist></td>
                </tr>
                <tr>
                    <td>RAM</td> <td><input name="ram" type="text"></td>
                </tr>
                <tr>
                    <td>Storage</td> <td><input name="storage" type="text"></td>
                </tr>
                <tr>
                    <td>Price</td> <td><input name="price" type="text"></td>
                </tr>
                <tr>
                    <td>Discount</td> <td><input name="discount" type="text"></td>
                </tr>
                <tr>
                    <td>Type</td> <td><select name="type">
                        <option value="gaming">Gaming</option>
                        <option value="normal">Normal</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Description</td> <td><textarea name="description" cols="20" rows="20"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td> <td><input type="reset" value="Clear"></td>
                </tr>
                
            </table>
        </form>
    </div>
    <?php }else{

        $computer = new Computer();
        $computerService = new ComputerManager();
        $computerService->connectionWithDBorForm($computer, $_POST);
        echo $computerService->add($computer);
        header("Refresh: 2; url=../admin_panel/adminHomepage.php");

        
    } ?>

    
    
</body>
</html>