<?php

namespace App\Repository;

use App\Entity\Movie;
use App\Service\SearchMovie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    public function searchMovie(SearchMovie $search): array
    {
        $query = $this->createQueryBuilder('m');

        if (!empty($search->genre)) {
            $query = $query
            ->andWhere('m.genre = :genre')
            ->setParameter('genre', $search->genre);
        }

        if (!empty($search->country)) {
            $query = $query
            ->andWhere('m.country = :country')
            ->setParameter('country', $search->country);
        }

        if (!empty($search->support)) {
            $query = $query
            ->andWhere('m.support = :support')
            ->setParameter('support', $search->support);
        }

        return $query->getQuery()->getResult();
    }

    public function findLikeTitle(string $name)
    {
        $query = $this->createQueryBuilder('m')
            ->where('m.title LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->orderBy('m.title', 'ASC');

        return $query->getQuery()->getResult();
    }
}
