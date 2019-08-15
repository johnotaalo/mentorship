<?php

use Illuminate\Database\Seeder;

class ExpectedOutcomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$outcomes = [
    		[
    			'topics_id'	=>	1,
    			'outcome'	=>	'Triage System adopted and operational',
    			'indicate'	=>	false
    		],
    		[
    			'topics_id'	=>	2,
    			'outcome'	=>	'Children with cough or cold/diarrhoea are correctly classified',
    			'indicate'	=>	false
    		],
    		[
    			'topics_id'	=>	3,
    			'outcome'	=>	'Children with cough or cold/diarrhoea are correctly treated',
    			'indicate'	=>	false
    		],
    		[
    			'topics_id'	=>	4,
    			'outcome'	=>	'Pre-referral treatment given, effective referral mechanisms addressed',
    			'indicate'	=>	false
    		],
    		[
    			'topics_id'	=>	5,
    			'outcome'	=>	'Standard utilization of guidelines/protocols & job aids / Registers',
    			'indicate'	=>	false
    		],
    		[
    			'topics_id'	=>	6,
    			'outcome'	=>	'Other: indicate-',
    			'indicate'	=>	true
    		],
    		[
    			'topics_id'	=>	7,
    			'outcome'	=>	'Correct management of children with respiratory distress',
    			'indicate'	=>	false
    		],
            [
                'topics_id' =>  8,
                'outcome'   =>  'Correct management of neonatal sepsis',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  9,
                'outcome'   =>  'Correct management of prematurity ',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  10,
                'outcome'   =>  'Correct management of neonatal jaundice ',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  11,
                'outcome'   =>  'Standard utilization of protocol / job aids / Registers / Inpatient files',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  12,
                'outcome'   =>  'Other: indicate-',
                'indicate'  =>  true
            ],
            [
                'topics_id' =>  13,
                'outcome'   =>  'Correct management of airway, breathing, circulation & disability',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  14,
                'outcome'   =>  'Correct classification & treatment of severe pneumonia',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  15,
                'outcome'   =>  'Correct management of shock/severe dehydration',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  16,
                'outcome'   =>  'Correct management of severe acute malnutrition',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  17,
                'outcome'   =>  'Correct management of severe malaria',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  18,
                'outcome'   =>  'Standard utilization of protocol / job aids / Registers / Inpatient files',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  19,
                'outcome'   =>  'Other: indicate-',
                'indicate'  =>  true
            ],
            [
                'topics_id' =>  20,
                'outcome'   =>  'Correct skills in newborn resuscitation',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  21,
                'outcome'   =>  'Facility KMC Compliant',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  22,
                'outcome'   =>  'Correct skills in fluid management & counseling on newborn feeding',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  23,
                'outcome'   =>  'Correct skills in cord care',
                'indicate'  =>  false
            ],
            [
                'topics_id' =>  24,
                'outcome'   =>  'Standard utilization of protocol / job aids / Registers / Inpatient files',
                'indicate'  =>  false
            ]
    	];

        \App\ExpectedOutcome::truncate();
        \App\ExpectedOutcome::insert($outcomes);
    }
}
