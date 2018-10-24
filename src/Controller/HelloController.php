<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\User;
use App\Repository\EmpresaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class HelloController extends Controller
{

    /**
     * @Route("/", name="default")
     *
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();

            $pesquisa = $request->get('pesquisa');
            $retorno = $em->getRepository(Empresa::class)->pesquisar($pesquisa);//$em->getRepository(Animal::class)->qtsPorRaca();
         //   dd($retorno);
            return $this->render('empresa/index.html.twig', [
                'controller_name' => 'EmpresaController',
                'empresas'=>$retorno,
                'pesquisa'=>$pesquisa
            ]);
        }

        return $this->render("hello/formulario.html.twig");

    }

    /**
     * @Route("/login", name="login")
     * @Template("default/login.html.twig")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return array
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return [
            'error' => $error,
            'last_username' => $lastUsername
        ];
    }



    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("hello-world")
     */
    public function hello_world(){
        return new \Symfony\Component\HttpFoundation\Response(
            "<html><body><h1>Hello World!</h1></body></html>"
        );
    }


}