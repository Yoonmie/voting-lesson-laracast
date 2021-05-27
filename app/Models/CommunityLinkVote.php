<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLinkVote extends Model
{
    use HasFactory;

    protected $table = 'community_links_votes';

    protected $fillable=['user_id', 'community_link_id'];

    public function toggle()
    {
        if($this->exists)
        {
            return $this->delete();
        }
        
        return $this->save();
    }
}
