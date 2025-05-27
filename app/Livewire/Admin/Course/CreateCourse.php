<?php

namespace App\Livewire\Admin\Course;

use App\Models\course;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCourse extends Component
{

    #[Validate('required', message: 'فیلد نام الزامی است')]
    #[Validate('min:5', message: 'حداقل 5 کاراکتر')]
    #[Validate('max:50', message: 'حداکثر 50 کاراکتر')]
    #[Validate('regex:/^[اآبپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی‌ ]+$/u', message: 'فقط حروف فارسی باشد ')]
    public $name;

#[Validate('required', message: 'فیلد توضیحات الزامی است')]
    #[Validate('min:10', message: 'حداقل 10 کاراکتر')]
    #[Validate('max:500', message: 'حداکثر 500 کاراکتر')]
    #[Validate('regex:/^[اآبپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی‌0‌1‌2‌3‌4‌5‌6‌7‌8‌9‌ ]+$/u', message: 'فقط حروف و اعداد فارسی مجاز است')]
    public $description;

#[On('edit')]
    public function editcourse($id){

       
    }

    public function save(){


        course::create([
            'name'=>$this->name,
            'description'=>$this->description,
            'user_id'=>Auth::user()->id

        ]);

        $this->reset('name','description');
        Flux::modal('create-course');
        session()->flash('success','کورس با موفقیت اضافه شد');
        $this->redirectRoute('course.index', navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.course.create-course');
    }
}
