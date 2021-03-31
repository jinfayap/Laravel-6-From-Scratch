<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// writing code to complete the assignment
// we used php artisan tinker as code playground
/* 
 $assignment = new App\Models\Assignment;
$assignment->body = 'Finish school work';
$assignment->save();
App\Models\Assignment::all();
 App\Models\Assignment::first();
 App\Models\Assignment::where('complete_at', false)->get();
*/

class Assignment extends Model
{
    use HasFactory;

    public function complete() {
        $this->complete_at = true;
        $this->save();
    }
}
