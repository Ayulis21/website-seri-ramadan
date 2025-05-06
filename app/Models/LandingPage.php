<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'visitors',
        'product_id',
        'slug',
        'use_section_1',
        'section_1_title',
        'section_1_description',
        'section_1_media',
        'use_section_2',
        'section_2_title',
        'section_2_description',
        'section_2_media',
        'use_section_3',
        'section_3_title',
        'section_3_description',
        'section_3_media',
        'use_section_4',
        'section_4_title',
        'section_4_description',
        'section_4_media',
        'use_section_5',
        'section_5_title',
        'section_5_description',
        'section_5_media',
        'use_section_6',
        'section_6_title',
        'section_6_description',
        'section_6_media',
        'section_1_bg',
        'section_2_bg',
        'section_3_bg',
        'section_4_bg',
        'section_5_bg',
        'section_6_bg',
    ];

    public $timestamps = false;

    // Relasi One-to-Many: 1 LandingPage punya banyak Section
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}
