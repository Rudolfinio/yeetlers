<?php
namespace App\Model;

use App\Service\Config;

class pracownik
{
    private ?int $pracownik_id = null;
    private ?string $imie = null;
    private ?string $nazwisko = null;
    private ?string $tytul = null;

    /**
     * @return int|null
     */
    public function getPracownikId(): ?int
    {
        return $this->pracownik_id;
    }

    /**
     * @param int|null $pracownik_id
     */
    public function setPracownikId(?int $pracownik_id): void
    {
        $this->pracownik_id = $pracownik_id;
    }

    /**
     * @return string|null
     */
    public function getImie(): ?string
    {
        return $this->imie;
    }

    /**
     * @param string|null $imie
     */
    public function setImie(?string $imie): void
    {
        $this->imie = $imie;
    }

    /**
     * @return string|null
     */
    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    /**
     * @param string|null $nazwisko
     */
    public function setNazwisko(?string $nazwisko): void
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return string|null
     */
    public function getTytul(): ?string
    {
        return $this->tytul;
    }

    /**
     * @param string|null $tytul
     */
    public function setTytul(?string $tytul): void
    {
        $this->tytul = $tytul;
    }

    public static function fromArray($array): pracownik
    {
        $pracownik = new self();
        $pracownik->fill($array);

        return $pracownik;
    }

    public function fill($array): pracownik
    {
        if (isset($array['pracownik_id']) && ! $this->getPracownikId()) {
            $this->setPracownikId($array['pracownik_id']);
        }
        if (isset($array['imie'])) {
            $this->setImie($array['imie']);
        }
        if (isset($array['nazwisko'])) {
            $this->setNazwisko($array['nazwisko']);
        }
        if (isset($array['tytul'])) {
            $this->setTytul($array['tytul']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pracownik';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $pracownicy = [];
        $pracownicyArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($pracownicyArray as $pracownikArray) {
            $pracownicy[] = self::fromArray($pracownikArray);
        }

        return $pracownicy;
    }

    public static function find($id): ?pracownik
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM pracownik WHERE pracownik_id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $pracownikArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $pracownikArray) {
            return null;
        }
        $pracownik = pracownik::fromArray($pracownikArray);

        return $pracownik;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getPracownikId()) {
            $sql = "INSERT INTO pracownik (imie, nazwisko, tytul) VALUES (:imie, :naziwsko, :tytul)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'imie' => $this->getImie(),
                'nazwisko' => $this->getNazwisko(),
                'tytul' => $this->getTytul(),
            ]);

            $this->setPracownikId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE pracownik SET imie = :imie, nazwisko = :nazwisko, tytul = :tytul WHERE pracownik_id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':imie' => $this->getImie(),
                ':nazwisko' => $this->getNazwisko(),
                ':tytul' => $this->getTytul(),
                ':id' => $this->getPracownikId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM pracownik WHERE pracownik_id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getPracownikId(),
        ]);

        $this->setPracownikId(null);
        $this->setTytul(null);
        $this->setNazwisko(null);
        $this->setImie(null);
    }
}
