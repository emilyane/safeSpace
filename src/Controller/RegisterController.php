<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;


class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('register/register.html.twig');
    }
}



use App\Form\RegistrationFormType;
use App\Security\FormulaireLoginAuthenticator;



class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, FormulaireLoginAuthenticator $authenticator): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            //upload fichier (photo de profile)
            $fichier = $user->getImage();
            //dump($fichier );
            //die();
            
            $nomFichierServeur = md5(uniqid()) . "." . $fichier->guessExtension();
            // stocker le fichier dans le serveur (on peut indiquer un dossier)
            $fichier->move("dossierFichiers", $nomFichierServeur);
            // affecter le nom du fichier de l'entité. Ça sera le nom qu'on
            // aura dans la BD (un string, pas un objet UploadedFile cette fois)
            $user->setImage($nomFichierServeur);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
