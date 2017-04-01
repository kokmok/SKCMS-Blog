<?php

namespace SKCMS\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * BlogTag
 *
 * @ORM\Table(name="blog_tag")
 * @ORM\Entity(repositoryClass="SKCMS\BlogBundle\Repository\BlogTagRepository")
 */
class BlogTag
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * @Gedmo\Slug(fields={"name"},updatable=false)
     * @ORM\Column(length=128)
     *
     */
    protected $slug;

    /**
     * @var BlogPost[]
     * @ORM\ManyToMany(targetEntity="SKCMS\BlogBundle\Entity\BlogPost",mappedBy="tags")
     */
    protected $posts;


    public function __toString()
    {
        return $this->name;
    }

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
     * Set name
     *
     * @param string $name
     * @return BlogTag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return BlogTag
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add posts
     *
     * @param \SKCMS\BlogBundle\Entity\BlogPost $posts
     * @return BlogTag
     */
    public function addPost(\SKCMS\BlogBundle\Entity\BlogPost $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \SKCMS\BlogBundle\Entity\BlogPost $posts
     */
    public function removePost(\SKCMS\BlogBundle\Entity\BlogPost $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
