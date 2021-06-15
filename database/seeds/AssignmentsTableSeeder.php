<?php

use Illuminate\Database\Seeder;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignments')->insert([[
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '9',
            'user_id'           => '5',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '6',
            'user_id'           => '12',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '7',
            'user_id'           => '13',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '8',
            'user_id'           => '14',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '10',
            'user_id'           => '15',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '1',
            'user_id'           => '7',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '2',
            'user_id'           => '8',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '3',
            'user_id'           => '9',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		],[
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '4',
            'user_id'           => '10',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		], [
            'begins' 			=> date('2021-05-11 12:50:20'),
	        'project_id' 		=> '5',
            'user_id'           => '11',
	        'description' 		=> 'assegnati progetti',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')		        
		]]);
    }
}
