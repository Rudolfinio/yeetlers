<?php
namespace App\Model;

use App\Service\Config;

class Pietro
{
    private ?int $pietro_id = null;
    private ?string $budynek_id = null;
    private ?string $nazwa = null;

    public function getpietroId(): ?int
    {
        return $this->pieto_id;
    }

    public function setpietroId(?int $id): Pietro
    {
        $this->pietro_id = $pietro_id;

        return $this;
    }

    public function getbudynekId(): ?string
    {
        return $this->subject;
    }

    public function setbudynekId(?string $budynek_id): pPietro
    {
        $this->budynek_id = $budynek_id;

        return $this;
    }

    public function getnazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setnazwa(?string $nazwa): Pietro
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public static function fromArray($array): Pietro
    {
        $pietro = new self();
        $pietro->fill($array);

        return $pietro;
    }

    public function fill($array): Pietro
    {
        if (isset($array['pietro_id']) && ! $this->getpietroId()) {
            $this->setpietroId($array['pietro_id']);
        }
        if (isset($array['budynek_id'])) {
            $this->setbudynekId($array['budynek_id']);
        }
        if (isset($array['nazwa'])) {
            $this->setnazwa($array['nazwa']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pietro';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $pietra = [];
        $pietraArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($pietraArray as $pietroArray) {
            $pietra[] = self::fromArray($postArray);
        }

        return $pietra;
    }

    public static function find($pietro_id): ?Pietro
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pietro WHERE pietro_id = :pietro_id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['pietro_id' => $pietro_id]);

        $pietroArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $pietroArray) {
            return null;
        }
        $pietro = Pietro::fromArray($pietroArray);

        return $pietro;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getpietroId()) {
            $sql = "INSERT INTO pietro (budynek_id, nazwa) VALUES (:budynek_id, :nazwa)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'budynek_id' => $this->getbudynekId(),
                'nazwa' => $this->getnazwa(),
            ]);

            $this->setpietroId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE pietro SET budynek_id = :budynek_id, nazwa = :nazwa WHERE pietro_id = :pietro_id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':budynek_id' => $this->getbudynekId(),
                ':nazwa' => $this->getnazwa(),
                ':pietro_id' => $this->getpietroId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM pietro WHERE pietro_id = :pietro_id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':pietro_id' => $this->getpietroId(),
        ]);

        $this->setpietroId(null);
        $this->setbudynekId(null);
        $this->setnazwa(null);
    }
}
