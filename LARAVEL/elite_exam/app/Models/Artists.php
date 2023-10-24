<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Albums;

class Artists extends Model
{
    protected $fillable = [
        'code',
        'name'
    ];

    public static function getArtistDetails($iArtistId) {
        return self::find($artistId);
    }

    public static function updateArtistDetails($iArtistId, $aData) {
        $oArtist = self::find($iArtistId);
    
        if ($oArtist) {
            $oArtist->fill($aData);
            $oArtist->save();
            return $oArtist;
        }
    
        return null;
    }

    public static function deleteArtistDetails($iArtistId) {
        $oArtist = self::find($iArtistId);
    
        if ($oArtist) {
            $oArtist->delete();
            return true;
        }
    
        return false;
    }

    public function albums()
    {
        return $this->hasMany(Albums::class);
    }
}
