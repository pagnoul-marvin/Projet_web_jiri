<?php

namespace App\Models;

use App\Enums\ContactRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jiri extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'starting_at',
    ];

    protected function casts(): array
    {
        return [
            'starting_at' => 'date:Y-m-d H:i',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, Attendance::class);
    }

    public function students(): BelongsToMany
    {
        //withPivot permet de récupérer l'id de l'attendance du contact en question
        return $this->contacts()->withPivotValue('role', ContactRoles::Student->value)->withPivot('id');
    }

    public function evaluators(): BelongsToMany
    {
        return $this->contacts()->withPivotValue('role', ContactRoles::Evaluator->value)->withPivot('id');
    }

    public function attendances(): HasMany
    {
        return $this->HasMany(Contact::class,Attendance::class);
    }

    public function addStudent(Contact $contact): void
    {
        $this->contacts()->attach($contact, ['role' => 'student']);
    }

    public function addEvaluator(Contact $contact): void
    {
        $this->contacts()->attach($contact, ['role' => 'evaluator']);
    }

}
