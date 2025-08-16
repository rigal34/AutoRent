<?php

namespace App\Controller;

use App\Form\ContactFormType;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
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
                ->text(
                    'Message de : ' . $data['email'] . "\n\n" .
                        'Message : ' . $data['message']
                );
            try {
                $mailer->send($email);
                $this->addFlash('success', 'Votre message a été envoyé avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi de votre message.');
            }
            return $this->redirectToRoute('app_contact');
        }
                
                
                
            
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
           
        ]);
    }
}
