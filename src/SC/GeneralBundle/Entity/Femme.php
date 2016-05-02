<?php

namespace SC\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Femme
 *
 * @ORM\Table(name="femme")
 * @ORM\Entity
 */
class Femme
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
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=45, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=245, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays", type="string", length=45, nullable=true)
     */
    private $pays;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone_mari", type="integer", nullable=true)
     */
    private $telephonemari;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreEnfants", type="integer", nullable=true)
     */
    private $nombreenfants;

    /**
     * @var integer
     *
     * @ORM\Column(name="etatGrossesse", type="integer", nullable=true)
     */
    private $etatgrossesse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;


    /**
     * @ORM\OneToMany(targetEntity="Examen", mappedBy="femme")
     */
    protected $examens;

    /**
     * @ORM\ManyToOne(targetEntity="SC\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;



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
     * Set prenom
     *
     * @param string $prenom
     * @return Femme
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Femme
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Femme
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Femme
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Femme
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Femme
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Femme
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Femme
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set nombreenfants
     *
     * @param integer $nombreenfants
     * @return Femme
     */
    public function setNombreenfants($nombreenfants)
    {
        $this->nombreenfants = $nombreenfants;

        return $this;
    }

    /**
     * Get nombreenfants
     *
     * @return integer 
     */
    public function getNombreenfants()
    {
        return $this->nombreenfants;
    }

    /**
     * Set etatgrossesse
     *
     * @param integer $etatgrossesse
     * @return Femme
     */
    public function setEtatgrossesse($etatgrossesse)
    {
        $this->etatgrossesse = $etatgrossesse;

        return $this;
    }

    /**
     * Get etatgrossesse
     *
     * @return integer 
     */
    public function getEtatgrossesse()
    {
        return $this->etatgrossesse;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Femme
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->examens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add examens
     *
     * @param \SC\GeneralBundle\Entity\Examen $examens
     * @return Femme
     */
    public function addExamen(\SC\GeneralBundle\Entity\Examen $examens)
    {
        $this->examens[] = $examens;

        return $this;
    }

    /**
     * Remove examens
     *
     * @param \SC\GeneralBundle\Entity\Examen $examens
     */
    public function removeExamen(\SC\GeneralBundle\Entity\Examen $examens)
    {
        $this->examens->removeElement($examens);
    }

    /**
     * Get examens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamens()
    {
        return $this->examens;
    }

    /**
     * Set user
     *
     * @param \SC\UserBundle\Entity\User $user
     * @return Femme
     */
    public function setUser(\SC\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SC\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set telephonemari
     *
     * @param integer $telephonemari
     * @return Femme
     */
    public function setTelephonemari($telephonemari)
    {
        $this->telephonemari = $telephonemari;

        return $this;
    }

    /**
     * Get telephonemari
     *
     * @return integer 
     */
    public function getTelephonemari()
    {
        return $this->telephonemari;
    }
}
