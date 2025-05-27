<?php

namespace App\Livewire\Admin\student;

use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class CreateStudents extends Component
{
    use WithFileUploads;




    #[Validate('required', message: 'فیلد نام الزامی است')]
    #[Validate('min:3', message: 'حداقل 3 کاراکتر')]
    #[Validate('max:20', message: 'حداکثر 20 کاراکتر')]
    #[Validate('regex:/^[اآبپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی‌ ]+$/u', message: 'فقط حروف فارسی باشد ')]

    public $last_name;
    #[Validate('required', message: 'فیلد نام الزامی است')]
    #[Validate('min:3', message: 'حداقل 3 کاراکتر')]
    #[Validate('max:20', message: 'حداکثر 20 کاراکتر')]
    #[Validate('regex:/^[اآبپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی‌ ]+$/u', message: 'فقط حروف فارسی باشد ')]

    public $name;
    #[Validate('required', message: 'فیلد نام پدر الزامی است')]
    #[Validate('min:3', message: 'حداقل 3 کاراکتر')]
    #[Validate('max:20', message: 'حداکثر 20 کاراکتر')]
    #[Validate('regex:/^[\p{L} ]+$/u', message: 'فقط حروف مجاز است')]
    public $fname;
    #[Validate('required', message: 'فیلد نام پدر کلان الزامی است')]
    #[Validate('min:3', message: 'حداقل 3 کاراکتر')]
    #[Validate('max:20', message: 'حداکثر 20 کاراکتر')]
    #[Validate('regex:/^[\p{L} ]+$/u', message: 'فقط حروف مجاز است')]
    public $gname;
    #[Validate('required', message: 'لطفا وطیفه شاگرد را بنوسید')]
    #[Validate('min:3', message: 'حداقل 3 کاراکتر')]
    #[Validate('max:20', message: 'حداکثر 20  کاراکتر')]
    #[Validate('regex:/^[\p{L} ]+$/u', message: 'فقط حروف مجاز است')]
    public $job;
    #[Validate('required', message: 'لطفا تصویر را انتخاب کنید')]
    #[Validate('image', message: 'فقط فایل های تصویری مجاز است')]
    #[Validate('mimes:jpeg,png,jpg', message: 'فقط فایل های با فرمت jpeg,png,jpg مجاز است')]
    #[Validate('max:2048', message: 'حداکثر حجم فایل 2MB است')]


    public $image;
    #[Validate('required', message: 'فیلد شماره تلیفون الزامی است')]
    #[Validate('regex:/^07[0-9]{8}$/', message: 'شماره تلیفون نامعتبر است')]
    #[Validate('min:9', message: 'حداقل 9 کاراکتر')]
    #[Validate('unique:students,phone_number', message: 'این شماره تلیفون قبلا ثبت شده است')]

    public $phone_number;
    #[Validate('required', message: 'لطفا تصویر را انتخاب کنید')]
    #[Validate('image', message: 'فقط فایل های تصویری مجاز است')]
    #[Validate('mimes:jpeg,png,jpg', message: 'فقط فایل های با فرمت jpeg,png,jpg مجاز است')]
    #[Validate('max:2048', message: 'حداکثر حجم فایل 2MB است')]


    public $Id_cart;
    #[Validate('required', message: 'فیلد نام ولایت  الزامی است')]
    #[Validate('min:3', message: 'حداقل 3 کاراکتر')]
    #[Validate('max:20', message: 'حداکثر 20 کاراکتر')]
    #[Validate('regex:/^[\p{L} ]+$/u', message: 'فقط حروف مجاز است')]

    public $province;


    public function save()
    {

        $this->validate();



        if ($this->image) {
            $imageName = uniqid('img_') . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('students', $imageName, 'public');
        }

        if ($this->Id_cart) {
            $idCartName = uniqid('id_') . '.' . $this->Id_cart->getClientOriginalExtension();
            $this->Id_cart->storeAs('id_carts', $idCartName, 'public');
        }

        Student::create([
            'name' => $this->name,
            'fname' => $this->fname,
            'GFname' => $this->gname,
            'job' => $this->job,
            'image' => $imageName,
            'phone_number' => $this->phone_number,
            'ID_Cart' => $idCartName,
            'province' => $this->province,
            'last_name' => $this->last_name,
            'user_id' => Auth::user()->id
        ]);
        $this->reset('name', 'fname', 'gname', 'job', 'image', 'phone_number', 'Id_cart', 'province', 'last_name');
        Flux::modal('create_student')->close();


        session()->flash('success', 'شاگرد جدید با موفقیت اضافه شد');

        $this->redirectRoute('admin.students', navigate: true);



    }



    public function render()
    {
        return view('livewire.admin.student.create-students');
    }
}
