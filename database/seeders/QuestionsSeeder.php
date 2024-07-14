<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question' => 'Does your company have a drafted safety manual (CSM)? If so, please attach a copy of the document?',
                'type' => 'upload',
                'options' => []
            ],
            [
                'question' => 'Does your company safety manual specify the preventative measures for specific work practices to be implemented at the site to avoid heat-related illness during periods of high heat stress potential?',
                'type' => 'radio',
                'options' => [
                    'Yes',
                    'No'
                ]
            ],
            [
                'question' => 'Does the Safety Officer conducts checks on the Program using this checklist? Attach any past checklist.',
                'type' => 'upload',
                'options' => []

            ],
            [
                'question' => 'Does the Safety Officer check that Site Management, Supervisors, and Foremen know their responsibilities under heat stress, and does he provide training to these individuals?',
                'type' => 'upload',
                'options' => []
            ],
            [
                'question' => 'Are medical emergency contact numbers known by all employees?',
                'type' => 'radio',
                'options' => [
                    'Yes',
                    'No'
                ]
            ],
            [
                'question' => 'At what distance is the first aid kept in the work areas?',
                'type' => 'radio',
                'options' => [
                    '300 mtrs',
                    '200 mtrs',
                    '150 mtrs',
                ]
            ],
            [
                'question' => 'hat is the proportion of rest areas to the number of employees?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'Does the company have a tie-up with any nearby hospital for emergency situations',
                'type' => 'radio',
                'options' => [
                    'Yes',
                    'No'
                ]
            ],
            [
                'question' => 'Are employees made aware of the buddy system and its importance?',
                'type' => 'radio',
                'options' => [
                    'Yes',
                    'No'
                ]
            ],
            [
                'question' => 'Do you conduct and record toolbox talks regularly?',
                'type' => 'upload',
                'options' => []
            ],
            [
                'question' => 'Have all employees received training including heat stress prevention and first aid?',
                'type' => 'upload',
                'options' => []
            ],
            [
                'question' => 'How does your organization communicate heat stress danger categories and their corresponding control measures to employees as conditions change? Could you describe the methods used, such as color-coded flags, information signs etc.',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'How does refresher training sessions are conducted periodically within your organization? How frequently are these sessions held?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'Does posters are provided in workplace areas in all languages spoken by employees?',
                'type' => 'radio',
                'options' => [
                    'Yes',
                    'No'
                ]
            ],
            [
                'question' => 'How are the discussions related to heat stress are conducted during weekly meetings? If available, could you attach any records that document these discussions?',
                'type' => 'upload',
                'options' => []
            ],
            [
                'question' => 'What specific measures does your organization implement to address heat stress concerns during Ramadan?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'How does your organization address and record concerns and suggestions from employees?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'How does your company monitor weather conditions and heat stress levels to assess the current heat index?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'Name the monitoring equipment used? Attach any recent records of the same.',
                'type' => 'upload',
                'options' => []
            ],

            [
                'question' => 'How do you obtain heat stress danger category?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'How are heat stress danger categories and corresponding control measures promptly communicated to employees?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'How is work scheduling managed during the summer months?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'Are work and rest rotations provided based on the current heat index at the work site?',
                'type' => 'radio',
                'options' => [
                    'Yes',
                    'No'
                ]
            ],
            [
                'question' => 'What measures are implemented to take care employees from high humidity during the second work shift of the day?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'Could you describe how your organization implements deliberate acclimatization for new employees to gradually expose them to working in a hot environment? Specifically, how is the exposure level increased over the initial days of acclimatization?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What is the maximum distance allowed for designated shaded break/rest areas from personnel working in direct sunlight for extended periods of time?',
                'type' => 'radio',
                'options' => [
                    '100 mtrs',
                    '200 mtrs',
                    '150 mtrs',
                ]
            ],
            [
                'question' => 'What measures should be taken to reduce heat stress when the temperature is less than 37°C (99°F) body temperature?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'How can we provide cooling for confined spaces and similar enclosed work areas when the ambient temperature exceeds 43°C (110°F)?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What is the required maximum distance for locating ample supplies of cool drinking water from each worker and all designated break/rest areas?',
                'type' => 'radio',
                'options' => [
                    '100 mtrs',
                    '200 mtrs',
                    '150 mtrs',
                ]
            ],
            [
                'question' => 'What provisions should employers make for employees to cool their bodies during periods of high heat stress potential?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What measures should be taken to ensure that workers stay hydrated and their food remains chilled?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What type of clothing should be worn when working in direct sunlight to ensure maximum protection and comfort?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What additional items workers can wear to ensure safety and comfort while working in direct sunlight?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'How can we ensure communication for employees at emergency?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What medical measures should be taken if an employee exhibits symptoms of a heat- related illness?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What actions should be taken to properly treat someone experiencing severe heat exhaustion or heat stroke?',
                'type' => 'textarea',
                'options' => []
            ],
            [
                'question' => 'What are the essential recovery steps required for someone who has experienced severe heat stroke or heat exhaustion?',
                'type' => 'textarea',
                'options' => []
            ]

        ];

        foreach ($questions as $question) {
            $questionId = DB::table('questions')->insertGetId([
                'question' => $question['question'],
                'type' => $question['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($question['type'] === 'radio') {
                foreach ($question['options'] as $option) {
                    DB::table('options')->insert([
                        'question_id' => $questionId,
                        'option' => $option,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
