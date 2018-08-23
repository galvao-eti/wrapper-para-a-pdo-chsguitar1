<?php

	if (isset($_GET['id'])){
		$res = $wrapper->buscaCategoria($_GET['id']);		
    }
    
	if ($_POST){
		$wrapper->updateCat($res->id, $_POST['categoria']);
		
	}
?>

<form method="post" autocomplete="off">
	<input type="text" name="categoria" required="required" value="<?=$res->nome;?>">
	<button type="submit" title="atualizar"><i class="fas fa-sync-alt"></i></button>
</form>