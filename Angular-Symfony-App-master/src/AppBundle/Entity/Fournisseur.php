<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FournisseurRepository")
 */
class Fournisseur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_fournisseur", type="string", length=255)
     */
    private $nomFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_fournisseur", type="string", length=255)
     */
    private $adresseFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel_fournisseur", type="string", length=255)
     */
    private $numTelFournisseur;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Produit",mappedBy="fournisseur")
     */
    private $produit;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomFournisseur
     *
     * @param string $nomFournisseur
     *
     * @return Fournisseur
     */
    public function setNomFournisseur($nomFournisseur)
    {
        $this->nomFournisseur = $nomFournisseur;

        return $this;
    }

    /**
     * Get nomFournisseur
     *
     * @return string
     */
    public function getNomFournisseur()
    {
        return $this->nomFournisseur;
    }

    /**
     * Set adresseFournisseur
     *
     * @param string $adresseFournisseur
     *
     * @return Fournisseur
     */
    public function setAdresseFournisseur($adresseFournisseur)
    {
        $this->adresseFournisseur = $adresseFournisseur;

        return $this;
    }

    /**
     * Get adresseFournisseur
     *
     * @return string
     */
    public function getAdresseFournisseur()
    {
        return $this->adresseFournisseur;
    }

    /**
     * Set numTelFournisseur
     *
     * @param string $numTelFournisseur
     *
     * @return Fournisseur
     */
    public function setNumTelFournisseur($numTelFournisseur)
    {
        $this->numTelFournisseur = $numTelFournisseur;

        return $this;
    }

    /**
     * Get numTelFournisseur
     *
     * @return string
     */
    public function getNumTelFournisseur()
    {
        return $this->numTelFournisseur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Fournisseur
     */
    public function addProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produit[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AppBundle\Entity\Produit $produit
     */
    public function removeProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produit->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
