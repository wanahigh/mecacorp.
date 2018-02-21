<?php
//TODO Ameliorer design actor show index ou retour version array verticale + pagination
namespace Acme\ActorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Driver\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Actors
 *
 * @ORM\Table(name="Actors")
 * @ORM\Entity
 */

class Actors
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nomdudirigeant", type="string", length=70, nullable=false)
     */
    private $nomdudirigeant;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=67, nullable=false)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel", type="string", length=31, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=51, nullable=false)
     */
    private $mail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Siteweb", type="string", length=43, nullable=true)
     */
    private $siteweb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Facebook", type="string", length=34, nullable=true)
     */
    private $facebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Linkedin", type="string", length=13, nullable=true)
     */
    private $linkedin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Twitter", type="string", length=15, nullable=true)
     */
    private $twitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Instagram", type="string", length=20, nullable=true)
     */
    private $instagram;

    /**
     * @var string
     *
     * @ORM\Column(name="Secteur", type="string", length=139, nullable=false)
     */
    private $secteur;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=1406, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Competences", type="string", length=737, nullable=true)
     */
    private $competences;

    /**
     * @var string
     *
     * @ORM\Column(name="Raisonsocial", type="string", length=60, nullable=false)
     */
    private $raisonsocial;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Ajouter une image jpg")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Categorie", type="string", length=28, nullable=false)
     */
    private $categorie;



    /**
     * @ORM\ManyToOne(targetEntity="Acme\ActorBundle\Entity\ActorsCategory", inversedBy="actors")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nomdudirigeant.
     *
     * @param string $nomdudirigeant
     *
     * @return Actors
     */
    public function setNomdudirigeant($nomdudirigeant)
    {
        $this->nomdudirigeant = $nomdudirigeant;
    
        return $this;
    }

    /**
     * Get nomdudirigeant.
     *
     * @return string
     */
    public function getNomdudirigeant()
    {
        return $this->nomdudirigeant;
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return Actors
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse.
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set tel.
     *
     * @param string|null $tel
     *
     * @return Actors
     */
    public function setTel($tel = null)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel.
     *
     * @return string|null
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail.
     *
     * @param string $mail
     *
     * @return Actors
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail.
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set siteweb.
     *
     * @param string|null $siteweb
     *
     * @return Actors
     */
    public function setSiteweb($siteweb = null)
    {
        $this->siteweb = $siteweb;
    
        return $this;
    }

    /**
     * Get siteweb.
     *
     * @return string|null
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set facebook.
     *
     * @param string|null $facebook
     *
     * @return Actors
     */
    public function setFacebook($facebook = null)
    {
        $this->facebook = $facebook;
    
        return $this;
    }

    /**
     * Get facebook.
     *
     * @return string|null
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set linkedin.
     *
     * @param string|null $linkedin
     *
     * @return Actors
     */
    public function setLinkedin($linkedin = null)
    {
        $this->linkedin = $linkedin;
    
        return $this;
    }

    /**
     * Get linkedin.
     *
     * @return string|null
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set twitter.
     *
     * @param string|null $twitter
     *
     * @return Actors
     */
    public function setTwitter($twitter = null)
    {
        $this->twitter = $twitter;
    
        return $this;
    }

    /**
     * Get twitter.
     *
     * @return string|null
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set instagram.
     *
     * @param string|null $instagram
     *
     * @return Actors
     */
    public function setInstagram($instagram = null)
    {
        $this->instagram = $instagram;
    
        return $this;
    }

    /**
     * Get instagram.
     *
     * @return string|null
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Set secteur.
     *
     * @param string $secteur
     *
     * @return Actors
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
    
        return $this;
    }

    /**
     * Get secteur.
     *
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Actors
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set competences.
     *
     * @param string|null $competences
     *
     * @return Actors
     */
    public function setCompetences($competences = null)
    {
        $this->competences = $competences;
    
        return $this;
    }

    /**
     * Get competences.
     *
     * @return string|null
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * Set raisonsocial.
     *
     * @param string $raisonsocial
     *
     * @return Actors
     */
    public function setRaisonsocial($raisonsocial)
    {
        $this->raisonsocial = $raisonsocial;
    
        return $this;
    }

    /**
     * Get raisonsocial.
     *
     * @return string
     */
    public function getRaisonsocial()
    {
        return $this->raisonsocial;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return Actors
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return File|null
     */
    public function getImage()
    {
        return $this->image;
    }




    /**
     * Set categorie.
     *
     * @param string $categorie
     *
     * @return Actors
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie.
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }


    /**
     * @return string
     */
    public function __toString() {
        return (string) $this->image; }
}
