<?php

namespace SKCMS\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SKCMSBlogBundle:Default:index.html.twig');
    }
}
