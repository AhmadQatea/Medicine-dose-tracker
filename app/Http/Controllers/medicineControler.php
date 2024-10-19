<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class medicineControler extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }    // عرض جميع الأدوية الخاصة بالمستخدم
    public function index()
    {
        $medicines = Medicine::where('user_id', auth()->id())->get(); // استرجاع الأدوية الخاصة بالمستخدم
        return view('home', compact('medicines')); // تمرير المتغير إلى العرض
    }

    // عرض نموذج إنشاء دواء جديد
    public function create()
    {
        return view('medicines.create');
    }

    // تخزين دواء جديد
    public function store(Request $request)
    {
        // تحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'dosage_quantity' => 'required|integer',
            'dosage_unit' => 'required|string|max:50',
            'frequency_quantity' => 'required|integer',
            'frequency_unit' => 'required|string|max:50',
        ]);


        // إنشاء كائن جديد من نموذج Medicine
        $medicine = new Medicine();
        $medicine->name = $request->input('name');
        $medicine->dosage_quantity = $request->input('dosage_quantity');
        $medicine->dosage_unit = $request->input('dosage_unit');
        $medicine->frequency_quantity = $request->input('frequency_quantity');
        $medicine->frequency_unit = $request->input('frequency_unit');
        $medicine->user_id = auth()->id(); // تخزين id
        $medicine->save();

        return redirect()->route('home')->with('success', 'Medicine created successfully.');
    }

    // عرض دواء معين
    public function show(Medicine $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }

    // عرض نموذج تعديل دواء
    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    // تحديث دواء معين
    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dosage_quantity' => 'required|integer',
            'dosage_unit' => 'required|string|max:50',
            'frequency_quantity' => 'required|integer',
            'frequency_unit' => 'required|string|max:50',
        ]);

        $medicine->update($request->all());
        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    // حذف دواء معين
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
