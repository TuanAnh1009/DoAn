<?php


namespace App\Repositories\Collections;


use App\Repositories\RepositoriesInterface;

interface CollectionsRepositoryInterface extends RepositoriesInterface
{
    public function getCollections();
}
