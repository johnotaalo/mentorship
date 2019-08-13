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
    			'outcome'	=>	'Correct skills in newborn resuscitation',
    			'indicate'	=>	false
    		]
    	];

        \App\ExpectedOutcome::insert($outcomes);
    }
}
