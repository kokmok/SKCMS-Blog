<?php
namespace SKCMS\BlogBundle\Event;
use Doctrine\ORM\Event\LifecycleEventArgs;
use SKCMS\BlogBundle\Entity\BlogPost;

/**
 * Created by jona on 31/05/16
 */
class BlogPostDoctrineListener
{

    public function preRemove(LifecycleEventArgs $args){

        $em = $args->getEntityManager();
        $entity = $args->getEntity();
        if ($entity instanceof BlogPost){
            $uow = $em->getUnitOfWork();
            foreach ($entity->getTags() as $tag){
                if(count($tag->getPosts()) === 1){
                    $uow->scheduleForDelete($tag);
                }
            }    
        }
        

//        die();
//        $tagsRepo = $em->getRepository('SKCMSBlogBundle:BlogTag');
//
//        $unusedTags = $tagsRepo->findBy(['posts'=>null]);
//        dump($unusedTags);
//        die();
    }

}