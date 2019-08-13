<?php

use Illuminate\Database\Seeder;

use \App\CaseModel;

class CaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cases = ["Asphyria", "Meconium", "Dehydration", "Severe Pneumonia", "Malnutrition", "Asthma", "Diarrheal Diseases"];

    	$insert_cases = collect($cases)->map(function($case){
    		return [
    			'case'	=>	$case
    		];
    	})->toArray();

    	CaseModel::insert($insert_cases);
    }
}
