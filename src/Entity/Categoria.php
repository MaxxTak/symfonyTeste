<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriaRepository")
 */
class Categoria
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
    private $nome_categoria;

    /**
     * @return string
     */
    public function getNomeCategoria()
    {
        return $this->nome_categoria;
    }

    /**
     * @param string $nome_categoria
     */
    public function setNomeCategoria($nome_categoria)
    {
        $this->nome_categoria = $nome_categoria;
    }

    /**
     * @var integer
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Empresa", mappedBy="categoria_id")
     *
     *
     */
    private $empresa;

    /**
     * @return int
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param int $empresa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

}
