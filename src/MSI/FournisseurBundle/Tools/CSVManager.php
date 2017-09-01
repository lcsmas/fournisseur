<?php

namespace MSI\FournisseurBundle\Tools;

use League\Csv\Reader;
use Doctrine\DBAL\DriverManager;
use \PDO;

class CSVManager
{

  public function loadCSV_to_DataBase(){
    $sql = "INSERT INTO info_commande_fournisseur (No_,FST,CMDE,CMDE_LIGNE,REFERENCE,DESIGNATION,TOT_CMDE,Qte_restante,Date_liv,MNT_HT,MNT_TOTAL_HT,MNT_DU)
    VALUES (:No_, :FST, :CMDE, :CMDE_LIGNE, :REFERENCE, :DESIGNATION, :TOT_CMDE, :Qte_restante, :Date_liv, :MNT_HT, :MNT_TOTAL_HT, :MNT_DU)";


    $csv = Reader::createFromPath($_SERVER['DOCUMENT_ROOT'].'/fournisseur/nav.csv')
    ->setDelimiter(';')
    ->setEnclosure(" ")
    ->setOffset(1)
    ;

    $connectionParams = array(
      'dbname' => 'ftpmsicp',
      'user' => 'root',
      'password' => '',
      'host' => 'localhost',
      'driver' => 'pdo_mysql'
    );
    $conn = DriverManager::getConnection($connectionParams);
    $stmt = $conn->prepare($sql);


    $nbInsert = $csv->each(function ($row) use (&$stmt) {
      $stmt->bindValue(':No_', $row[0], PDO::PARAM_STR);
      $stmt->bindValue(':FST', $row[1], PDO::PARAM_STR);
      $stmt->bindValue(':CMDE', $row[2], PDO::PARAM_STR);
      $stmt->bindValue(':CMDE_LIGNE', $row[3], PDO::PARAM_INT);
      $stmt->bindValue(':REFERENCE', $row[4], PDO::PARAM_STR);
      $stmt->bindValue(':DESIGNATION', $row[5], PDO::PARAM_STR);
      $stmt->bindValue(':TOT_CMDE', $row[6], PDO::PARAM_INT);
      $stmt->bindValue(':Qte_restante', $row[7], PDO::PARAM_INT);
      if ($row[8] == '') {
        $stmt->bindValue(':Date_liv',null, PDO::PARAM_STR);
      } else {
        $date = date_create_from_format('d/m/Y', substr($row[8], 0, 10));
        $stmt->bindValue(':Date_liv', date_format($date,'Y-m-d'), PDO::PARAM_STR);
      }
      $stmt->bindValue(':MNT_HT', $row[9], PDO::PARAM_STR);
      $stmt->bindValue(':MNT_TOTAL_HT', $row[10], PDO::PARAM_STR);
      $stmt->bindValue(':MNT_DU', $row[11], PDO::PARAM_STR);

      return $stmt->execute(); //if the function return false then the iteration will stop
    });

    return 1;
  }
}
