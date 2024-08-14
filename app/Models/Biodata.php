<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable =[
    'user_id',
    'nilai',
    'upload_kartu',
    'upload_resi',
    'keterangan'
    ];

  public function bioUser()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

}
