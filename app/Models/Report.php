<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'invoice_date',
        'invoice_number',
        'total_amount',
        'is_paid'
    ];

    /**
     * Get the user associated with the report.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tasks associated with the report.
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class)->withPivot([
            'hourly_rate',
            'hours_worked',
            'notes'
        ]);
    }
}
