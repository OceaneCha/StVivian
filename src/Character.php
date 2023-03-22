<?php
namespace StVivian;

class Character
{
    private int $id;
    private string|null $firstname;
    private string|null $lastname;
    private string|null $nickname;
    private string|null $alias;
    private string $gender;
    private int|null $age;
    private int $type_id;
    private string|null $biography;
    private string|null $powers;
    private int|null $team_id;
    private string|null $team_name;
    private string|null $picture;

    public function __construct()
    {
        if (!is_null($this->team_id)) {
            $pdo = new \PDO(DSN, USER, PASS);
            $query = "SELECT name FROM team WHERE id = $this->team_id";
            $stmt = $pdo->query($query);
            $row = $stmt->fetch();
            $this->team_name = $row['name'];
        }
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getFirstname(): string|null 
    {
        return $this->firstname;
    }

    public function getLastname(): string|null
    {
        return $this->lastname;
    }

    public function getNickname(): string|null
    {
        return $this->nickname;
    }

    public function getAlias(): string|null
    {
        return $this->alias;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): int|null
    {
        return $this->age;
    }

    public function getTypeID(): int
    {
        return $this->type_id;
    }
    
    public function getBiography(): string|null
    {
        return $this->biography;
    }
    
    public function getPowers(): string|null
    {
        return $this->powers;
    }

    public function getTeamId(): int|null
    {
        return $this->team_id;
    }

    public function getTeamName(): string|null
    {
        return $this->team_name;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }
}