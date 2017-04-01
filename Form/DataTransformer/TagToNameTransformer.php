<?php

namespace SKCMS\BlogBundle\Form\DataTransformer;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Created by jona on 2/05/16
 */
class TagToNameTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Transforms an object (issue) to a string (number).
     *
     * @param  null $tags(array)
     * @return string
     */
    public function transform($tags)
    {
        if (null === $tags) {
            return '';
        }

        $tagsNames = [];
        foreach ($tags as $tag){
            $tagsNames[] = $tag->getName();
        }

        return implode(',',$tagsNames);
    }

    /**
     * Transforms a string (number) to an object (blogTag).
     *
     * @param  string $issueNumber
     * @return \SKCMS\BlogBundle\Entity\BlogTag|null
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($tagNames)
    {
        if (!$tagNames) {
            return;
        }

        $tagNameArray = explode(',',$tagNames);
        $tags = [];
        $tagRepo = $this->manager->getRepository('SKCMSBlogBundle:BlogTag');
        foreach($tagNameArray as $tagName){
            $tag = $tagRepo->findOneByName($tagName);
            if (null === $tag){
                $tag =new \SKCMS\BlogBundle\Entity\BlogTag();
                $tag->setName($tagName);
            }
            $tags[]=$tag;
        }



        ;

        return $tags;
    }
}