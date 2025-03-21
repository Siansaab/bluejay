<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\authadmin;

Auth::routes();
Route::get('/', function () {
    return redirect()->route('login'); // Ensure 'login' route exists
});
Route::middleware(['auth',authadmin::class])->group(function(){
    
     

  Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

    Route::get('/department', [AdminController::class, 'department'])->name('department');
    Route::get('/department/add/', [AdminController::class, 'add_department'])->name('department-add');
    Route::post('/department/store/', [AdminController::class, 'department_store'])->name('department.store');
    Route::get('/department/edit/{id}', [AdminController::class, 'department_edit'])->name('department.edit');
    Route::put('/department/update/', [AdminController::class, 'department_update'])->name('department.update');
    Route::delete('/department/{id}/delete', [AdminController::class, 'department_delete'])->name('department.delete');


    Route::get('/acts_rules', [AdminController::class, 'acts_rules'])->name('Acts&Rules');
    Route::get('/library/add/', [AdminController::class, 'add_library'])->name('ActsRules_add');
    Route::post('/acts/store/', [AdminController::class, 'acts_store'])->name('acts.store');
    Route::get('/acts/edit/{id}',[AdminController::class,'acts_edit'])->name('acts.edit');
    Route::put('/acts/update/', [AdminController::class, 'acts_update'])->name('acts.update');
    Route::delete('/acts/{id}/delete', [AdminController::class, 'acts_delete'])->name('acts.delete');

    Route::get('/book', [AdminController::class, 'book'])->name('book');
    Route::get('/book/add/', [AdminController::class, 'add_book'])->name('book-add');
    Route::post('/book/store/', [AdminController::class, 'book_store'])->name('book.store');
    Route::get('/book/edit/{id}',[AdminController::class,'book_edit'])->name('book.edit');
    Route::put('/book/update/', [AdminController::class, 'book_update'])->name('book.update');
    Route::delete('/book/{id}/delete', [AdminController::class, 'book_delete'])->name('book.delete');

    Route::get('/circular', [AdminController::class, 'circular'])->name('circular');
    Route::get('/circular/add/', [AdminController::class, 'add_circular'])->name('circular-add');
    Route::post('/circular/store/', [AdminController::class, 'circular_store'])->name('circular.store');
    Route::get('/circular/edit/{id}',[AdminController::class,'circular_edit'])->name('circular.edit');
    Route::put('/circular/update/', [AdminController::class, 'circular_update'])->name('circular.update');
    Route::delete('/circular/{id}/delete', [AdminController::class, 'circular_delete'])->name('circular.delete');

    Route::get('/code', [AdminController::class, 'code'])->name('code');
    Route::get('/code/add/', [AdminController::class, 'add_code'])->name('code-add');
    Route::post('/code/store/', [AdminController::class, 'code_store'])->name('code.store');
    Route::get('/code/edit/{id}',[AdminController::class,'code_edit'])->name('code.edit');
    Route::put('/code/update/', [AdminController::class, 'code_update'])->name('code.update');
    Route::delete('/code/{id}/delete', [AdminController::class, 'code_delete'])->name('code.delete');

    Route::get('/coming-soon', [AdminController::class, 'comming'])->name('comming');
 
    Route::get('/format', [AdminController::class, 'format'])->name('format');
    Route::get('/format/add/', [AdminController::class, 'add_format'])->name('format-add');
    Route::post('/format/store/', [AdminController::class, 'format_store'])->name('format.store');
    Route::get('/format/edit/{id}',[AdminController::class,'format_edit'])->name('format.edit');
    Route::put('/format/update/', [AdminController::class, 'format_update'])->name('format.update');
    Route::delete('/format/{id}/delete', [AdminController::class, 'format_delete'])->name('format.delete');

    
    Route::get('/HQI', [AdminController::class, 'HQI'])->name('HQI');
    Route::get('/HQI/add/', [AdminController::class, 'add_HQI'])->name('HQI-add');
    Route::post('/HQI/store/', [AdminController::class, 'HQI_store'])->name('HQI.store');
    Route::get('/HQI/edit/{id}',[AdminController::class,'HQI_edit'])->name('HQI.edit');
    Route::put('/HQI/update/', [AdminController::class, 'HQI_update'])->name('HQI.update');
    Route::delete('/HQI/{id}/delete', [AdminController::class, 'HQI_delete'])->name('HQI.delete');

    Route::get('/legal', [AdminController::class, 'legal'])->name('legal');
    Route::get('/legal/add/', [AdminController::class, 'add_legal'])->name('legal-add');
    Route::post('/legal/store/', [AdminController::class, 'legal_store'])->name('legal.store');
    Route::get('/legal/edit/{id}',[AdminController::class,'legal_edit'])->name('legal.edit');
    Route::put('/legal/update/', [AdminController::class, 'legal_update'])->name('legal.update');
    Route::delete('/legal/{id}/delete', [AdminController::class, 'legal_delete'])->name('legal.delete');

    Route::get('/Procedures', [AdminController::class, 'Procedures'])->name('Procedures');
    Route::get('/Procedures/add/', [AdminController::class, 'add_Procedures'])->name('Procedures-add');
    Route::post('/Procedures/store/', [AdminController::class, 'Procedures_store'])->name('Procedures.store');
    Route::get('/Procedures/edit/{id}',[AdminController::class,'Procedures_edit'])->name('Procedures.edit');
    Route::put('/Procedures/update/', [AdminController::class, 'Procedures_update'])->name('Procedures.update');
    Route::delete('/Procedures/{id}/delete', [AdminController::class, 'Procedures_delete'])->name('Procedures.delete');


    Route::get('/Technical', [AdminController::class, 'Technical'])->name('Technical');
    Route::get('/Technical/add/', [AdminController::class, 'add_Technical'])->name('Technical-add');
    Route::post('/Technical/store/', [AdminController::class, 'Technical_store'])->name('Technical.store');
    Route::get('/Technical/edit/{id}',[AdminController::class,'Technical_edit'])->name('Technical.edit');
    Route::put('/Technical/update/', [AdminController::class, 'Technical_update'])->name('Technical.update');
    Route::delete('/Technical/{id}/delete', [AdminController::class, 'Technical_delete'])->name('Technical.delete');

    Route::get('/Category', [AdminController::class, 'Category'])->name('Category');
    Route::get('/Category/add/', [AdminController::class, 'add_Category'])->name('Category-add');
    Route::post('/Category/store/', [AdminController::class, 'Category_store'])->name('Category.store');
    Route::get('/Category/edit/{id}', [AdminController::class, 'Category_edit'])->name('Category.edit');
    Route::put('/Category/update/', [AdminController::class, 'Category_update'])->name('Category.update');
    Route::delete('/Category/{id}/delete', [AdminController::class, 'Category_delete'])->name('Category.delete');


    Route::get('/Employee', [AdminController::class, 'Employee'])->name('Employee');
    Route::get('/Employee/add/', [AdminController::class, 'add_Employee'])->name('Employee-add');
    Route::post('/Employee/store/', [AdminController::class, 'Employee_store'])->name('Employee.store');
    Route::get('/Employee/edit/{id}', [AdminController::class, 'Employee_edit'])->name('Employee.edit');
    Route::put('/Employee/update/', [AdminController::class, 'Employee_update'])->name('Employee.update');
    Route::delete('/Employee/{id}/delete', [AdminController::class, 'Employee_delete'])->name('Employee.delete');

    Route::get('/Client', [AdminController::class, 'Client'])->name('Client');
    Route::get('/Client/add/', [AdminController::class, 'add_Client'])->name('Client-add');
    Route::post('/Client/store/', [AdminController::class, 'Client_store'])->name('Client.store');
    Route::get('/Client/edit/{id}', [AdminController::class, 'Client_edit'])->name('Client.edit');
    Route::put('/Client/update/', [AdminController::class, 'Client_update'])->name('Client.update');
    Route::delete('/Client/{id}/delete', [AdminController::class, 'Client_delete'])->name('Client.delete');




});
 
