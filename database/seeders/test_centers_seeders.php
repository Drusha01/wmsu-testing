<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class test_centers_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('INSERT INTO test_centers VALUES(NULL,"001","ALICIA","CIA",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"002","AURORA","ROR",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"003","BAYOG","YOG",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"004","BONGAO TAWI-TAWI","TAW",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"005","BUUG","BUG",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"006","CURUAN","RUA",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"007","DIPLAHAN","PLA",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"008","DIPOLOG","DIP",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"009","DUMINGAG","DUM",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"010","IMELDA ","IME",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"011","IPIL","IPI",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"012","ISABELA","BEL",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"013","JOLO","JOL",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"014","LABUAN","LBN",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"015","LAMITAN","MIT",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"016","MABUHAY","MAB",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"017","MALANGAS ","LAN",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"018","MARGOS","GOS",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"019","MOLAVE","AVE",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"020","OLUTANGA","NGA",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"021","PAGADIAN","PAG",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"022","SIASI","ASI",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"023","SIAY","SIA",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"024","SIBUCO","SUC",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"025","SINDANGAN","DAN ",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"026","SIOCON","CON",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"027","TUNGAWAN","TUN",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"028","VITALI","VIT",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"029","ZAMBOANGA CITY ","ZAM",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"030","ZAMBOANGA CITY - MAIN","OSY",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"031","MIDSALIP","MID",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"032","LABASAON ","",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"033","PITOGO","PIT",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"035","TAMPILISAN ","TAM",NOW(),NOW());');
        DB::statement('INSERT INTO test_centers VALUES(NULL,"036","KUMALARANG ","KUM",NOW(),NOW());');
    }
}
