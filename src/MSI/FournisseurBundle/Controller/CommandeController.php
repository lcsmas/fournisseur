<?php

namespace MSI\FournisseurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\DBAL\DriverManager;
use League\Csv\Reader;
use \PDO;

class CommandeController extends Controller
{
  public function viewAction($fst)
  {
    $em = $this->getDoctrine()->getManager();

    $sql = "SELECT * FROM info_commande_fournisseur WHERE FST = ?";

    $rsm = new ResultSetMappingBuilder($em);
    $rsm->addRootEntityFromClassMetadata('MSIFournisseurBundle:InfoCommandeFournisseur', 'c');

    $query = $em->createNativeQuery($sql, $rsm);
    $query->setParameter(1, $fst);

    $commandes = $query->getResult();


    return $this->render('MSIFournisseurBundle:Commande:view.html.twig', array(
      'commandes' => $commandes
    ));
  }

  public function editAction()
  {
    return $this->render('MSIFournisseurBundle:Commande:edit.html.twig', array(
      // ...
    ));
  }

  public function loadAction(){

    $em = $this->getDoctrine()->getManager();
    $repo = $em->getRepository('MSIFournisseurBundle:InfoCommandeFournisseur');
    $repo->loadCSV_to_DataBase();

    return $this->render('MSIFournisseurBundle:Commande:load.html.twig' ,array(
      'dir' => $_SERVER['DOCUMENT_ROOT'],
    ));
  }

}
