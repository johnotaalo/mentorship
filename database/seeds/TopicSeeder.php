<?php

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
        	[
        		'site_id'	=>	1,
        		'topic'		=>	'Traige of sick children & Emergency response',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	1,
        		'topic'		=>	'Classification of Pneumonia & diarrhoea',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	1,
        		'topic'		=>	'Treatment of pneumonia & diarrhoea',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	1,
        		'topic'		=>	'Pre-referral care, referral mechanisms',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	1,
        		'topic'		=>	'Sensitization on IMNCI guidelines / Protocols / Job aids / Registers',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	1,
        		'topic'		=>	'Other topics / subtopics: Indicate-',
        		'indicate'	=>	true
        	],[
        		'site_id'	=>	3,
        		'topic'		=>	'Newborn resuscitation',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	3,
        		'topic'		=>	'Neonatal sepsis',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	3,
        		'topic'		=>	'Prematurity',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	3,
        		'topic'		=>	'Neonatal Jaundice',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	3,
        		'topic'		=>	'Sensitization on Protocols / Job aids / Registers / Inpatient files',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	3,
        		'topic'		=>	'Other topics / subtopics: Indicate-',
        		'indicate'	=>	true
        	],[
        		'site_id'	=>	2,
        		'topic'		=>	'Triage - ABCD',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	2,
        		'topic'		=>	'Management of severe pneumonia',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	2,
        		'topic'		=>	'Management of shock/ severe dehydration / hypovolaemic shock',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	2,
        		'topic'		=>	'Management of severe acute malnutrition',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	2,
        		'topic'		=>	'Management of severe malaria',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	2,
        		'topic'		=>	'Sensitization on Protocols / Job aids / Registers / Inpatient files',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	2,
        		'topic'		=>	'Other topics / subtopics: Indicate-',
        		'indicate'	=>	true
        	],[
        		'site_id'	=>	4,
        		'topic'		=>	'Newborn resuscitation',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	4,
        		'topic'		=>	'KMC',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	4,
        		'topic'		=>	'Fluid management & newborn feeding',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	4,
        		'topic'		=>	'Cord care',
        		'indicate'	=>	false
        	],[
        		'site_id'	=>	4,
        		'topic'		=>	'Sensitization on Protocols / Job aids / Registers / Inpatient files',
        		'indicate'	=>	false
        	]
        ];

        \App\Topic::truncate();
        \App\Topic::insert($topics);
    }
}
