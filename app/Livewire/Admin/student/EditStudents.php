<?php

namespace App\Livewire\Admin\student;

use App\Models\student;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditStudents extends Component
{

    use WithFileUploads;
    #[Validate('required', message: 'فیلد نام الزامی است')]
    #[Validate('min:3', message: 'حداقل 3 کاراکتر')]
    #[Validate('max:20', message: 'حداکثر 20 کاراکتر')]
    #[Validate('regex:/^[\p{L} ]+$/u', message: 'فقط حروف مجاز است')]

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

    public $studentId;
    #[On('edit_student')]

    public function edit($id)
    {

        $students = student::findOrFail($id);

        $this->studentId = $id;
        $this->name = $students->name;
        $this->last_name = $students->last_name;
        $this->fname = $students->fname;
        $this->gname = $students->GFname;
        $this->job = $students->job;
        $this->image = $students->image;
        $this->phone_number = $students->phone_number;
        $this->Id_cart = $students->ID_Cart;
        $this->province = $students->province;
        Flux::modal('edit-student')->show();



    }

    public function update()
    {
        $student = student::find($this->studentId);

        $imageName = $student->image; // default to old
        $idCartName = $student->ID_Cart; // default to old

        // حذف عکس قبلی اگر عکس جدید آپلود شده باشد
        if ($this->image && is_object($this->image)) {
            if ($student->image && Storage::disk('public')->exists('students/' . $student->image)) {
                Storage::disk('public')->delete('students/' . $student->image);
            }

            $imageName = uniqid('img_') . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('students', $imageName, 'public');
        }

        // حذف ID کارت قبلی اگر جدید آپلود شده باشد
        if ($this->Id_cart && is_object($this->Id_cart)) {
            if ($student->ID_Cart && Storage::disk('public')->exists('id_carts/' . $student->ID_Cart)) {
                Storage::disk('public')->delete('id_carts/' . $student->ID_Cart);
            }

            $idCartName = uniqid('id_') . '.' . $this->Id_cart->getClientOriginalExtension();
            $this->Id_cart->storeAs('id_carts', $idCartName, 'public');
        }

        $student->update([
            'name' => $this->name,
            'fname' => $this->fname,
            'last_name' => $this->last_name,
            'GFname' => $this->gname,
            'job' => $this->job,
            'image' => $imageName,
            'phone_number' => $this->phone_number,
            'ID_Cart' => $idCartName,
            'province' => $this->province,
            'user_id' => Auth::user()->id
        ]);

        Flux::modal('edit-student')->close();
        session()->flash('success', 'شاگرد با موفقیت ویرایش شد');
        $this->redirectRoute('admin.students', navigate: true);
    }


    public function render()
    {
        return view('livewire.admin.student.edit-students');
    }
}
