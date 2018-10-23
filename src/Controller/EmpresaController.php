<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Empresa;
use App\Entity\Endereco;
use App\Form\EmpresaFormType;
use App\Repository\EmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa", name="empresa_listar")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $empresas = $em->getRepository(Empresa::class)->findAll();

        return $this->render('empresa/index.html.twig', [
            'controller_name' => 'EmpresaController',
            'empresas'=>$empresas
        ]);
    }

    /**
     * @param Request $request
     *
     * @Route("/empresa/cadastrar", name="cadastrar_empresa")
     */
    public function store(Request $request){
        $empresa = new Empresa();
        $form = $this->createForm(EmpresaFormType::class);

        $form->handleRequest($request);

        if(($form->isSubmitted())&& ($form->isValid())){
            $em = $this->getDoctrine()->getManager();


            $req = $request->get('empresa_form');
            $categoria = $em->getRepository(Categoria::class)->find($req["categoria"]);

            $endereco = new Endereco();
            $endereco->setBairro($req['endereco']['bairro']);
            $endereco->setEndereco($req['endereco']['endereco']);
            $endereco->setCep($req['endereco']['cep']);
            $endereco->setCidade($req['endereco']['cidade']);
            $endereco->setEstado($req['endereco']['estado']);

            $em->persist($endereco);
            $em->flush();

            $empresa_new = new Empresa();
            $empresa_new->setNome($req['nome']);
            $empresa_new->setDescricao($req['descricao']);
            $empresa_new->setTelefone($req['telefone']);
            $empresa_new->setEndereco($endereco);


            //$empresa_new->setCategoria(array($categoria));

            $em->persist($empresa_new);
            $em->flush();

            $cat_emp = $em->getRepository(Empresa::class)->setCategoria($categoria, $empresa_new);


            //$this->get('session')->getFlashBag()->set('success','Empresa foi Salva');
            $this->addFlash('success', "Empresa cadastrada");
            return $this->redirectToRoute('empresa_listar');
        }

        return $this->render("empresa/create.html.twig",['form' => $form->createView()]);
    }

    /**
     * @param Request $request
     *
     * @Route("/empresa/editar/{id}", name="editar_empresa")
     */
    public function update(Request $request,$id){

        $em = $this->getDoctrine()->getManager();

        $empresa = $em->getRepository(Empresa::class)->find($id);
        $form = $this->createForm(EmpresaFormType::class,$empresa);
        $form->handleRequest($request);

        if(($form->isSubmitted())&& ($form->isValid())){

            $em->persist($empresa);

            $em->flush();

            $this->get('session')->getFlashBag()->set('success','Empresa '. $empresa->getNome() .' foi Salva');

            return $this->redirectToRoute('empresa_listar');
        }
        return $this->render('empresa/update.html.twig',['empresa'=> $empresa,'form' => $form->createView()]);
    }


    /**
     * @param Request $request
     * @Template("empresa/view.html.twig")
     * @Route("/empresa/visualizar/{id}", name="visualizar_empresa")
     */
    public function view(Empresa $empresa){
        //$em = $this->getDoctrine()->getManager();

       // $empresa = $em->getRepository(Empresa::class)->find($id);
        return ['empresa'=> $empresa];

    }

    /**
     * @param Request $request
     *
     * @Route("/empresa/deletar/{id}", name="deletar_empresa")
     */
    public function deletar(Request $request,$id){
        $em = $this->getDoctrine()->getManager();

        $empresa = $em->getRepository(Empresa::class)->find($id);
        if(!$empresa){
            $tipo = "warning";
            $mensagem = "Empresa não existe";
        }else{
            $em->remove($empresa);
            $em->flush();
            $tipo = "success";
            $mensagem = "Empresa excluída com sucesso.";
        }

        $this->get('session')->getFlashBag()->set($tipo,$mensagem);
        return $this->redirectToRoute("empresa_listar");

    }
}
