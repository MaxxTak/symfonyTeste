<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }



    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $nome;

    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome( $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $telefone;

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone( $telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @var text
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $descricao;

    /**
     * @return text
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param text $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Endereco", cascade={"persist"})
     */
    private $endereco;

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     * @return Empresa
     */
    public function setEndereco(Endereco $endereco )
    {
        $this->endereco = $endereco;
        return $this;
    }


    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Categoria")
     *
     * @ORM\JoinTable(name="categoria_empresa")
     *
     */
    private $categoria;

    /**
     * @return int
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param Categoria $categoria
     */
    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

}
