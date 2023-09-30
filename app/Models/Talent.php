<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Talent extends Model
{
    use HasFactory;

    protected $table = 'talents';

    protected $fillable = [
        'user_id',
        'location_city',
        'location_state',
        'institution_type',
        'position',
        'years_of_experience',
        'contract_type',
        'contract_start_date',
        'drivers_license_necessary',
        'location_city',
        'location_state',
        'firstname',
        'lastname',
        'uuid',
        'id',
        'match_percentage',
        'profile_pic'
    ];


    public function user()
    {
        return User::where('id', $this->user_id)->get()->first();
    }

    public function shortName()
    {
        return $this->firstname[0] . ". " . $this->lastname[0] . ".";
    }

    public function location()
    {
        return $this->location_city . ", " . $this->location_state;
    }

    public function startDateFormatted()
    {
        $startDate = $this->contract_start_date;
        if ($startDate == '0000-00-00') {
            $startDate = "sofort";
        }
        return $startDate;
    }

    public function isSaved()
    {
        $isSaved = false;
        $talentStatus = TalentStatus::where([
            ['talent_id', $this->id],
            ['object_status_id', 3],
        ])->get()->first();
        if ($talentStatus) {
            $isSaved = true;
        }
        return $isSaved;
    }

    public function isInvited()
    {
        $isInvited = false;
        $talentStatus = TalentStatus::where([
            ['talent_id', $this->id],
            ['object_status_id', 4],
        ])->get()->first();
        if ($talentStatus) {
            $isInvited = true;
        }
        return $isInvited;
    }

    public function hasAcceptedInvite() {
        $hasAcceptedInvite = false;
        $talentStatus = TalentStatus::where([
            ['talent_id', $this->id],
            ['object_status_id', 5],
        ])->get()->first();
        if ($talentStatus) {
            $hasAcceptedInvite = true;
        }
        return $hasAcceptedInvite;
    }

    public function invitation() {
        $talentStatus = TalentStatus::where([
            ['talent_id', $this->id],
            ['object_status_id', 4],
        ])->get()->first();
        return $talentStatus;
    }

    public function match() {
        $talentStatus = TalentStatus::where([
            ['talent_id', $this->id],
            ['object_status_id', 5],
        ])->get()->first();
        return $talentStatus;
    }

    
}
