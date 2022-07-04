<?php
include '../dbconfig.php';

$NOPASIEN = htmlspecialchars($_REQUEST['NOPASIEN']);
$NAMAPASIEN = htmlspecialchars($_REQUEST['NAMAPASIEN']);
$TMPLAHIR = htmlspecialchars($_REQUEST['TMPLAHIR']);
$TGLLAHIR = htmlspecialchars($_REQUEST['TGLLAHIR']);
$ALMPASIEN = htmlspecialchars($_REQUEST['ALAMAT']);

$sql = "INSERT INTO PASIENS (NOPASIEN,NAMAPASIEN,TMPLAHIR,TGLLAHIR,ALAMAT)
 values('$NOPASIEN','$NAMAPASIEN', '$TMPLAHIR', '$TGLLAHIR','$ALMPASIEN')";
$stmt = sqlsrv_query( $conn, $sql);

    if ($stmt === false) {
        die( print_r(sqlsrv_errors(), true));
    }
    header('location:../masterpasien');
    sqlsrv_free_stmt( $stmt);
    sqlsrv_close( $conn);
?>

