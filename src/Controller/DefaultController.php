<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     *
     * @Route("/insert")
     * @return Response
     */
    public function insert(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername("user");
        $user->setEmail("user@email.com");
        $user->setRoles("ROLE_USER");

        $encoder = $this->get('security.password_encoder');
        $pass = $encoder->encodePassword($user, "123456");
        $user->setPassword($pass);
        $em->persist($user);


        $user = new User();
        $user->setUsername("admin");
        $user->setEmail("admin@email.com");
        $user->setRoles("ROLE_ADMIN");

        $encoder = $this->get('security.password_encoder');
        $pass = $encoder->encodePassword($user, "123456");
        $user->setPassword($pass);
        $em->persist($user);

        $em->flush();

        return new Response("<h1>Inserido com sucesso!</h1>");

    }
}
