<?php

namespace App\Livewire\Admin;

use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Browsershot\Browsershot;


class Student extends Component
{

    public $studnetId;

  use WithPagination;






    public function render()
    {

        $students=\App\Models\student::orderBy('created_at','desc')->with('users')
        ->paginate(5);
        return view('livewire.admin.student',[
            'students'=>$students,

        ]);
    }



    public function edit($id){

       $this->dispatch('edit_student',$id);
    }

    public function delete($id){

        $this->studnetId=$id;
        Flux::modal('delete_student')->show();

    }


    public function deleteStudent()
    {
        $student = \App\Models\student::findOrFail($this->studnetId); // ✅ درست با حرف بزرگ و بدون غلط املایی

        // حذف فایل تصویر
        if ($student->image && Storage::disk('public')->exists('students/' . $student->image)) {
            Storage::disk('public')->delete('students/' . $student->image);
        }

        // حذف فایل ID_Cart
        if ($student->ID_Cart && Storage::disk('public')->exists('id_carts/' . $student->ID_Cart)) {
            Storage::disk('public')->delete('id_carts/' . $student->ID_Cart);
        }

        // حذف رکورد
        $student->delete();

        session()->flash('success', 'شاگرد با موفقیت حذف شد');
        Flux::modal('delete_student')->close();

        $this->redirectRoute('admin.students', navigate: true);
    }

    private function base64Image($path)
    {
        if (!file_exists($path)) {
            return '';
        }

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    // خروجی تصویر PNG
    public function generateImage($id, $format = 'jpg')
    {
         // افزایش زمان اجرای PHP به 5 دقیقه

        $student = \App\Models\Student::findOrFail($id);
        $student->imageBase64 = $this->base64Image(public_path('storage/students/' . $student->image));
        $logoLeft = $this->base64Image(public_path('MCIT.jpg'));
        $logoRight = $this->base64Image(public_path('IMART.jpg'));
        $html = view('livewire.admin.student-card', compact('student', 'logoLeft', 'logoRight'))->render();

        $validFormats = ['png', 'jpg', 'webp'];


        $directory = storage_path('app/public/cards');


        $fileName = "card-{$student->id}.{$format}";
        $filePath = $directory . '/' . $fileName;


        try {
            Browsershot::html($html)
                ->setChromePath('C:\Program Files\Google\Chrome\Application\chrome.exe')
                ->windowSize(400, 500)
                ->showBackground()
                ->setOption('waitUntil', 'networkidle0')

                ->save($filePath);

           return response()->download($filePath);

        } catch (\Exception $e) {

            return response()->json(['error' => 'مشکل در ایجاد کارت: ' . $e->getMessage()], 500);
        }
    }






}
