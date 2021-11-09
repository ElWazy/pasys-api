<?php

namespace LosYuntas\tool\application;

use LosYuntas\tool\domain\ToolRepository;

final class ToolSearcher
{
    private ToolRepository $repository;

    public function __construct(ToolRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByCriteria(string $criteria) 
    {
        $tools =  $this->repository->getAll();
    }

    public function getAll() 
    {
        return $this->repository->getAll();
    }
}
