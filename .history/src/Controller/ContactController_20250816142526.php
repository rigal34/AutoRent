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
    public function index(Request $request, MailerInterface $mailer): Response
    {
        //  Je crée le formulaire
        $form = $this->createForm(ContactFormType::class);
        
        // Je verifie
        $form->handleRequest($request);

        // 3. On vérifie s'il a été soumis et s'il est valide
        if ($form->isSubmitted() && $form->isValid()) {
            
            // 4. On récupère les données
            $data = $form->getData();

            // 5. On construit l'e-mail
            $email = (new Email())
                ->from($data['email'])
                ->to('rigalbruno2@gmail.com')
                ->subject($data['subject'])
                ->text(
                    'Message de : ' . $data['email'] . "\n\n" .
                    'Message : ' . $data['message']
                );

            // 6. On essaie d'envoyer l'e-mail et on gère le succès ou l'échec
            try {
                $mailer->send($email);
                $this->addFlash('success', 'Votre message a été envoyé avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi de votre message.');
            }

            // 7. On redirige l'utilisateur pour éviter qu'il ne renvoie le formulaire
            return $this->redirectToRoute('app_contact');
        }

        // 8. Si le formulaire n'est pas soumis, on affiche la page
        //    et on envoie le formulaire à Twig pour qu'il puisse l'afficher.
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(), // C'EST LA LIGNE QUI MANQUAIT
        ]);
    }
}


