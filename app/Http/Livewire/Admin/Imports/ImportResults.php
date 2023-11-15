<?php

namespace App\Http\Livewire\Admin\Imports;

use Livewire\Component;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportResults implements ToCollection

{
    public function collection(Collection $rows)
    {
        dd($rows);
        foreach ($rows as $row) 
        {
            // User::create([
            //     'name' => $row[0],
            // ]);
        }
    }
}



