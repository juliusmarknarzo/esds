<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Artists;

class Albums extends Model
{
    protected $fillable = [
        'artists_id',
        'year',
        'name',
        'sales'
    ];

    public static function getAlbumDetails($iAlbumId) {
        return self::find($iAlbumId);
    }

    public static function updateAlbumDetails($iAlbumId, $aData) {
        $oAlbum = self::find($iAlbumId);
    
        if ($oAlbum) {
            $oAlbum->fill($aData);
            $oAlbum->save();
            return $oAlbum;
        }
    
        return null;
    }

    public static function deleteAlbumDetails($iAlbumId) {
        $oAlbum = self::find($iAlbumId);
    
        if ($oAlbum) {
            $oAlbum->delete();
            return true;
        }
    
        return false;
    }

    public function addAlbumCover($iAlbumId, $oImage) {
        $sPath = 'app/albums_cover';
        $oAlbum = self::find($iAlbumId);
        if ($oAlbum && $oImage) {
            $sFileName = $iAlbumId . '.jpg';
            Storage::put($sPath . '/' . $sFileName, $oImage);
        }
    
        return null;
    }

    public function artists()
    {
        return $this->belongsTo(Artists::class);
    }

}
