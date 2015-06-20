
<div class="categorias">
	<table>
		<thead>
			<th>Categoria</th>
			<th>Alterar</th>
			<th>Exluir</th>
		</thead>
		<tbody>
			<?php
			include ("../controller/CategoriaController.php");
			
			$resultado = listarCategorias ();
			while ( $categoria = $resultado->fetch_array ( MYSQL_ASSOC ) ) {
				echo "<tr id='categoria-" . $categoria [Categoria::$CAMPO_ID] . "'>";
				echo "<td>";
				echo $categoria [Categoria::$CAMPO_DESCRICAO];
				echo "</td>";
				echo "<td width='16px'>
							<a href='#' onClick='editar(" . $categoria [Categoria::$CAMPO_ID] . ")'>
								<img class='link_edit' src='../Resources/Imagens/edit.png' />
							</a>
						 </td>
						 <td width='16px'>
							<a href='#' onClick='deletar(" . $categoria [Categoria::$CAMPO_ID] . ")'>
								<img class='link_delete' src='../Resources/Imagens/delete.png' />
							</a>
						 </td>";
				echo "</tr>";
			}
			?>
		
		
		
		<tbody>
	
	</table>
</div>

