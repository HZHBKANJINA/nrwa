<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'ID';
    public $timestamps = true;

    protected $fillable = [
        'Name',
        'CountryCode',
        'District',
        'Population',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'CountryCode', 'Code');
    }
}
