<?php

namespace App;

use App\Models\Reader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Auditable
{
    use Notifiable, EntrustUserTrait, \OwenIt\Auditing\Auditable, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $appends = ['createdAtHuman'];
    protected $fillable = [
        'name', 'email', 'password', 'password_raw', 'status', 'teacher_id', 'faculty_id', 'dept_id', 'title', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $auditInclude  = [

        'name', 'email', 'password', 'created_at', 'updated_at', 'deleted_at'

    ];

    public function faculty()
    {
        return $this->belongsTo('App\Faculty', 'faculty_id', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function reader()
    {
        return $this->hasOne(Reader::class);
    }

    public function isReader()
    {
        return !is_null($this->reader);
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('is_active', 1);
    }

    public function getCreatedAtHumanAttribute()
    {
        $carbonDate = new Carbon($this->created_at);
        return $carbonDate->diffForHumans();
    }

    public static function getSubscribedUsers()
    {
        $subscribedReadersIds = Reader::subscribed()
            ->verified()
            ->pluck('user_id');
        return self::whereIn('id', $subscribedReadersIds)->get();
    }

    public function getWelcomeAttribute()
    {
        return 'WELCOME ' . strtoupper(($this->title ? $this->title . '. ' : '') . $this->name);
    }
    public function loginSecurity()
    {
        return $this->hasOne(LoginSecurity::class);
    }
}
