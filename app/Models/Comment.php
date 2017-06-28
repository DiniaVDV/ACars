<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'message',
        'status',
        'like'
    ];

    /**
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * An comment is owned by item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    /**
     * An comment is owned by user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public static function qtyCheckCommetns()
    {
        $qtyComments = Comment::where('status', 'check')->count();
        return $qtyComments;
    }

}
