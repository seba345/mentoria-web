<?php

// https://phpspreadsheet.readthedocs.io/en/latest/
// https://phpspreadsheet.readthedocs.io/en/latest/topics/accessing-cells/#setting-a-cell-value-by-column-and-row

require 'vendor/autoload.php';
require "util/conected.php";

$db =connectDB();



// Preparar la SELECT
$sql ="SELECT id, full_name, user_name, email
       FROM users";
// stament
$stmt = $db->prepare($sql);

$stmt->execute();


$users = $stmt -> fetchAll(PDO::FETCH_ASSOC);

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
foreach ($users as $key =>$user){
$acum = $key +1;
$sheet->setCellValue('A'.$acum, $user['id']);
$sheet->setCellValue('B1'.$acum, $user['full_name']);
$sheet->setCellValue('C1'.$acum, $user['user_name']);
$sheet->setCellValue('D1'.$acum, $user['email']);

}
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Usuarios.xlsx"');
$writer->save('php://output');

