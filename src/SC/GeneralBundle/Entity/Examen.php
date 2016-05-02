<?php

namespace SC\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examen
 *
 * @ORM\Table(name="examen", indexes={@ORM\Index(name="fk_Examen_femme_idx", columns={"femme_id"})})
 * @ORM\Entity
 */
class Examen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="taille", type="float", precision=10, scale=0, nullable=true)
     */
    private $taille;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float", precision=10, scale=0, nullable=true)
     */
    private $poids;

    /**
     * @var float
     *
     * @ORM\Column(name="albumine", type="float", precision=10, scale=0, nullable=true)
     */
    private $albumine;

    /**
     * @var float
     *
     * @ORM\Column(name="sucre", type="float", precision=10, scale=0, nullable=true)
     */
    private $sucre;

    /**
     * @var float
     *
     * @ORM\Column(name="pressionArterielle", type="float", precision=10, scale=0, nullable=true)
     */
    private $pressionarterielle;

    /**
     * @var float
     *
     * @ORM\Column(name="hauteurUterine", type="float", precision=10, scale=0, nullable=true)
     */
    private $hauteuruterine;

    /**
     * @var float
     *
     * @ORM\Column(name="tauxHemoglobine", type="float", precision=10, scale=0, nullable=true)
     */
    private $tauxhemoglobine;

    /**
     * @var string
     *
     * @ORM\Column(name="observations", type="text", nullable=true)
     */
    private $observations;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rendezvous", type="datetime", nullable=true)
     */
    private $rendezvous;

    /**
     * @ORM\ManyToOne(targetEntity="Femme", inversedBy="examens")
     * @ORM\JoinColumn(name="femme_id", referencedColumnName="id")
     */
    private $femme;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set taille
     *
     * @param float $taille
     * @return Examen
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return float 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set poids
     *
     * @param float $poids
     * @return Examen
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set albumine
     *
     * @param float $albumine
     * @return Examen
     */
    public function setAlbumine($albumine)
    {
        $this->albumine = $albumine;

        return $this;
    }

    /**
     * Get albumine
     *
     * @return float 
     */
    public function getAlbumine()
    {
        return $this->albumine;
    }

    /**
     * Set sucre
     *
     * @param float $sucre
     * @return Examen
     */
    public function setSucre($sucre)
    {
        $this->sucre = $sucre;

        return $this;
    }

    /**
     * Get sucre
     *
     * @return float 
     */
    public function getSucre()
    {
        return $this->sucre;
    }

    /**
     * Set pressionarterielle
     *
     * @param float $pressionarterielle
     * @return Examen
     */
    public function setPressionarterielle($pressionarterielle)
    {
        $this->pressionarterielle = $pressionarterielle;

        return $this;
    }

    /**
     * Get pressionarterielle
     *
     * @return float 
     */
    public function getPressionarterielle()
    {
        return $this->pressionarterielle;
    }

    /**
     * Set hauteuruterine
     *
     * @param float $hauteuruterine
     * @return Examen
     */
    public function setHauteuruterine($hauteuruterine)
    {
        $this->hauteuruterine = $hauteuruterine;

        return $this;
    }

    /**
     * Get hauteuruterine
     *
     * @return float 
     */
    public function getHauteuruterine()
    {
        return $this->hauteuruterine;
    }

    /**
     * Set tauxhemoglobine
     *
     * @param float $tauxhemoglobine
     * @return Examen
     */
    public function setTauxhemoglobine($tauxhemoglobine)
    {
        $this->tauxhemoglobine = $tauxhemoglobine;

        return $this;
    }

    /**
     * Get tauxhemoglobine
     *
     * @return float 
     */
    public function getTauxhemoglobine()
    {
        return $this->tauxhemoglobine;
    }

    /**
     * Set observations
     *
     * @param string $observations
     * @return Examen
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string 
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set rendezvous
     *
     * @param \DateTime $rendezvous
     * @return Examen
     */
    public function setRendezvous($rendezvous)
    {
        $this->rendezvous = $rendezvous;

        return $this;
    }

    /**
     * Get rendezvous
     *
     * @return \DateTime 
     */
    public function getRendezvous()
    {
        return $this->rendezvous;
    }

    /**
     * Set femme
     *
     * @param \SC\GeneralBundle\Entity\Femme $femme
     * @return Examen
     */
    public function setFemme(\SC\GeneralBundle\Entity\Femme $femme = null)
    {
        $this->femme = $femme;

        return $this;
    }

    /**
     * Get femme
     *
     * @return \SC\GeneralBundle\Entity\Femme 
     */
    public function getFemme()
    {
        return $this->femme;
    }
}
