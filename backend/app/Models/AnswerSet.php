<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerSet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first',
        'second',
        'third',
        'fourth',
        'correct',
    ];

    /**
     * Get the question that relates to the answers.
     */
    public function question() {
        return $this->belongsTo(Question::class);
    }
}
