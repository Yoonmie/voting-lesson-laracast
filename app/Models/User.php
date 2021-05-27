<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isTrusted()
    {
        return !! $this->trusted;//!! for boolean 0 and 1;
    }

    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_links_votes')->withTimestamps();
    }

    // public function voteFor(CommunityLink $link)
    // {
    //     return $this->votes()->sync([$link->id], false);
    //     // return $link->votes()->create(['user_id' => $this->id]);//this->id = Auth::user()->id;
    // }

    // public function unvoteFor(CommunityLink $link)
    // {
    //     return $this->votes()->detach($link);
    //     // return $link->votes()->create(['user_id' => $this->id]);//this->id = Auth::user()->id;
    // }

    public function toggleVoteFor(CommunityLink $link)
    {
        CommunityLinkVote::firstOrNew([
            'user_id' => auth()->id(),
            'community_link_id' => $link->id
        ])->toggle();
    }

    public function votedFor(CommunityLink $link)
    {
        return $link->votes->contains('user_id', $this->id);
    }
}
