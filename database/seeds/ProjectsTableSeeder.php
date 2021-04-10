<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([[
            'name' 			    => 'Project Mars',
	        'description' 		=> 'Creazione gestionale',
            'note'              => 'molto impegnativo',
	        'begin' 		    => date('2021-4-10 12:50:20'),
	        'p_end' 		    => date('2021-4-30 12:50:20'),
            'customer_id' 		=> "1",
            'cost' 		        => "5.50",
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'name' 			    => 'Project Pluto',
	        'description' 		=> 'Creazione sito',
            'note'              => 'molto simpatici',
	        'begin' 		    => date('2021-4-10 12:50:20'),
	        'p_end' 		    => date('2021-4-30 12:50:20'),
            'customer_id' 		=> "2",
            'cost' 		        => "5.50",
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')	
		], [
            'name' 			    => 'Project Jupiter',
	        'description' 		=> 'Creazione gestionale',
            'note'              => 'easy',
	        'begin' 		    => date('2021-4-10 12:50:20'),
	        'p_end' 		    => date('2021-4-30 12:50:20'),
            'customer_id' 		=> "3",
            'cost' 		        => "5.50",
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		
        ],
        [
            'name' 			    => 'Project Venus',
	        'description' 		=> 'Creazione website',
            'note'              => 'selezionare utenti con attenzione',
	        'begin' 		    => date('2021-4-10 12:50:20'),
	        'p_end' 		    => date('2021-4-30 12:50:20'),
            'customer_id' 		=> "4",
            'cost' 		        => "5.50",
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		
        ]]);
    }
}
