<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request,MailerInterface $mailer): Response
    {
         $form = $this->createForm(ContactFormType::class);
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
           $data = $form->getData();
          $emailExpediteur = $data['email'];

          $email = (new Email())
            ->from($data['email'])
            ->to('rigalbruno2@gmail.com')
             ->subject($data['subject'])
          }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
