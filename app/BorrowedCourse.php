<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowedCourse extends Model
{
    //
    protected $table = "borrowed_courses";
    protected $fillable = [
        'course_id', 'owner_id','dept_borrow_id','status'
    ];
}
