<?php


namespace App\Service\Collections;


use App\Repositories\Collections\CollectionsRepositoryInterface;
use App\Service\BaseService;

class CollectionsService extends BaseService implements CollectionsServiceInterface
{
    public $repository;

    public function __construct(CollectionsRepositoryInterface $collectionsRepository)
    {
        $this->repository = $collectionsRepository;
    }

    public function getCollections() {
        return $this->repository->getCollections();
    }
}
