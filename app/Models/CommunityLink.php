<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie\Permission\Traits\isTrusted;

class CommunityLink extends Model
{
    use HasFactory;

    protected $fillable= [
        'channel_id', 'title', 'link'
    ];

    public static function from(User $user)
    {
        $link = new static;
        
        $link->user_id = $user->id;

        // $link->channel_id = 1;
        if($user->isTrusted()) {
            $link->approve();
        }

        
        return $link;
        // return new static(['user_id' => $user->id]);
    }

    public function contribute($attributes)
    {
        return $this->fill($attributes)->save();
    }

    public function approve()
    {
        $this->approved = true;
        return $this;
    }

    
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id' );
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

}
