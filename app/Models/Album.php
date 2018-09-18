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

class Album extends Model
{
    const STATUS_TEXT = [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
    ];
    const TYPE = [
        '1' => 'Hình ảnh phòng ban',
        '2' => 'Hình ảnh chi nhánh',
        '3' => 'Hình ảnh nhà ở nhân viên',
        '4' => 'Teambuilding + các khóa huấn luyện',
        '4' => 'Hình ảnh hoạt động thương hiệu + Behind the Scence',
    ];

    protected $table = 'album';
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
        'title', 'description', 'image_url', 'content', 'type','userId', 'created_at','updated_at','status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function port_image()
    {
        return $this->hasMany('App\Models\Album_image', 'post_id');
    }


}