<?php

namespace App\Livewire\Admin\Course;

use App\Models\course;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $courses = course::orderBy('created_at', 'ASC')->with('users')->paginate(5);
        return view('livewire.admin.course.index',[
            'courses'=>$courses
        ]);
    }
}
