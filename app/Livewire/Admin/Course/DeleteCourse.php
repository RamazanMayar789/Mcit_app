<?php

namespace App\Livewire\Admin\Course;

use App\Models\course;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteCourse extends Component
{

    public $courseId;

    #[On('deletecourse')]
    public function delete($id){

        Flux::modal('delete_course')->show();

        $this->courseId=$id;

    }
    public function deletecourse(){

          $course=course::query()->where('id',$this->courseId);

          if($course){
            $course->delete();
            Flux::modal('delete_course')->close();
            session()->flash('success','کورس موفقانه حذف شد !');
            $this->redirectRoute('course.index',navigate:true);

          }else{

            session()->flash('error','کورس یافت نشد ');
          }
    }


    public function render()
    {
        return view('livewire.admin.course.delete-course');
    }
}
