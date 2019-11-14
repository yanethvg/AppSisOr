<?php
Route::group(['middleware'=>'auth','prefix' => 'pacientes'], function () {
    Route::get('/', 'PacienteController@index')->name('pacientes.index');
    Route::get('/list','PacienteController@list')->name('pacientes.list');
    Route::get('/create', 'PacienteController@create')->name('pacientes.create');
    Route::get('/calcularEdad', 'PacienteController@calcularEdad')->name('pacientes.edad');
    Route::post('/', 'PacienteController@store')->name('pacientes.store');
    Route::get('/{id}/edit', 'PacienteController@edit')->name('pacientes.edit');
    Route::put('/update/{id}','PacienteController@update')->name('pacientes.update');
    Route::get('/{id}','PacienteController@show')->name('pacientes.show');
});

?>
