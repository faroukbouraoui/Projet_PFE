<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partenaire
 *
 * @ORM\Table(name="partenaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartenaireRepository")
 */
class Partenaire
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
     * @ORM\Column(name="nom_partenaire", type="string", length=255)
     */
    private $nomPartenaire;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="description_partenaire", type="text")
     */
    private $descriptionPartenaire;


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
     * Set nomPartenaire
     *
     * @param string $nomPartenaire
     *
     * @return Partenaire
     */
    public function setNomPartenaire($nomPartenaire)
    {
        $this->nomPartenaire = $nomPartenaire;

        return $this;
    }

    /**
     * Get nomPartenaire
     *
     * @return string
     */
    public function getNomPartenaire()
    {
        return $this->nomPartenaire;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Partenaire
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set descriptionPartenaire
     *
     * @param string $descriptionPartenaire
     *
     * @return Partenaire
     */
    public function setDescriptionPartenaire($descriptionPartenaire)
    {
        $this->descriptionPartenaire = $descriptionPartenaire;

        return $this;
    }

    /**
     * Get descriptionPartenaire
     *
     * @return string
     */
    public function getDescriptionPartenaire()
    {
        return $this->descriptionPartenaire;
    }
}
