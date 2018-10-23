<?php

namespace App\Repository;

use App\Entity\Categoria;
use App\Entity\Empresa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Empresa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Empresa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Empresa[]    findAll()
 * @method Empresa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Empresa::class);
    }

    public function pesquisar($pesquisa){

        /*$q = $this->createQueryBuilder("emp")
            ->innerJoin("emp.endereco", "end")
            ->innerJoin("emp.categoria", "cat")
            ->getQuery();*/
        $q = "select emp.nome AS nome, emp.id AS id, emp.descricao AS descricao, emp.telefone AS telefone,
                ed.endereco AS endereco, ed.cep AS cep, ed.cidade AS cidade, ed.estado AS estado, ed.bairro AS bairro,
                cat.nome_categoria AS categoria
                from empresa emp
                LEFT JOIN endereco ed ON emp.endereco_id = ed.id
                LEFT JOIN categoria_empresa ce ON ce.empresa_id = emp.id
                LEFT JOIN categoria cat ON ce.categoria_id = cat.id
                
                WHERE (emp.nome like \"%$pesquisa%\" 
                OR ed.endereco like \"%$pesquisa%\" 
                OR ed.cep like \"%$pesquisa%\" 
                OR ed.cidade like \"%$pesquisa%\" 
                OR cat.nome_categoria like \"%$pesquisa%\");";

        return $this->getEntityManager()
            ->getConnection()
            ->executeQuery($q)
            ->fetchAll(\PDO::FETCH_OBJ);;
    }

    public function setCategoria(Categoria $categoria, Empresa $empresa){
        $cat_id = $categoria->getId();
        $emp_id =  $empresa->getId();
        $query = "INSERT INTO categoria_empresa (empresa_id, categoria_id)
                  VALUES ($emp_id,$cat_id); ";

        return $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query);

    }

//    /**
//     * @return Empresa[] Returns an array of Empresa objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Empresa
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
