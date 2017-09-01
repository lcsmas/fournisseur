<?php

namespace MSI\FournisseurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoCommandeFournisseur
 *
 * @ORM\Table(name="info_commande_fournisseur")
 * @ORM\Entity(repositoryClass="MSI\FournisseurBundle\Repository\InfoCommandeFournisseurRepository")
 */
class InfoCommandeFournisseur
{
    /**
     * @var string
     *
     * @ORM\Column(name="No_", type="string", length=255, nullable=false)
     */
    private $no;

    /**
     * @var string
     *
     * @ORM\Column(name="FST", type="string", length=255, nullable=false)
     */
    private $fst;

    /**
     * @var string
     *
     * @ORM\Column(name="REFERENCE", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="DESIGNATION", type="string", length=255, nullable=false)
     */
    private $designation;

    /**
     * @var integer
     *
     * @ORM\Column(name="TOT_CMDE", type="integer", nullable=false)
     */
    private $totCmde;

    /**
     * @var integer
     *
     * @ORM\Column(name="Qte_restante", type="integer", nullable=false)
     */
    private $qteRestante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_liv", type="date", nullable=true)
     */
    private $dateLiv;

    /**
     * @var string
     *
     * @ORM\Column(name="MNT_HT", type="string", length=255, nullable=false)
     */
    private $mntHt;

    /**
     * @var string
     *
     * @ORM\Column(name="MNT_TOTAL_HT", type="string", length=255, nullable=false)
     */
    private $mntTotalHt;

    /**
     * @var string
     *
     * @ORM\Column(name="MNT_DU", type="string", length=255, nullable=false)
     */
    private $mntDu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag", type="boolean", nullable=false)
     */
    private $flag = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CMDE", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cmde;

    /**
     * @var integer
     *
     * @ORM\Column(name="CMDE_LIGNE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cmdeLigne;


}
