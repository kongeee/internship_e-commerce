<?php
include_once("../server.php");
include_once("../admin_panel/sessionAdmin.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");
include_once("../benchmarks/benchmark.php");

$computerService = new ComputerManager();
echo $computerService->delete($_GET['id']);

?>