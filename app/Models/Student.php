<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    private static array $lista = [
        ['id' => 1, 'name' => 'Mario', 'reviews' => [
            [
                'teacher' => 'Rossi',
                'grade' => 5
            ],
            [
                'teacher' => 'Bianchi',
                'grade' => 6
            ]
        ]],
        ['id' => 2, 'name' => 'Luigi', 'reviews' => [
            [
                'teacher' => 'Rossi',
                'grade' => 2
            ]
        ]],
        ['id' => 3, 'name' => 'Pippo'],
    ];

    public static function list(): array
    {
        return static::$lista;
    }

    public static function getById(int $id): ?array
    {
        foreach (static::$lista as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }
}
