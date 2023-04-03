<?php
namespace StVivian\Models;

class Civilian extends CharacterModel
{
    private string $job = "Unemployed";

    public function getJob(): string
    {
        return $this->job;
    }
}