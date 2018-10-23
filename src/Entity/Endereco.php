<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\EnderecoRepository")
 */
class Endereco
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Campo não pode ser vazio")
     */
    private $estado;


    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco( $endereco)
    {
        $this->endereco = $endereco;
    }


    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     */
    public function setCep( $cep)
    {
        $this->cep = $cep;
    }


    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro( $bairro)
    {
        $this->bairro = $bairro;
    }



    /**
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     */
    public function setCidade( $cidade)
    {
        $this->cidade = $cidade;
    }



    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado( $estado)
    {
        $this->estado = $estado;
    }

}
