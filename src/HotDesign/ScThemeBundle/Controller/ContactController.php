<?php
/**
 * This file is part of the SimpleCatalog Frontend package.
 *
 * (c) HotDesign <info@hotdesign.com.ar>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HotDesign\ScThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HotDesign\ScThemeBundle\Form\ScContactFormType;

/**
 * ContactController is the controller that will handle the contact forms
 * and them actions
 * 
 * @author    HotDesign info@hotdesign.com.ar
 * @copyright GPL-v2 2012/01/30
 * @package   ScThemeBundle
 * @version   0.1
 * 
 */

class ContactController extends Controller {

    /**
     * Main Contact page display
     * 
     * @return Response A Response instance 
     * 
     */
    public function indexAction() {
        
        $form   = $this->createForm(new ScContactFormType(), array());
        return $this->render('HotDesignScThemeBundle:Contact:index.html.twig', array('form' => $form->createView()));
        
    }
    
    
    /**
     * Submit action for the main page contact form.
     * 
     * @return Response A Response instance  
     */
    public function submitContactAction() {
        $form   = $this->createForm(new ScContactFormType(), array());
        $request = $this->getRequest();
        $form->bindRequest($request);

        if ($form->isValid()) { 
        //Todo, get all the contact info and put it to the message body.    
            $contact_form = $request->get('contact_form');
            
//            $message = \Swift_Message::newInstance()
//                ->setSubject('Hello Email')
//                ->setFrom('alguien@sitio.com')
//                ->setTo('destino@gmail.com')
////        ->setBody($this->renderView('HelloBundle:Hello:email.txt.twig', array('name' => $name)))
//                ->setBody('Hola')
//        ;
//        $this->get('mailer')->send($message);
        
//        return $this->redirect($this->generateUrl('schousingext_show', array('id' => $entity->getId())));
  
        } 
        
         return $this->render('HotDesignScThemeBundle:Contact:index.html.twig', array('form' => $form->createView()));
    }


    /**
     * This is obsolete for now, TODO something here
     * @obsolete
     * @return type 
     */
    private function sendEmailAction() {
        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('alguien@sitio.com')
                ->setTo('destino@gmail.com')
//        ->setBody($this->renderView('HelloBundle:Hello:email.txt.twig', array('name' => $name)))
                ->setBody('Hola')
        ;
        $this->get('mailer')->send($message);

//    return $this->render(...);
        return $this->render('HotDesignScThemeBundle:Contact:index.html.twig');
    }

}
