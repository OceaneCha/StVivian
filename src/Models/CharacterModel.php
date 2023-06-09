<?php
namespace StVivian\Models;

class CharacterModel
{
    private $connection;

    public const FILTERS = [
        'team',
        'type',
    ];

    public function __construct()
    {
        $this->connection = new \PDO(DSN, USER, PASS);
    }

    public function getCharacterById(int $id): Character
    {
        $query = "SELECT * FROM `character` WHERE `id` = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_CLASS, "StVivian\Models\Character");
    }

    public function getCharacters(?string $filter, ?int $id): array
    {
        $query = "SELECT * FROM `character`";
        if ($filter !== null && $id !== null) {
            if (in_array($filter, self::FILTERS)) {
                $query .= " WHERE " . $filter . "_id = :id";
            }
        }
        $stmt = $this->connection->prepare($query);
        if ($id !== null) {
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "StVivian\Models\Character");
    }

    public function addCharacter(array $character): void
    {
        $query = "INSERT INTO `character` (firstname, lastname, nickname, alias, type_id, picture) VALUES (:firstname, :lastname, :nickname, :alias, :type_id, :picture)";
        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':type_id', $character['type_id'], \PDO::PARAM_INT);

        $stmt->execute([
            ':firstname' => $character['firstname'],
            ':lastname' => $character['lastname'],
            ':nickname' => $character['nickname'],
            ':alias' => $character['alias'],
            ':type_id' => $character['type_id'],
            ':picture' => $character['picture'],
        ]);
    }
}