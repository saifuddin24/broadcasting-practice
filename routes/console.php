<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\ConsoleOutput;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

$outputBuffer = new ConsoleOutput();

Artisan::command('inspire', function () {
    $this->comment( Inspiring::quote() );
})->purpose('Display an inspiring quote');

Artisan::command(
    'make:controller-with-blades {name} {--model=?} {--parent=?} {--resource=?} {--api=?} {--type=?} {--bladeDir=?} {--resourceName=?}',
    function( $name, $model, $parent, $resource, $api, $type, $bladeDir, $resourceName ){
        call_user_func_array([new CustomControllerMakeController, 'make_with_blades'], func_get_args() );
    })
    ->purpose('Creating controller class with required blades');

Artisan::command('se', function () use ( $outputBuffer ) {

    Artisan::call('serve',[
        '--port'  =>  8586,
        '--host'  =>  gethostbyname(trim(`hostname`))
    ], $outputBuffer );

})->purpose('Running server on port=8586, host=' . gethostbyname(trim(`hostname`)));
