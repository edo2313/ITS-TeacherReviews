<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    private static array $lista = [];

    private string $nome;
    private string $cognome;
    private array $materie = [];

    public function __construct(string $nome, string $cognome)
    {
        parent::__construct();
        $this->nome = $nome;
        $this->cognome = $cognome;
        static::$lista[] = $this;
    }

    public function __toString()
    {
        return $this->nome . ' ' . $this->cognome;
    }

    public static function listStudenti(): array
    {
        return static::$lista;
    }

    public static function countStudenti(): int
    {
        return count(static::$lista);
    }

    public function addMateria(string $materia): void
    {
        if (isset($this->materie[$materia])) {
            echo "La materia esiste già\n";
            return;
        }
        $this->materie[$materia] = [];
    }

    public function mediaMateria(string $materia): ?float
    {
        if (!isset($this->materie[$materia])) {
            echo "ERRORE: la materia indicata non è presente\n";
            return null;
        }
        return array_sum($this->materie[$materia]) / count($this->materie[$materia]);
    }

    public function viewAllMedie(): void
    {
        echo "Medie di {$this}:\n";
        foreach ($this->materie as $materia => $voti) {
            echo " - {$materia}: {$this->mediaMateria($materia)}\n";
        }
    }

    public function addVoto(string $materia, float $voto): void
    {
        if (!isset($this->materie[$materia])) {
            echo "ERRORE: la materia indicata non è presente\n";
            return;
        }
        $this->materie[$materia][] = $voto;
    }

    /**
     * @param string|null $materia Se null, restituisce tutti i voti di tutte le materie
     * @return void
     */
    public function viewVoti(?string $materia = null): void
    {
        if ($materia) {
            if (!isset($this->materie[$materia])) {
                echo "Non ci sono voti per questa materia\n";
                return;
            }
            echo 'Voti di ' . $materia . ': ' . implode(', ', $this->materie[$materia]) . "\n";
        } else {
            echo "Tutti i voti di {$this}\n";
            foreach ($this->materie as $materia => $voti) {
                echo ' - ' . $materia . ': ' . implode(', ', $voti) . "\n";
            }
        }
    }

    public static function countVoti(): int
    {
        $voti = 0;
        foreach (static::$lista as $studente) {
            foreach ($studente->materie as $materia) {
                $voti += count($materia);
            }
        }
        return $voti;
    }
}
