<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Repository\ContactRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request,EntityManagerInterface $em,ContactRepository $rep): Response
    {   if ($request->getMethod() === 'POST'){
        $this->addFlash('success','Your message has been sent. Thank you!');
    }
    else{
        $this->addFlash('error','Verify');
    }

        $name=$request->get('name');
        $email=$request->get('email');
        $message=$request->get('message')
        ;
       
        

        $contact = new Contact();
        $contact->setName ($name);
        $contact->setEmail ($email);
        $contact->setMessage ($message);
        $em->persist($contact);
        $em->flush();
    $contacts=$rep->findAll();


    return $this->render('/contact/index.html.twig', ['contacts'=>$contacts]);

      
    }
    #[Route('/admin/contact',name:'admin-contact')]
public function listing(ContactRepository $rep){
    $contacts=$rep->findAll();
    return $this->render('/admin/contact.html.twig',['contacts'=>$contacts]);
}



}


