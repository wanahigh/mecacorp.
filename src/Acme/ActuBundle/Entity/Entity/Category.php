<?php

namespace Acme\ActuBundle\Entity\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;


    /**
     * @var string|null
    /**
     * @ORM\OneToMany(targetEntity="Acme\ActuBundle\Entity\Entity\Advert", mappedBy="category")
     */

    private $advert;




    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function __construct()
    {
        $this->advert = new ArrayCollection();
    }

    /**
     * @return null|string
     */
    public function __toString() {
        return (string) $this->name; }

    /**
     * @param null|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
