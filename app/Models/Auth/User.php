<?php

namespace App\Models\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Conversion\Conversion;
use App\Models\Culture\Culture;
use App\Models\Field\Consumption\Consumption;
use App\Models\Field\Field;
use App\Models\Field\Income\Income;
use App\Models\Field\Note\Note;
use App\Models\Field\Note\Problem;
use App\Models\Field\ProductQuantity\ProductQuantity;
use App\Models\Field\Rotation;
use App\Models\Field\Work\Work;
use App\Models\Field\Work\WorkPlan;
use App\Models\Field\Work\WorkStage;
use App\Models\Stock\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'born_in',
        'password',
        'gender',
        'role',
        'currency',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'born_in' => 'datetime'
        ];
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function cultures()
    {
        return $this->hasMany(Culture::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function promblems()
    {
        return $this->hasMany(Problem::class);
    }

    public function rotations()
    {
        return $this->hasMany(Rotation::class);
    }

    public function workPlans()
    {
        return $this->hasMany(WorkPlan::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function workStages()
    {
        return $this->hasMany(WorkStage::class);
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function productQuantities()
    {
        return $this->hasMany(ProductQuantity::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function conversions()
    {
        return $this->hasMany(Conversion::class);
    }


}
