<?php
/**
 * Created by PhpStorm.
 * User: akira
 * Date: 19/10/2018
 * Time: 23:32
 */
namespace App\Controller;

use App\Entity\Empresa;
use App\Repository\EmpresaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;


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
                'empresas'=>$retorno
            ]);
        }

        return $this->render("hello/formulario.html.twig");

        /*$qts_animais = $em->getRepository(Cliente::class)->qtsAnimaisPorCliente();

        $qte_racas = $em->getRepository(Animal::class)->qtsPorRaca();

        VarDumper::dump($qte_racas);

        return [
            'qts_animais' => $qts_animais,
            'qtde_por_raca' => $qte_racas
        ];*/
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