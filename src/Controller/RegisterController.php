<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use App\Form\RegistrationFormType;
use App\Security\FormulaireLoginAuthenticator;
use Symfony\Component\Security\Guard\AuthenticatorInterface;



class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
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

            //upload image
            $photo = $user->getPhoto();
            $photoServer = md5(uniqid()) . "." . $photo->guessExtension();
            //save photo on the server
            $photo->move("dossierFichiers", $photoServer);
            $user->setPhoto($photoServer);
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

        return $this->render('register/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
