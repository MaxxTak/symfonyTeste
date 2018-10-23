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

    public function pesquisar(){

        $q = $this->createQueryBuilder("emp")
            ->innerJoin("e.endereco", "end")
            ->innerJoin("e.categoria", "end")
            ->orWhere()
            ->groupBy("r.nome")
            ->getQuery();

        return $q->getResult();
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
