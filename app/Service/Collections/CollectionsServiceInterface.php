<?php


namespace App\Service\Collections;


use App\Service\ServiceInterface;

interface CollectionsServiceInterface extends ServiceInterface
{
    public function getCollections();
}
