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
            "Bambina Pizzaria"=> [
                'descricao' => 'Pizzaria',
                'endereco'=> [
                    'endereco' => 'Rua rio de janeiro',
                    'bairro' => 'Vila teste',
                    'cep' => '18650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 4,
            ],
            "Acougue lourenco"=> [
                'descricao' => 'Açougue',
                'endereco'=> [
                    'endereco' => 'Avenida Brasil',
                    'bairro' => 'Vila vila',
                    'cep' => '78650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 4,
            ],
            "Avenida Presentes"=> [
                'descricao' => 'Loja de presentes',
                'endereco'=> [
                    'endereco' => 'Rua quinze',
                    'bairro' => 'Jardim',
                    'cep' => '98650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 2,
            ],
            "Mecanica Spok"=> [
                'descricao' => 'Mecânica de automóveis',
                'endereco'=> [
                    'endereco' => 'Rua ABC',
                    'bairro' => 'Santa',
                    'cep' => '84650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 1,
            ],
            "Mecanica Auto Tune"=> [
                'descricao' => 'Mecânica de automóveis',
                'endereco'=> [
                    'endereco' => 'Rua Mec',
                    'bairro' => 'Santo',
                    'cep' => '18655000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 1,
            ],
            "Cine Acacia"=> [
                'descricao' => 'Cinema',
                'endereco'=> [
                    'endereco' => 'Rua Da esquina',
                    'bairro' => 'Santo Abc',
                    'cep' => '18650900',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 3,
            ],
            "Clinica Dr Adoleta"=> [
                'descricao' => 'Clinica médica',
                'endereco'=> [
                    'endereco' => 'Rua Da maria',
                    'bairro' => 'Vila trinta',
                    'cep' => '18645900',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 5,
            ],
            "Rosseto Sports"=> [
                'descricao' => 'Loja de artigos esportivos',
                'endereco'=> [
                    'endereco' => 'Rua Do tenis club',
                    'bairro' => 'Centro',
                    'cep' => '18650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 6,
            ],
            "Viagem Tchau"=> [
                'descricao' => 'Viagem',
                'endereco'=> [
                    'endereco' => 'Rua Joao da Silva',
                    'bairro' => 'Centro',
                    'cep' => '18650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 7,
            ],
            "Pizzaria Happen"=> [
                'descricao' => 'Pizzaria Azul',
                'endereco'=> [
                    'endereco' => 'Rua do pizzaiolo',
                    'bairro' => 'Vila Italia',
                    'cep' => '8956231456',
                    'cidade' => 'Rio de Janeiro',
                    'estado'=> 'Rio de Janeiro'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 4,
            ],
            "Acougue Amarelo"=> [
                'descricao' => 'Açougue Verde',
                'endereco'=> [
                    'endereco' => 'Avenida das cores',
                    'bairro' => 'Copa do mundo',
                    'cep' => '78650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 4,
            ],
            "Presentes da joana"=> [
                'descricao' => 'Loja de presentes',
                'endereco'=> [
                    'endereco' => 'Rua dezoito',
                    'bairro' => 'Jardim America',
                    'cep' => '98650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 2,
            ],
            "Mecanica Azul Marinho"=> [
                'descricao' => 'Mecânica de automóveis',
                'endereco'=> [
                    'endereco' => 'Rua do mar',
                    'bairro' => 'rua dos pescadores',
                    'cep' => '84650000',
                    'cidade' => 'São Manuel',
                    'estado'=> 'São Paulo'
                ],
                'telefone'=> '3841-4141',
                'categoria'=> 1,
            ],
        ];

        foreach ($categorias as $key=>$categoria){
            $categoria = new Categoria();
            $categoria->setNomeCategoria($key);
            $manager->persist($categoria);
            $manager->flush();
        }

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

            $categoria = $manager->getRepository(Categoria::class)->find($empresa["categoria"]);
            $cat_emp = $manager->getRepository(Empresa::class)->setCategoria($categoria, $empresa_new);

        }


    }

}