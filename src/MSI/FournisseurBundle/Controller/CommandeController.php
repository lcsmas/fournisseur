<?php

namespace MSI\FournisseurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\DBAL\DriverManager;
use \PDO;
use MSI\FournisseurBundle\Tools\CSVManager;
use MSI\FournisseurBundle\Entity\InfoCommandeFournisseur;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


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

  public function editAction($cmde, $cmdeLigne, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    // On crée un objet InfoCommandeFournisseur
    $infoCommandeFournisseur = new InfoCommandeFournisseur();

    $sql = "SELECT cmde, cmde_ligne, date_liv FROM info_commande_fournisseur WHERE cmde = ? and cmde_ligne = ?";

    $rsm = new ResultSetMappingBuilder($em);
    $rsm->addRootEntityFromClassMetadata('MSIFournisseurBundle:InfoCommandeFournisseur', 'c');

    $query = $em->createNativeQuery($sql, $rsm);
    $query->setParameter(1, $cmde);
    $query->setParameter(2, $cmdeLigne);

    // $infoCommandeFournisseur->setCmde($query->getResult().$cmde);
    // $infoCommandeFournisseur->setCmdeLigne($query);
    dump($query->getResult());


    // $repository = $this->getDoctrine()
    // ->getRepository(InfoCommandeFournisseur::class);
    //
    // // createQueryBuilder() automatically selects FROM AppBundle:Product
    // // and aliases it to "p"
    // $query = $repository->createQueryBuilder('c')
    // ->where('c.cmde = :cmde')
    // ->where('c.cmdeLigne = :cmde_ligne')
    // ->setParameter('cmde', $cmde)
    // ->setParameter('cmde_ligne', $cmdeLigne)
    // ->getQuery();
    //
    // $infoCommandeFournisseur  = $query->getResult();
    // On crée le FormBuilder grâce au service form factory
    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $infoCommandeFournisseur);

    // On ajoute les champs de l'entité que l'on veut à notre formulaire
    $formBuilder
    ->add('cmde',  TextType::class, array( 'label' => 'Commande', 'attr' => array('readonly' => 'readonly') ))
    ->add('cmde_ligne',     TextType::class, array('label' => 'Ligne', 'attr' => array('readonly' => 'readonly') ))
    ->add('dateLiv',   DateType::class, array('label' => 'Date de Livraison'))
    ->add('save',      SubmitType::class, array( 'label' => 'Sauvegarder modif'))
    ;

    // À partir du formBuilder, on génère le formulaire
    $form = $formBuilder->getForm();

    // Si la requête est en POST
    if ($request->isMethod('POST')) {
      // On fait le lien Requête <-> Formulaire
      // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);

      // On vérifie que les valeurs entrées sont correctes
      // (Nous verrons la validation des objets en détail dans le prochain chapitre)
      if ($form->isValid()) {
        // On enregistre notre objet $advert dans la base de données, par exemple
        $em = $this->getDoctrine()->getManager();
        $em->persist($infoCommandeFournisseur);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Date de livraison bien enregistrée.');

        // On redirige vers la page de visualisation de l'annonce nouvellement créée
        return $this->redirectToRoute('view', array('fst' => $infoCommandeFournisseur->getFst()));
      }
    }

    // À ce stade, le formulaire n'est pas valide car :
    // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
    // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau


    // On passe la méthode createView() du formulaire à la vue
    // afin qu'elle puisse afficher le formulaire toute seule
    return $this->render('MSIFournisseurBundle:Commande:edit.html.twig', array(
      'form' => $form->createView(),
    ));

  }

  public function loadAction(){

    $csv = new CSVManager();
    $csv->loadCSV_to_DataBase();

    return $this->render('MSIFournisseurBundle:Commande:load.html.twig' ,array(
      'dir' => $_SERVER['DOCUMENT_ROOT'],
    ));
  }

}
