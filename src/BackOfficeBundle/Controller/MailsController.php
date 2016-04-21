<?php

namespace BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MailsController extends Controller
{
    public function indexAction()
    {
    	$repository = $this
    					->getDoctrine()
    					->getManager()
    					->getRepository('FrontOfficeBundle:Message');
    	$listMessage=$repository->myFindAll();
        return $this->render('BackOfficeBundle:Default:blank-page.html.twig', array('Messages' => $listMessage));
    }
}
