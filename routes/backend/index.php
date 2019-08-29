<?php

Route::group(['prefix' => ''], function () {
    
    #to find another routes files
    $dir = base_path('routes/backend');

    #scan file to dir
    $files = scandir( $dir );

    foreach( $files as $file ){
        if ( ! in_array( $file, array( '.','..', 'index.php' ) ) ) {
            # code...
            require $dir. '/'.$file;
        }
    }
});