<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSetting extends Model
{
    /**
     * @var UserSetting
     * @package App\Model\UserSetting
     * @author Shaarif <shaarifsabah5299@gmail.com>
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @property string $customer_id
     * @property string $image
     * @property string $mail_text
     * @property string $heading
     * @property string $title
     */
    protected $fillable =   [
        'customer_id',
        'image',
        'mail_text',
        'heading',
        'title',
    ];

    /**
     * @return BelongsTo
     */
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
