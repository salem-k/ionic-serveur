<?php

namespace AppBundle\Entity;

use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;


/**
 * @JMS\ExclusionPolicy("all")
 * @ORM\Table(name="category")
 * @ORM\Entity()
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @JMS\Expose
     * @JMS\Groups({"list", "details"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     *
     * @JMS\Expose
     * @JMS\Groups({"list", "details"})
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"details"})
     */
    protected $description;

    /**
     * @var Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Article", mappedBy="category")
     *
     * @JMS\Expose
     * @JMS\Groups({"articleList"})
     */
    protected $articles;

    public function __construct() {}

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Article[]
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @return Article[]
     */
    public function getUnreadArticles()
    {
        $unreadArticles = array();

        foreach ($this->articles as $article) {
            if (! $article->isRead()) {
                $unreadArticles[] = $article;
            }
        }

        return $unreadArticles;
    }

    /**
     * @param Article[]
     *
     * @return Category
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * @return integer
     *
     * @JMS\VirtualProperty
     * @JMS\Groups({"list"})
     */
    public function getUnreadArticleCount()
    {
        return count($this->getUnreadArticles());
    }
    public function __toString()
  {
      return $this->getName();
  }
}
