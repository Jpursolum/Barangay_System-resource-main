<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgyInhabitant extends Model
{
    use HasFactory;

    // Define the table associated with the model if it's not the plural of the model name
    protected $table = 'brgy_inhabitants';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Indicate if the IDs are auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key if it's not an integer
    protected $keyType = 'int';

    // Enable or disable the timestamps (created_at, updated_at)
    public $timestamps = true;

    // Define the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'lastname',
        'firstname',
        'middlename',
        'age',
        'birthdate',
        'purok',
        'placeofbirth',
        'sex',
        'civilstatus',
        'positioninFamily',
        'citizenship',
        'educAttainment',
        'occupation',
        'ofw',
        'pwd',
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

    // Auto-capitalize the first letter of specified fields when creating or updating the model
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->capitalizeFields();
        });

        static::updating(function ($model) {
            $model->capitalizeFields();
        });
    }

    // Method to capitalize the first letter of specified fields
    protected function capitalizeFields()
    {
        $this->firstname = ucfirst(strtolower($this->firstname));
        $this->middlename = ucfirst(strtolower($this->middlename));
        $this->lastname = ucfirst(strtolower($this->lastname));
        $this->placeofbirth = ucfirst(strtolower($this->placeofbirth));
        $this->purok = ucfirst(strtolower($this->purok));
        $this->occupation = ucfirst(strtolower($this->occupation));
    }
}
