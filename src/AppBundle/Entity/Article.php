<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Category;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\ExclusionPolicy("all")
 * @ORM\Table(name="article")
 * @ORM\Entity()
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @JMS\Expose
     * @JMS\Groups({"articleList", "details"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250, nullable=false)
     *
     * @JMS\Expose
     * @JMS\Groups({"articleList", "details"})
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", nullable=false)
     *
     * @JMS\Expose
     * @JMS\Groups({"details"})
     */
    protected $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_read", type="integer", nullable=false)
     *
     * @JMS\Expose
     * @JMS\Groups({"articleList", "details"})
     */
    protected $isRead=0;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="published_at", type="datetime", nullable=false)
     *
     * @JMS\Expose
     * @JMS\Groups({"articleList", "details"})
     */
    protected $publishedAt;
    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", nullable=false)
     *
     * @JMS\Expose
     * @JMS\Groups({"details"})
     */
    protected $tags;

    /**
     * @var \Obtao\BlogBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="articles")
     */
    protected $category;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string
     * @return Article
     */
    public function setIsRead($isRead)
    {
        $this->title = $isRead;

        return $this;
    }

    /**
     * @param string
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function isRead()
    {
        return $this->isRead;
    }

    /**
     * @return Article
     */
    public function markAsRead()
    {
        $this->isRead = true;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTime
     * @return Article
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array
     * @return Article
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param AppBundle\Entity\Category
     * @return Article
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
}
