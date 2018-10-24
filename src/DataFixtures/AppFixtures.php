<?php


namespace App\DataFixtures;


use App\Entity\Categoria;
use App\Entity\Empresa;
use App\Entity\Endereco;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager){
        $categorias= ['Auto'=>'','Beauty and Fitness'=>'','Entertainment'=>'', 'Food and Dinning'=>'', 'Health'=>'',
            'Sports'=>'','Travel'=>''
        ];

        $empresas = [
            "pizzaria happen"=> [
                'descricao' => 'Pizzaria',
                'endereco'=> [
                    'endereco' => 'Rua teste',
                    'bairro' => 'Vila ok',
                    'cep' => '18650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141'
            ],
            "Acougue lourenco"=> [
                'descricao' => 'Açougue',
                'endereco'=> [
                    'endereco' => 'Rua teste',
                    'bairro' => 'Vila ok',
                    'cep' => '18650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141'
            ],
            "Avenida Presentes"=> [
                'descricao' => 'Loja de presentes',
                'endereco'=> [
                    'endereco' => 'Rua teste',
                    'bairro' => 'Vila ok',
                    'cep' => '18650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141'
            ]
        ];

        foreach ($empresas as $key=>$empresa){
            $empresa_new = new Empresa();
            $empresa_new->setNome($key);
            $empresa_new->setDescricao($empresa["descricao"]);
            $empresa_new->setTelefone($empresa["telefone"]);


            $endereco = new Endereco();
            $endereco->setEndereco($empresa["endereco"]["endereco"]);
            $endereco->setBairro($empresa["endereco"]["bairro"]);
            $endereco->setCep($empresa["endereco"]["cep"]);
            $endereco->setCidade($empresa["endereco"]["cidade"]);
            $endereco->setEstado($empresa["endereco"]["estado"]);

            $manager->persist($endereco);
            $manager->flush();
           // $id = $endereco->getId();

            $empresa_new->setEndereco($endereco);

            $manager->persist($empresa_new);
            $manager->flush();

        }

        foreach ($categorias as $key=>$categoria){
            $categoria = new Categoria();
            $categoria->setNomeCategoria($key);
            $manager->persist($categoria);
            $manager->flush();
        }

    }

}