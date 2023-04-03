<?php
namespace StVivian\Models;

class Superhero extends Character
{
    private ?string $alias;    

    public function getAlias(): ?string
    {
        return $this->alias;
    }
}