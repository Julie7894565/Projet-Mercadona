<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/connexion', name: 'app_login')]

    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        //La tâche donnée consiste à vérifier si l'utilisateur courant est connecté et a le rôle "ROLE_ADMIN". 
        //Si c'est le cas, on redirige l'utilisateur vers la page d'administration. 
        //Si l'utilisateur est connecté mais n'a pas le rôle "ROLE_ADMIN", on le redirige vers la page d'accueil de l'application. Voici le code en français :
        if($this->getUser() != null && in_array("ROLE_ADMIN" , $this->getUser()->getRoles() )){
            return $this->redirectToRoute('admin');
        }else if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
