<?php
if ($_SESSION['Level'] !== 'Pharmacist'){
    header ("location: ./pharmacist/dashboard_pharmacist.php");
    exit();
  }
?>