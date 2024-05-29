<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryLanguage extends Model
{
    use HasFactory;

    protected $table = 'country_languages';
    protected $primaryKey = ['CountryCode', 'Language'];
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = [
        'CountryCode',
        'Language',
        'IsOfficial',
        'Percentage',
    ];

    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        return $this->getAttribute($keyName);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'CountryCode', 'Code');
    }
}
