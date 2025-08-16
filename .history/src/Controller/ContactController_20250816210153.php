<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        //  Je crée le formulaire
        $form = $this->createForm(ContactFormType::class);
        
        // Je verifie si les donne du formulaire sont présentes
        // et je les traite si c'est le cas.
        $form->handleRequest($request);

        // Je vérifie s'il a été soumis et s'il est valide
        if ($form->isSubmitted() && $form->isValid()) {
            
           
            $data = $form->getData();
 

            // Je construis l'e-mail
            $email = (new Email())
                ->from($data['email'])
                ->to('rigalbruno2@gmail.com')
                ->subject($data['subject'])
                ->text(
                    'Message de : ' . $data['email'] . "\n\n" .
                    'Message : ' . $data['message']
                );

            // j 'essaie d'envoyer l'e-mail 
            try {
                $mailer->send($email);
                $this->addFlash('success', 'Votre message a été envoyé avec succès.');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('danger', 'Une erreur est survenue lors de l\'envoi de votre message.');
            }

            // Je redirige l'utilisateur pour éviter qu'il ne renvoie le formulaire et donner l ordre a la page de ne pas recharger le formulaire
            return $this->redirectToRoute('app_contact', [], Response::HTTP_SEE_OTHER);
        }

        // Si le formulaire n'est pas soumis j'affiche la page
        //    et j'envoie le formulaire à Twig pour qu'il puisse l'afficher.
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(), 
        ]);
    }
}


