<?php

Route::post('(:bundle)/retorno',function(){
	if ($_POST) {
  		PagSeguro\Retorno::verifica($_POST);
	}
});