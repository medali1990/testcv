<?php

namespace FrontOfficeBundle\Controller;

use FrontOfficeBundle\Entity\Message;
use FrontOfficeBundle\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {	//le formulaire

    	/*$sms = \Swift_Message::newInstance()
    			->setSubject('hello')
    			->setFrom('boudlalmohamedali@gmail.com')
    			->setTo('boudlalmohamedali@gmail.com')
    			->setBody('kjlkjlkjj','text/html');
    	$this->get('mailer')->send($sms);*/
		
       $message = new Message();
       $form = $this->createForm(new messageType(), $message);

       if($form->handleRequest($request)->isValid()){
       	$em = $this->getDoctrine()->getManager();
       	$em->persist($message);
       	$em->flush();

       	$request->getSession()->getFlashBag()->add('notice','votre message est bien envoyé');
       	return $this->redirect($this->generateUrl('front_office_homepage'));
       }

       return $this->render('FrontOfficeBundle:Default:index.html.twig', array('form'=> $form->createView(),
       	));
    }
}
