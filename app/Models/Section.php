<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'landing_page_id',
        'section_number',
        'title',
        'subtitle',
        'image',
        'description',
        'bg_color'
    ];

    // Relasi ke LandingPage (Many-to-One)
    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
