<?php

namespace App\Http\Controllers;

use App\Models\Acts;
use App\Models\Book;
use App\Models\Category;
use App\Models\Circular;
use App\Models\Client;
use App\Models\Code;
use App\Models\Format;
use App\Models\Department;
use App\Models\Employee;
use App\Models\HQI;
use App\Models\Legal;
use App\Models\Procedures;
use App\Models\Technical;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PgSql\Lob;

class AdminController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function department()
    {
        $department = Department::orderBy('id', 'DESC')->paginate(10);
        return view('department', compact('department'));
    }
    public function add_department()
    {
        return view('department-add');
    }

 
public function department_store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:departments,slug', // Make sure it's checking 'departments' table
        'status' => 'required|in:active,deactive', // Ensure only 'active' or 'deactive' is allowed
    ]);

    $department = new Department();
    $department->name = $request->name;
    $department->slug = Str::slug($request->name);
    $department->status = $request->status; // Assigning status value

    // Save the department
    $department->save();

    return redirect()->route('department')->with('status', 'Department added successfully');
}


public function department_edit($id)
{
    $department = Department::findOrFail($id);
    return view('department-edit', compact('department'));
}


public function department_update(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:departments,slug,' . $request->id,
        'status' => 'required|in:active,deactive', // Ensure only 'active' or 'deactive' is allowed
    ]);

    // Find the brand by ID from the request
    $department = Department::findOrFail($request->id);  // Corrected to access id from the request

    // Update brand name and slug
    $department->name = $request->name;
    $department->slug = Str::slug($request->name);
    $department->status = $request->status;
  

    // Save the brand
    $department->save();

    // Redirect with a success message
    return redirect()->route('department')->with('status', 'Department updated successfully');
}

public function department_delete($id){
    $department_delete = Department::findOrFail($id); 
    
    $department_delete->delete();
    return redirect()->route('department')->with("status",'Department has been Delete Successfully');

}

public function acts_rules()
{
    $Acts = Acts::orderBy('id', 'DESC')->paginate(10);
    return view('Acts&Rules', compact('Acts'));
}

public function add_library()
{
    $acts = Acts::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('ActsRules_add',compact('acts','Department'));
}

 
 
public function acts_store(Request $request)
{
    $request->validate([
        
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' is used
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
    ]);

    $acts = new Acts();
   
    $acts->descrption = $request->descrption; // Fix description spelling
    $acts->status = $request->status;
    $acts->department_id = $request->department_id;

// Handle PDF file upload
if ($request->hasFile('pdf')) { // Ensure it matches the form input name
    $file = $request->file('pdf'); // Get the uploaded file
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('acts', $filename, 'public'); // Store in 'public' disk
    $acts->pdf = $filePath; // Save path in DB
}

    $acts->save();

    return redirect()->route('Acts&Rules')->with('status', 'acts_store added successfully');
}

public function acts_edit($id)
{
    $Acts = Acts::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('acts_edit', compact('Acts','Department'));
    
}


public function acts_update(Request $request)
{
    $request->validate([
        
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
    ]);

    $acts = Acts::findOrFail($request->id); // Fetch the existing record
   
    $acts->descrption = $request->descrption; // Fix description spelling
    $acts->status = $request->status;
    $acts->department_id = $request->department_id;

    // Handle PDF file update
    if ($request->hasFile('pdf')) { // Ensure correct name
        // Delete the old file if exists
        if ($acts->pdf && Storage::disk('public')->exists($acts->pdf)) {
            Storage::disk('public')->delete($acts->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('acts', $filename, 'public'); // Store in 'public' disk
        $acts->pdf = $filePath; // Save path in DB
    }

    $acts->save();

    return redirect()->route('Acts&Rules')->with('status', 'Act updated successfully');
}

public function acts_delete($id)
{
    $product = Acts::find($id);
    if (File::exists(public_path('storage/acts') . '/' . $product->pdf)) {
        File::delete(public_path('storage/acts') . '/' . $product->pdf);
    }
    
 

    $product->delete(); 
    return redirect()->route('Acts&Rules')->with('status', 'Act has been delete successfully');                                                                        
}
public function book()
{
    $Book = Book::orderBy('id', 'DESC')->paginate(10);
    return view('book', compact('Book'));
}
public function add_book()
{
    $book = Book::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('book_add',compact('book','Department'));



}


public function book_store(Request $request)
{
    $request->validate([
        
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' is used
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
    ]);

    $acts = new Book();
   
    $acts->descrption = $request->descrption; // Fix description spelling
    $acts->status = $request->status;
    $acts->department_id = $request->department_id;

// Handle PDF file upload
if ($request->hasFile('pdf')) { // Ensure it matches the form input name
    $file = $request->file('pdf'); // Get the uploaded file
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('book', $filename, 'public'); // Store in 'public' disk
    $acts->pdf = $filePath; // Save path in DB
}

    $acts->save();

    return redirect()->route('book')->with('status', 'book added successfully');
}

public function book_edit($id)
{
    $Book = Book::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('book_edit', compact('Book','Department'));
    
}


public function book_update(Request $request)
{
    $request->validate([
        
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
    ]);

    $book = Book::findOrFail($request->id); // Fetch the existing record
   
    $book->descrption = $request->descrption; // Fix description spelling
    $book->status = $request->status;
    $book->department_id = $request->department_id;

    // Handle PDF file update
    if ($request->hasFile('pdf')) { // Ensure correct name
        // Delete the old file if exists
        if ($book->pdf && Storage::disk('public')->exists($book->pdf)) {
            Storage::disk('public')->delete($book->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('book', $filename, 'public'); // Store in 'public' disk
        $book->pdf = $filePath; // Save path in DB
    }

    $book->save();

    return redirect()->route('book')->with('status', 'book updated successfully');
}

public function book_delete($id)
{
    $book = Book::find($id);
    if (File::exists(public_path('storage/book') . '/' . $book->pdf)) {
        File::delete(public_path('storage/book') . '/' . $book->pdf);
    }
    
 

    $book->delete(); 
    return redirect()->route('book')->with('status', 'book has been delete successfully');                                                                        
}



public function circular()
{
    $circular = Circular::orderBy('id', 'DESC')->paginate(10);
    return view('circular', compact('circular'));
}
public function add_circular()
{
    $circular = Circular::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('circular_add',compact('circular','Department'));



}


public function circular_store(Request $request)
{
    $request->validate([
        
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' is used
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
    ]);

    $circular = new Circular();
   
    $circular->descrption = $request->descrption; // Fix description spelling
    $circular->status = $request->status;
    $circular->department_id = $request->department_id;

// Handle PDF file upload
if ($request->hasFile('pdf')) { // Ensure it matches the form input name
    $file = $request->file('pdf'); // Get the uploaded file
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('circular', $filename, 'public'); // Store in 'public' disk
    $circular->pdf = $filePath; // Save path in DB
}

    $circular->save();

    return redirect()->route('circular')->with('status', 'circular added successfully');
}

public function circular_edit($id)
{
    $circular = Circular::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('circular_edit', compact('circular','Department'));
    
}


public function circular_update(Request $request)
{
    $request->validate([
        
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
    ]);

    $circular = Circular::findOrFail($request->id); // Fetch the existing record
   
    $circular->descrption = $request->descrption; // Fix description spelling
    $circular->status = $request->status;
    $circular->department_id = $request->department_id;

    // Handle PDF file update
    if ($request->hasFile('pdf')) { // Ensure correct name
        // Delete the old file if exists
        if ($circular->pdf && Storage::disk('public')->exists($circular->pdf)) {
            Storage::disk('public')->delete($circular->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('circular', $filename, 'public'); // Store in 'public' disk
        $circular->pdf = $filePath; // Save path in DB
    }

    $circular->save();

    return redirect()->route('circular')->with('status', 'circular updated successfully');
}

public function circular_delete($id)
{
    $circular = Circular::find($id);
    if (File::exists(public_path('storage/circular') . '/' . $circular->pdf)) {
        File::delete(public_path('storage/circular') . '/' . $circular->pdf);
    }
    
 

    $circular->delete(); 
    return redirect()->route('circular')->with('status', 'circular has been delete successfully');                                                                        
}




public function add_code()
{
    $code = Code::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('code_add',compact('code','Department'));



}


public function code_store(Request $request)
{
    $request->validate([
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' is used
        'status' => 'required|in:active,deactive',
        'department_id' => 'required', // Ensuring department exists
        'issuing_authority' => 'required|string|max:255', // New field validation
        'year_of_issue' => 'required|integer|min:1900|max:' . date('Y'), // Ensuring a valid year
    ]);
    
    $circular = new Code();
   
    $circular->descrption = $request->descrption; // Fix description spelling
    $circular->status = $request->status;
    $circular->department_id = $request->department_id;
    $circular->issuing_authority = $request->issuing_authority;
    $circular->year_of_issue = $request->year_of_issue;

// Handle PDF file upload
if ($request->hasFile('pdf')) { // Ensure it matches the form input name
    $file = $request->file('pdf'); // Get the uploaded file
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('code', $filename, 'public'); // Store in 'public' disk
    $circular->pdf = $filePath; // Save path in DB
}

    $circular->save();

    return redirect()->route('code')->with('status', 'Code added successfully');
}

public function code_edit($id)
{
    $code = Code::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('code_edit', compact('code','Department'));
    
}


public function code_update(Request $request)
{
    $request->validate([
        
        'descrption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
        'issuing_authority' => 'required|string|max:255', // New field validation
        'year_of_issue' => 'required|integer|min:1900|max:' . date('Y'), // Ensuring a valid year
        
    ]);

    $code = Code::findOrFail($request->id); // Fetch the existing record
   
    $code->descrption = $request->descrption; // Fix description spelling
    $code->status = $request->status;
    $code->department_id = $request->department_id;
    $code->issuing_authority = $request->issuing_authority;
    $code->year_of_issue = $request->year_of_issue;
    // Handle PDF file update
    if ($request->hasFile('pdf')) { // Ensure correct name
        // Delete the old file if exists
        if ($code->pdf && Storage::disk('public')->exists($code->pdf)) {
            Storage::disk('public')->delete($code->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('code', $filename, 'public'); // Store in 'public' disk
        $code->pdf = $filePath; // Save path in DB
    }

    $code->save();

    return redirect()->route('code')->with('status', 'code updated successfully');
}

public function code_delete($id)
{
    $code = Code::find($id);
    if (File::exists(public_path('storage/code') . '/' . $code->pdf)) {
        File::delete(public_path('storage/code') . '/' . $code->pdf);
    }
    
 

    $code->delete(); 
    return redirect()->route('code')->with('status', 'circular has been delete successfully');                                                                        
}



public function code()
{
    $code = Code::orderBy('id', 'DESC')->paginate(10);
    return view('code', compact('code'));
}

public function comming()
{
    return view('comming');
}









public function add_format()
{
    $code = Code::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('format_add',compact('code','Department'));



}


public function format_store(Request $request)
{
    $request->validate([
        'description' => 'nullable|string', // Fixed spelling mistake
        'format_no' => 'required|string|max:255', // New Format No. validation
        'revision' => 'required|string|max:255', // New Revision validation
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        'word_file' => 'nullable|mimes:doc,docx|max:2048', // Validate Word file
        'status' => 'required|in:active,deactive',
        'department_id' => 'required', // Ensuring department exists
        
    ]);
    
    $format = new Format();
   
    $format->description = $request->description;
    $format->format_no = $request->format_no;
    $format->revision = $request->revision;
    $format->status = $request->status;
    $format->department_id = $request->department_id;
    

    // Handle PDF file upload
    if ($request->hasFile('pdf')) {
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('format', $filename, 'public');
        $format->pdf = $filePath;
    }

    // Handle Word file upload
    if ($request->hasFile('word_file')) {
        $file = $request->file('word_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('format', $filename, 'public');
        $format->word_file = $filePath;
    }

    $format->save();

    return redirect()->route('format')->with('status', 'Format added successfully');
}


public function format_edit($id)
{
    $format = Format::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('format_edit', compact('format','Department'));
    
}

 

public function format_update(Request $request)
{
    $request->validate([
        'description' => 'nullable|string',
        'format_no' => 'required|string|max:255',
        'revision' => 'required|string|max:255',
        'pdf' => 'nullable|mimes:pdf|max:2048',
        'word_file' => 'nullable|mimes:doc,docx|max:2048',
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
        
    ]);

    $format = Format::findOrFail($request->id); // Fetch the existing record

    $format->description = $request->description;
    $format->format_no = $request->format_no;
    $format->revision = $request->revision;
    $format->status = $request->status;
    $format->department_id = $request->department_id;
   

    // Handle PDF file update
    if ($request->hasFile('pdf')) {
        // Delete the old file if it exists
        if ($format->pdf && Storage::disk('public')->exists($format->pdf)) {
            Storage::disk('public')->delete($format->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('code', $filename, 'public'); // Store in 'public' disk
        $format->pdf = $filePath;
    }

    // Handle Word file update
    if ($request->hasFile('word_file')) {
        // Delete the old Word file if it exists
        if ($format->word_file && Storage::disk('public')->exists($format->word_file)) {
            Storage::disk('public')->delete($format->word_file);
        }

        // Upload the new Word file
        $file = $request->file('word_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('code', $filename, 'public'); // Store in 'public' disk
        $format->word_file = $filePath;
    }

    $format->save();

    return redirect()->route('format')->with('status', 'Format updated successfully');
}


public function format_delete($id)
{
    $format = Format::find($id);
    if (File::exists(public_path('storage/code') . '/' . $format->pdf)) {
        File::delete(public_path('storage/code') . '/' . $format->pdf);
    }
     
    $format->delete(); 
    return redirect()->route('format')->with('status', 'circular has been delete successfully');                                                                        
}



public function format()
{
    $format = Format::orderBy('id', 'DESC')->paginate(10);
    return view('format', compact('format'));
}

public function add_HQI()
{
    $HQI = HQI::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('HQI_add',compact('HQI','Department'));



}


public function HQI_store(Request $request)
{
    $request->validate([
        'description' => 'nullable|string', // Fixed spelling mistake
        'revision_next' => 'required|string|max:255', // New Format No. validation
        'revision' => 'required|string|max:255', // New Revision validation
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        
        'status' => 'required|in:active,deactive',
        'department_id' => 'required', // Ensuring department exists
        
    ]);
    
    $format = new HQI();
   
    $format->description = $request->description;
    $format->revision_next = $request->revision_next;
    $format->revision = $request->revision;
    $format->status = $request->status;
    $format->department_id = $request->department_id;
    

    // Handle PDF file upload
    if ($request->hasFile('pdf')) {
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('HQI', $filename, 'public');
        $format->pdf = $filePath;
    }

    // Handle Word file upload
    

    $format->save();

    return redirect()->route('HQI')->with('status', 'HQI added successfully');
}


public function HQI_edit($id)
{
    $HQI = HQI::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('HQI_edit', compact('HQI','Department'));
    
}

 

public function HQI_update(Request $request)
{
    $request->validate([
        'description' => 'nullable|string',
        'revision_next' => 'required|string|max:255',
        'revision' => 'required|string|max:255',
        'pdf' => 'nullable|mimes:pdf|max:2048',
        
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
        
    ]);

    $HQI = HQI::findOrFail($request->id); // Fetch the existing record

    $HQI->description = $request->description;
    $HQI->revision_next = $request->revision_next;
    $HQI->revision = $request->revision;
    $HQI->status = $request->status;
    $HQI->department_id = $request->department_id;
   

    // Handle PDF file update
    if ($request->hasFile('pdf')) {
        // Delete the old file if it exists
        if ($HQI->pdf && Storage::disk('public')->exists($HQI->pdf)) {
            Storage::disk('public')->delete($HQI->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('HQI', $filename, 'public'); // Store in 'public' disk
        $HQI->pdf = $filePath;
    }

     

    $HQI->save();

    return redirect()->route('HQI')->with('status', 'HQI updated successfully');
}


public function HQI_delete($id)
{
    $HQI = HQI::find($id);
    if (File::exists(public_path('storage/HQI') . '/' . $HQI->pdf)) {
        File::delete(public_path('storage/HQI') . '/' . $HQI->pdf);
    }
     
    $HQI->delete(); 
    return redirect()->route('HQI')->with('status', 'HQI has been delete successfully');                                                                        
}



public function HQI()
{
    $HQI = HQI::orderBy('id', 'DESC')->paginate(10);
    return view('HQI', compact('HQI'));
}




public function add_legal()
{
    $legal = Legal::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('legal_add',compact('legal','Department'));



}


public function legal_store(Request $request)
{
    $request->validate([
        'type_of_document' => 'nullable|string', // Fixed spelling mistake
       
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        
        'status' => 'required|in:active,deactive',
        
        
    ]);
    
    $format = new Legal();
   
    $format->type_of_document = $request->type_of_document;
  
    $format->status = $request->status;
   
    

    // Handle PDF file upload
    if ($request->hasFile('pdf')) {
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('legal', $filename, 'public');
        $format->pdf = $filePath;
    }

    
    $format->save();

    return redirect()->route('legal')->with('status', 'legal added successfully');
}


public function legal_edit($id)
{
    $legal = Legal::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('legal_edit', compact('legal','Department'));
    
}

 

public function legal_update(Request $request)
{
    $request->validate([
        'type_of_document' => 'nullable|string',
     
        'pdf' => 'nullable|mimes:pdf|max:2048',
     
        'status' => 'required|in:active,deactive',
        
        
    ]);

    $legal = Legal::findOrFail($request->id); // Fetch the existing record

    $legal->type_of_document = $request->type_of_document;
    $legal->status = $request->status;
    
   

    // Handle PDF file update
    if ($request->hasFile('pdf')) {
        // Delete the old file if it exists
        if ($legal->pdf && Storage::disk('public')->exists($legal->pdf)) {
            Storage::disk('public')->delete($legal->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('legal', $filename, 'public'); // Store in 'public' disk
        $legal->pdf = $filePath;
    }

     

    $legal->save();

    return redirect()->route('legal')->with('status', 'legal updated successfully');
}


public function legal_delete($id)
{
    $legal = Legal::find($id);
    if (File::exists(public_path('storage/code') . '/' . $legal->pdf)) {
        File::delete(public_path('storage/code') . '/' . $legal->pdf);
    }
     
    $legal->delete(); 
    return redirect()->route('legal')->with('status', 'legal has been delete successfully');                                                                        
}



public function legal()
{
    $legal = Legal::orderBy('id', 'DESC')->paginate(10);
    return view('legal', compact('legal'));
}





public function add_Technical()
{
    $Technical = Technical::select('id')->orderBy('id')->get();
    $Department = Department::select('id','name')->orderBy('name')->get();
    return view('Technical_add',compact('Technical','Department'));



}

 

public function Technical_store(Request $request)
{
    $request->validate([
        'description' => 'nullable|string', // Fixed spelling mistake
        
        'revision' => 'required|string|max:255', // New Revision validation
        'pdf' => 'nullable|mimes:pdf|max:2048', // Ensure 'pdf' validation
        
        'status' => 'required|in:active,deactive',
        'department_id' => 'required', // Ensuring department exists
        
    ]);
    
    $Technical = new Technical();
   
    $Technical->description = $request->description;
  
    $Technical->revision = $request->revision;
    $Technical->status = $request->status;
    $Technical->department_id = $request->department_id;
    

    // Handle PDF file upload
    if ($request->hasFile('pdf')) {
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('Technical', $filename, 'public');
        $Technical->pdf = $filePath;
    }

    // Handle Word file upload
    

    $Technical->save();

    return redirect()->route('Technical')->with('status', 'Technical added successfully');
}


public function Technical_edit($id)
{
    $Technical = Technical::findOrFail($id);
    $Department = Department::select('id','name')->orderBy('name')->get();
    
return view('Technical_edit', compact('Technical','Department'));
    
}

 

public function Technical_update(Request $request)
{
    $request->validate([
        'description' => 'nullable|string',
         
        'revision' => 'required|string|max:255',
        'pdf' => 'nullable|mimes:pdf|max:2048',
        
        'status' => 'required|in:active,deactive',
        'department_id' => 'required',
        
    ]);

    $HQI = Technical::findOrFail($request->id); // Fetch the existing record

    $HQI->description = $request->description;
    
    $HQI->revision = $request->revision;
    $HQI->status = $request->status;
    $HQI->department_id = $request->department_id;
   

    // Handle PDF file update
    if ($request->hasFile('pdf')) {
        // Delete the old file if it exists
        if ($HQI->pdf && Storage::disk('public')->exists($HQI->pdf)) {
            Storage::disk('public')->delete($HQI->pdf);
        }

        // Upload the new file
        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('HQI', $filename, 'public'); // Store in 'public' disk
        $HQI->pdf = $filePath;
    }

     

    $HQI->save();

    return redirect()->route('Technical')->with('status', 'Technical updated successfully');
}


 public function Technical_delete($id)
{
    $Technical = Technical::find($id);
    if (File::exists(public_path('storage/Technical') . '/' . $Technical->pdf)) {
        File::delete(public_path('storage/Technical') . '/' . $Technical->pdf);
    }
     
    $Technical->delete(); 
    return redirect()->route('Technical')->with('status', 'Technical has been delete successfully');                                                                        
}



public function Technical()
{
    $Technical = Technical::orderBy('id', 'DESC')->paginate(10);
    return view('Technical', compact('Technical'));
}



public function Category()
    {
        $Category = Category::orderBy('id', 'DESC')->paginate(10);
        return view('Category', compact('Category'));
    }
    public function add_Category()
    {
        return view('Category-add');
    }

 
public function Category_store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:Categories,slug', // Make sure it's checking 'departments' table
        'status' => 'required|in:active,deactive', // Ensure only 'active' or 'deactive' is allowed
    ]);

    $department = new Category();
    $department->name = $request->name;
    $department->slug = Str::slug($request->name);
    $department->status = $request->status; // Assigning status value

    // Save the department
    $department->save();

    return redirect()->route('Category')->with('status', 'Category added successfully');
}


public function Category_edit($id)
{
    $Category = Category::findOrFail($id);
    return view('Category-edit', compact('Category'));
}


public function Category_update(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:Categories,slug,' . $request->id,
        'status' => 'required|in:active,deactive', // Ensure only 'active' or 'deactive' is allowed
    ]);

    // Find the brand by ID from the request
    $department = Category::findOrFail($request->id);  // Corrected to access id from the request

    // Update brand name and slug
    $department->name = $request->name;
    $department->slug = Str::slug($request->name);
    $department->status = $request->status;
  

    // Save the brand
    $department->save();

    // Redirect with a success message
    return redirect()->route('Category')->with('status', 'Category updated successfully');
}

public function Category_delete($id){
    $department_delete = Category::findOrFail($id); 
    
    $department_delete->delete();
    return redirect()->route('Category')->with("status",'Category has been Delete Successfully');

}


public function add_Employee()
{
    $Employee = Employee::select('id')->orderBy('id')->get();
    $Category = Category::select('id','name')->orderBy('name')->get();
    return view('Employee-add',compact('Employee','Category'));



}

 

public function Employee_store(Request $request)
{
    $request->validate([
        'category_id' => 'nullable|exists:categories,id', // Ensure category exists
        'employer_name' => 'required|string|max:255',
        'designation' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'mobile_no' => 'nullable|digits:10', // Ensure only 10-digit mobile numbers
        'email' => 'nullable|email|max:255',
        'residential_address' => 'nullable|string',
        
    ]);
    
    $Employee = new Employee();
    $Employee->category_id = $request->category_id;
    $Employee->employer_name = $request->employer_name;
    $Employee->designation = $request->designation;
    $Employee->location = $request->location;
    $Employee->mobile_no = $request->mobile_no;
    $Employee->email = $request->email;
    $Employee->residential_address = $request->residential_address;
    
     

    $Employee->save();

    return redirect()->route('Employee')->with('status', 'Employee added successfully');
}



public function Employee_edit($id)
{
    $Employee = Employee::findOrFail($id);
    $Category = Category::select('id','name')->orderBy('name')->get();
    
return view('Employee_edit', compact('Employee','Category'));
    
}

 

public function Employee_update(Request $request)
{
    $request->validate([
        'category_id' => 'nullable|exists:categories,id', // Ensure category exists
        'employer_name' => 'required|string|max:255',
        'designation' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'mobile_no' => 'nullable|digits:10', // Ensure only 10-digit mobile numbers
        'email' => 'nullable|email|max:255',
        'residential_address' => 'nullable|string',
        
    ]);

    $Employee = Employee::findOrFail($request->id); // Fetch the existing record

    $Employee->category_id = $request->category_id;
    $Employee->employer_name = $request->employer_name;
    $Employee->designation = $request->designation;
    $Employee->location = $request->location;
    $Employee->mobile_no = $request->mobile_no;
    $Employee->email = $request->email;
    $Employee->residential_address = $request->residential_address;
     
    $Employee->save();

    return redirect()->route('Employee')->with('status', 'Employee updated successfully');
}


 public function Employee_delete($id)
{
    $Employee = Employee::find($id);
    if (File::exists(public_path('storage/Employee') . '/' . $Employee->pdf)) {
        File::delete(public_path('storage/Employee') . '/' . $Employee->pdf);
    }
     
    $Employee->delete(); 
    return redirect()->route('Employee')->with('status', 'Employee has been delete successfully');                                                                        
}



public function Employee()
{
    $Employee = Employee::orderBy('id', 'DESC')->paginate(10);
    $Category = Category::select('id','name')->orderBy('name')->get();
    return view('Employee', compact('Employee','Category'));


 
}

public function add_Client()
{
    $Client = Client::select('id')->orderBy('id')->get();
  
    return view('Client-add',compact('Client'));
 
}
 


public function Client_edit($id)
{
    $Client = Client::findOrFail($id);
      
return view('Client_edit', compact('Client'));
    
}

 

public function Client_store(Request $request)
{
    $request->validate([
        'type' => 'required|string|max:255', // Added type as it's NOT NULL in the table
        'name' => 'required|string|max:255',
        'designation' => 'nullable|string|max:255',
        'organization_name' => 'required|string|max:255', // Matches table column
        'mobile_no' => 'required|digits:10', // Ensure only 10-digit numbers
        'email' => 'required|email|max:255',
        'location' => 'nullable|string|max:255',
        'official_address' => 'nullable|string',
    ]);

    $Client = new Client();
    $Client->type = $request->type;
    $Client->name = $request->name;
    $Client->designation = $request->designation;
    $Client->organization_name = $request->organization_name;
    $Client->mobile_no = $request->mobile_no;
    $Client->email = $request->email;
    $Client->location = $request->location;
    $Client->official_address = $request->official_address;

    $Client->save();

    return redirect()->route('Client')->with('status', 'Client added successfully');
}



 public function Client_delete($id)
{
    $Client = Client::find($id);
    
     
    $Client->delete(); 
    return redirect()->route('Client')->with('status', 'Client has been delete successfully');                                                                        
}



public function Client()
{
    $Client = Client::orderBy('id', 'DESC')->paginate(10);
  
    return view('Client', compact('Client'));


 
}

















}