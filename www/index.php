<body>
<?php
	include_once ("../autoload.php");
	
	use Turma3\Wrapper;
	
	$html.= '<h1>Categorias </h1';
	$html.= "<a href='?op=cad' title='Nova Categoria'> </a>";
	$html.= '</h1>';
	echo $html;
	$wrapper = new Wrapper();

	if (isset($_GET['op']))
	{
		switch ($_GET['op']) {
			case 'cad':
				include_once('addCat.php');
				break;
			case 'edi':
				include_once ('editCat.php');
				break;
			case 'del':
				include_once ('delCat.php');
				break;
		}
	}
	$res = $wrapper->listCats();
	$html = '<table>';
	if($res){
		foreach ($res as $key) {
			$html.= '<tr>';
				$html.= '<td> '.$key->nome;
				$html.="<span >";
				$html.='<a href="?op=edi&id='.$key->id.'">';
			
				$html.="</i>";
				$html.="</a>";				
				$html.='<a href="?op=del&id='.$key->id.'">';
				
				$html.="</i>";
				$html.="</a>";
				$html.="</span>";
				$html.='</td>';
			$html.= '</tr>';
		}
	}
	$html.= '</table>';
	echo $html;
	
?>



</body>