<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';
    protected $primaryKey = 'ulid';
    protected $keyType = 'string';
    protected $fillable = ['title', 'description', 'list_ulid'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ulid = (string) Ulid::generate();
        });
    }

    public function lists()
    {
        return $this->belongsTo(ListModel::class, 'list_ulid', 'ulid');
    }
}
