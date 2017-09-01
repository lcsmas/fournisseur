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



    /**
     * Set no
     *
     * @param string $no
     *
     * @return InfoCommandeFournisseur
     */
    public function setNo($no)
    {
        $this->no = $no;

        return $this;
    }

    /**
     * Get no
     *
     * @return string
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * Set fst
     *
     * @param string $fst
     *
     * @return InfoCommandeFournisseur
     */
    public function setFst($fst)
    {
        $this->fst = $fst;

        return $this;
    }

    /**
     * Get fst
     *
     * @return string
     */
    public function getFst()
    {
        return $this->fst;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return InfoCommandeFournisseur
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return InfoCommandeFournisseur
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set totCmde
     *
     * @param integer $totCmde
     *
     * @return InfoCommandeFournisseur
     */
    public function setTotCmde($totCmde)
    {
        $this->totCmde = $totCmde;

        return $this;
    }

    /**
     * Get totCmde
     *
     * @return integer
     */
    public function getTotCmde()
    {
        return $this->totCmde;
    }

    /**
     * Set qteRestante
     *
     * @param integer $qteRestante
     *
     * @return InfoCommandeFournisseur
     */
    public function setQteRestante($qteRestante)
    {
        $this->qteRestante = $qteRestante;

        return $this;
    }

    /**
     * Get qteRestante
     *
     * @return integer
     */
    public function getQteRestante()
    {
        return $this->qteRestante;
    }

    /**
     * Set dateLiv
     *
     * @param \DateTime $dateLiv
     *
     * @return InfoCommandeFournisseur
     */
    public function setDateLiv($dateLiv)
    {
        $this->dateLiv = $dateLiv;

        return $this;
    }

    /**
     * Get dateLiv
     *
     * @return \DateTime
     */
    public function getDateLiv()
    {
        return $this->dateLiv;
    }

    /**
     * Set mntHt
     *
     * @param string $mntHt
     *
     * @return InfoCommandeFournisseur
     */
    public function setMntHt($mntHt)
    {
        $this->mntHt = $mntHt;

        return $this;
    }

    /**
     * Get mntHt
     *
     * @return string
     */
    public function getMntHt()
    {
        return $this->mntHt;
    }

    /**
     * Set mntTotalHt
     *
     * @param string $mntTotalHt
     *
     * @return InfoCommandeFournisseur
     */
    public function setMntTotalHt($mntTotalHt)
    {
        $this->mntTotalHt = $mntTotalHt;

        return $this;
    }

    /**
     * Get mntTotalHt
     *
     * @return string
     */
    public function getMntTotalHt()
    {
        return $this->mntTotalHt;
    }

    /**
     * Set mntDu
     *
     * @param string $mntDu
     *
     * @return InfoCommandeFournisseur
     */
    public function setMntDu($mntDu)
    {
        $this->mntDu = $mntDu;

        return $this;
    }

    /**
     * Get mntDu
     *
     * @return string
     */
    public function getMntDu()
    {
        return $this->mntDu;
    }

    /**
     * Set flag
     *
     * @param boolean $flag
     *
     * @return InfoCommandeFournisseur
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return boolean
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set cmde
     *
     * @param string $cmde
     *
     * @return InfoCommandeFournisseur
     */
    public function setCmde($cmde)
    {
        $this->cmde = $cmde;

        return $this;
    }

    /**
     * Get cmde
     *
     * @return string
     */
    public function getCmde()
    {
        return $this->cmde;
    }

    /**
     * Set cmdeLigne
     *
     * @param integer $cmdeLigne
     *
     * @return InfoCommandeFournisseur
     */
    public function setCmdeLigne($cmdeLigne)
    {
        $this->cmdeLigne = $cmdeLigne;

        return $this;
    }

    /**
     * Get cmdeLigne
     *
     * @return integer
     */
    public function getCmdeLigne()
    {
        return $this->cmdeLigne;
    }
}
