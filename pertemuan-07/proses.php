<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$SESSION["sesnama"] = $sesnama;
$SESSION["sesemail"] = $sesemail;
$SESSION["sespesan"] = $sespesan;
?>