<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([[
            'ragione_sociale'   => 'Koka SPA',
	        'name_ref' 		    => 'Rosaria',
            'surname_ref'       => 'Mito',
	        'email_ref' 	    => 'mitorosaria@koka.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'ragione_sociale'   => 'Rolq SRL',
	        'name_ref' 		    => 'Marco',
            'surname_ref'       => 'Lumi',
	        'email_ref' 	    => 'lumi44@rolq.com',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
		], [
            'ragione_sociale'   => 'Magia SRL',
	        'name_ref' 		    => 'Gianna',
            'surname_ref'       => 'Lillini',
	        'email_ref' 	    => 'lillinigianna@magia.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
        ],
        [
            'ragione_sociale'   => 'Lisp SPA',
	        'name_ref' 		    => 'Walter',
            'surname_ref'       => 'Uait',
	        'email_ref' 	    => 'uait77@lisp.com',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')
        ]]);
    }
}
