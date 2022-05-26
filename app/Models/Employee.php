<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'PIN'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];


    // Add UUID to the Employee model before storing it in the DB
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            $employee->{$employee->getKeyName()} = (string) Str::uuid();
        });
    }

    // Cancel auto-increment for the the model primary key
    public function getIncrementing()
    {
        return false;
    }

    // Store the primary key as String values
    public function getKeyType()
    {
        return 'string';
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}