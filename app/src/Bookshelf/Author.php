<?php
namespace Bookshelf;

use Illuminate\Database\Eloquent\Model;
use Valitron\Validator;

final class Author extends Model
{
    /**
     * Turn off the created_at & updated_at columns
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fields that can be updated via update()
     * @var array
     */
    protected $fillable = ['name', 'biography'];

    public function books()
    {
        return $this->hasMany('Bookshelf\Book');
//        return [
//            1 => 'Bob news'
//        ];
    }
}
