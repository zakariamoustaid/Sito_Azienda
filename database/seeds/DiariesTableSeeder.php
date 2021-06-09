<?php

use Illuminate\Database\Seeder;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([[
            'today'             => date('2021-1-10 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '5',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-2-10 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '4',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '6',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-3-10 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '2',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '7',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-4-10 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '8',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-10 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '6',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '9',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-1-09 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '5',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '10',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-2-09 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '11',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-3-09 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '7',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '12',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-4-09 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '4',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '13',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-09 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '6',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '14',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-1-08 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '6',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '15',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-2-08 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '16',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-3-08 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '17',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-4-08 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '18',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-08 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '19',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-6-08 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '5',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-1-07 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '7',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '6',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-2-07 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '8',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '7',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-3-07 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '8',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-07 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '2',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '9',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-6-07 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '2',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '10',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-2-05 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '11',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-3-05 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '5',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '12',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-4-05 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '5',
	        'project_id' 	    => 'mitorosaria@koka.it',
            'user_id'           => '13',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
        ]]);
    }
}
