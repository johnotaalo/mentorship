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
    			'site_id'	=>	1,
    			'outcome'	=>	'Triage System adopted and operational'
    		],
    		[
    			'site_id'	=>	1,
    			'outcome'	=>	'Children with cough or cold/diarrhoea are correctly classified'
    		],
    		[
    			'site_id'	=>	1,
    			'outcome'	=>	'Children with cough or cold/diarrhoea are correctly treated'
    		],
    		[
    			'site_id'	=>	1,
    			'outcome'	=>	'Pre-referral treatment given, effective referral mechanisms addressed'
    		],
    		[
    			'site_id'	=>	1,
    			'outcome'	=>	'Standard utilization of guidelines/protocols & job aids / Registers'
    		],
    		[
    			'site_id'	=>	1,
    			'outcome'	=>	'Other: indicate-',
    			'indicate'	=>	true
    		],
    		[
    			'site_id'	=>	2,
    			'outcome'	=>	'Correct skills in newborn resuscitation'
    		]
    	];

        \App\ExpectedOutcome::insert($outcomes);
    }
}
