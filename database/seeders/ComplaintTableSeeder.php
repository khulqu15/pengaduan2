<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) { 
            $complaint = new Complaint();
            $complaint->user_id = $i;
            $complaint->name = 'Complaint '.$i;
            $complaint->nik = '12346789';
            $complaint->picture = null;
            $complaint->report = 'Lorem ipsum dolor sit amet';
            $complaint->save();
        }
    }
}
