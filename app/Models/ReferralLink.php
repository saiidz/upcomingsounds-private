<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Ramsey\Uuid\Nonstandard\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReferralLink extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'referral_program_id'];

    // protected static function boot()
    // {
    //     static::creating(function (ReferralLink $model) {
    //         $model->generateCode();
    //     });
    // }

    private static function generateCode()
    {
        return (string)Uuid::uuid1();
    }

    public static function getReferral($user, $program)
    {
        $refferal     = ReferralLink::firstOrNew([
            'user_id' => $user->id,
        ]);
        $refferal->user_id=$user->id;
        $refferal->referral_program_id=$program->id;
        $refferal->code = ReferralLink::generateCode();
        $refferal->save();
        return $refferal;
    }

    public function getLinkAttribute()
    {
        $name = preg_replace(["/\s+/","/\//"], "", auth()->user()->name);
        return URL::to('/') . '/ref/' . $name . '/' .$this->code;
//        return URL::to('/') . '/ref/' . str_replace(' ', '', auth()->user()->name) . '/' .$this->code;
//        return url($this->program->uri) . '/' . $this->code;
        // return url($this->program->uri) . '?ref=' . $this->code;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        // TODO: Check if second argument is required
        return $this->belongsTo(ReferralProgram::class, 'referral_program_id');
    }

    public function relationships()
    {
        return $this->hasMany(ReferralRelationship::class);
    }
}
