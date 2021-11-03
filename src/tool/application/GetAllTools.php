<?php

namespace LosYuntas\tool\application;

class GetAllTools 
{
    private ToolRepository $repository;

    public function __construct(ToolRepository $repository) 
    {
        $this->repository = $repository;
    }
}
