<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


   /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }

    /**
     * @Route("/sign/up", name="signUp")
     */
    public function signUp(Request $req, UserPasswordEncoderInterface $encoder)
    {
       $em = $this->getDoctrine()->getManager();
       $user = new User();
       $user->setLastName($req->request->get('lastName'));
       $user->setName($req->request->get('name'));
       $user->setStreetAddress($req->request->get('streetAddress'));
       $user->setCommune($req->request->get('commune'));
       $user->setEmail($req->request->get('email'));
       
       $encodedPassword = $encoder->encodePassword($user, $req->request->get('password'));
       $user->setPassword($encodedPassword);

            $photo = $req->files->get('image');
           
            
            $photoServer = md5(uniqid()) . "." . $photo->guessExtension();
            // stocker le fichier dans le serveur (on peut indiquer un dossier)
            $photo->move("dossierFichiers", $photoServer);
            // affecter le nom du fichier de l'entité. Ça sera le nom qu'on
            // aura dans la BD (un string, pas un objet UploadedFile cette fois)
            $user->setPhoto($photoServer);

       $em->persist($user);
       $em->flush(); 
      
      return $this->render('register/register.html.twig');
    }



}


