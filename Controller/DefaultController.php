<?php

namespace Yoye\Bundle\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Yoye\Bundle\ContactBundle\Form\Type\ContactType;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();
                
                $message = \Swift_Message::newInstance()
                    ->setSubject(sprintf('Contact from %s', $request->getBaseUrl()))
                    ->setFrom($this->container->getParameter('yoye_contact.email'))
                    ->setTo($this->container->getParameter('yoye_contact.email'))
                    ->setBody($this->render($this->container->getParameter('yoye_contact.message_view'), array(
                        'name' => $data->name,
                        'email' => $data->email,
                        'message' => $data->message,
                    )), 'text/html')
                ;
                
                $this->get('mailer')->send($message);
                $this->get('session')->setFlash('success', $this->container->getParameter('yoye_contact.success_message'));
                
                return $this->redirect($this->generateUrl($this->container->getParameter('yoye_contact.success_redirect')));
            }
        }

        return $this->render($this->container->getParameter('yoye_contact.form_view'), array(
                'form' => $form->createView(),
            ));
    }

}
