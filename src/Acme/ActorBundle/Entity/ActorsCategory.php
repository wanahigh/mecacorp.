<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 18/02/18
 * Time: 17:46
 */

namespace Acme\ActorBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="ActorsCategory")
 * @ORM\Entity
 */
class ActorsCategory



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
     * @ORM\OneToMany(targetEntity="Acme\ActorBundle\Entity\Actors", mappedBy="category")
     */

    private $actors;




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

    /**
     * @return null|string
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param null|string $actors
     */
    public function setActors($actors)
    {
        $this->actors = $actors;
    }
}
