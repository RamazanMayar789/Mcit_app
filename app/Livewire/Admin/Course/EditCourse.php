<?php

namespace App\Livewire\Admin\Course;

use App\Models\course;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class EditCourse extends Component
{

    public $name;
    public $description;
public $courseId;
    #[On('editcourse')]
 public function edit($id)
    {

        Flux::modal('edit-course')->show();
        $course = course::find($id);

$this->courseId = $id;
        if ($course) {
            $this->name = $course->name;
            $this->description = $course->description;
        }
        else {
            session()->flash('error', 'کورس یافت نشد');
            $this->redirectRoute('course.index',navigate:true);
        }
    }

    public function update(){

      $course=course::query()->where('id',$this->courseId);
      if($course){
       $course->update([
        'name'=>$this->name,
        'description'=>$this->description,
        'user_id'=>Auth::user()->id
       ]);
       session()->flash('success','کورس با موفقیت ویرایش شد ');
       Flux::modal('edit-course')->close();
       $this->redirectRoute('course.index',navigate:true);

      }else{
            session()->flash('error',' کورس یافت نشد');
            
      }
    }
    public function render()
    {
        return view('livewire.admin.course.edit-course');
    }
}
