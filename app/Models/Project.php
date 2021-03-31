<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Generally take this approach
// php artisan make:model Project -mc
// to generate the model, the migration and the controller in one command
class Project extends Model
{
    use HasFactory;
}
