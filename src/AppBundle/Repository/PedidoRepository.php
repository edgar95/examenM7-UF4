<?php

namespace AppBundle\Repository;

/**
 * PedidoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PedidoRepository extends \Doctrine\ORM\EntityRepository
{
    public function pedidosDeUsuarioId($id){
        return $this->createQueryBuilder('pedido')
            ->select('clientes.nombre', 'pedido.id', 'pedido.fecha', 'pedido.precio' )
            ->leftJoin('pedido.clientes', 'clientes')
            ->andWhere('clientes.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute()
            ;
    }

    public function todosPedidosDeUsuarioId($id){
        return $this->pedidosDeUsuarioId($id)->execute();
    }


}

/* ->leftJoin('pedido.nombre', 'nombre')
           ->addOrderBy('pedido.fecha', 'DESC')
           ->andWhere('pedido.id = :id')
           ->setParameter('id', $id)*/
//->leftJoin('pedido.clientes', 'nombre')