<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyProfile extends Model
{
    use HasFactory;

    // Define the table associated with the model if it's not the plural of the model name
    protected $table = 'family_profiles';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Indicate if the IDs are auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key if it's not an integer
    protected $keyType = 'int';

    // Enable or disable the timestamps (created_at, updated_at)
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'name',
        'sex',
        'age',
        'birthdate',
        'civilstatus',
        'religion',
        'educAttainment',
        'occupation',
        'tenurestatus',
        'typeOfDwelling',
        'watersource',
        'toiletFacility',
        'housing_materials',
        '4ps',
        'is_approved',
    ];

    // Define any relationships (e.g., belongsTo, hasMany) if applicable
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Example of a local scope for filtering approved inhabitants
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    // Accessor to format the inhabitant's full name
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

    // Mutator for birthdate to automatically convert to Carbon instance
    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = \Carbon\Carbon::parse($value);
    }
}
