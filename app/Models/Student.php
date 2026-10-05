<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $nis
 * @property string $name
 * @property string $gender
 * @property string $major
 * @property string $class
 */
#[Fillable(['nis', 'name', 'gender', 'major', 'class'])]
class Student extends Model
{
}
