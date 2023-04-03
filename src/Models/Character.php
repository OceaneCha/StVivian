<?php
namespace StVivian\Models;

class Character
{
    private int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $nickname;
    private ?string $alias;
    private string $gender;
    private ?int $age;
    private int $type_id;
    private ?string $biography;
    private ?string $powers;
    private ?int $team_id;
    private ?string $team_name;
    private ?string $picture;

    public function __construct()
    {
        if (!is_null($this->team_id)) {
            $connection = new \PDO(DSN, USER, PASS);
            $query = "SELECT name FROM team WHERE id = $this->team_id";
            $stmt = $connection->query($query);
            $row = $stmt->fetch();
            $this->team_name = $row['name'];
        }
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getFirstname(): ?string 
    {
        return $this->firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getTypeID(): int
    {
        return $this->type_id;
    }
    
    public function getBiography(): ?string
    {
        return $this->biography;
    }
    
    public function getPowers(): ?string
    {
        return $this->powers;
    }

    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    public function getTeamName(): ?string
    {
        return $this->team_name;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }
}