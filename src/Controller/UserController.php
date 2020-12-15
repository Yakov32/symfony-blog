<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class UserController extends AbstractController
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route ("/userRegistration", name="registartion")
     */
    public function registration(Request $request, ValidatorInterface $validator, USerPasswordEncoderInterface $passwordEncoder): Response
    {
            $user = new User();
            $entityManager = $this->getDoctrine()->getManager();

            $user->setPassword($passwordEncoder->encodePassword($user,$request->request->get('reg_pass')));
            $user->setEmail($request->request->get('reg_mail'));

            $errors = $validator->validate($user);

            if (count($errors) > 0){
                $this->addFlash('error', 'Wrong data');
                return new Response(count($errors));
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Registration is complete! Please auth..');
            return $this->redirectToRoute('default');

    }

    /**
     * @Route ("/user/profile", name="user_profile")
     */
    public function profile(): Response
    {
        if (!$this->security->getUser()){
            return new Response('you are not user!');
        }

        return $this->render('/user/profile.html.twig');

    }
}
