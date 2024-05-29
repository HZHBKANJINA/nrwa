<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $primaryKey = 'Code';
    public $incrementing = false;
    public $keyType = 'char';
    public $timestamps = true;

    protected $fillable = [
        'Name',
        'Continent',
        'Region',
        'SurfaceArea',
        'IndepYear',
        'Population',
        'LifeExpectancy',
        'GNP',
        'GNPOld',
        'LocalName',
        'GovernmentForm',
        'HeadOfState',
        'Capital',
        'Code2',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'CountryCode', 'Code');
    }

    public function languages()
    {
        return $this->hasMany(CountryLanguage::class, 'CountryCode', 'Code');
    }
}
