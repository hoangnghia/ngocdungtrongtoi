<?php
/**
 * Created by PhpStorm.
 * User: NgocDung
 * Date: 08/09/2018
 * Time: 3:57 CH
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;

class Album_image extends Model
{
    const STATUS_TEXT = [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
    ];


    protected $table = 'album_image';
    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_url', 'post_id', 'created_at','updated_at','status'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function port()
    {
        return $this->hasOne('App\Models\Album', 'id', 'post_id');
    }
}