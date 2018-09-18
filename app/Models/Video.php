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

class Video extends Model
{
    const STATUS_TEXT = [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
    ];
    const TYPE = [
        '1' => 'Khởi động buổi sáng',
        '2' => 'Văn hóa công ty',
        '3' => 'Các video chia sẻ/đào tạo',
    ];

    protected $table = 'video';
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
        'title', 'description', 'type','userId', 'created_at','updated_at','status','content','url_video','img_url'
    ];

}