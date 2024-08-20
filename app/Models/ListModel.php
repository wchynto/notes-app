<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class ListModel extends Model
{
    use HasFactory;

    protected $table = 'lists';
    protected $primaryKey = 'ulid';
    protected $keyType = 'string';
    protected $fillable = ['title', 'description', 'color', 'user_ulid'];

    protected static $colors = [
        'bg-green-300',
        'bg-red-300',
        'bg-yellow-300',
        'bg-purple-300',
        'bg-pink-300',
        'bg-indigo-300',
        'bg-gray-300',
        'bg-orange-300'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ulid = (string) Ulid::generate();
            $model->color = self::$colors[array_rand(self::$colors)];
        });
    }

    public function todos()
    {
        return $this->hasMany(Todo::class, 'list_ulid', 'ulid');
    }
}
