<?php

namespace SC\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SC\GeneralBundle\Entity\SosRepository")
 */
class Sos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="structure", type="string", length=255)
     */
    private $structure;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;


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
     * Set structure
     *
     * @param string $structure
     * @return Sos
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return string 
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Sos
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
}
