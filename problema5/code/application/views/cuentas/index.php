<h2><?php echo $title; ?></h2>

<table class="table table-sm table-hover">
	<thead>
		<th class="text-center" scope="col">Id</th>
		<th class="text-center" scope="col">Tipo de Cuenta</th>
		<th class="text-center" scope="col">Saldo</th>
		<th class="text-center" scope="col">Departamento</th>
		<th class="text-center" scope="col">Id Persona</th>
	</thead>
	<tbody>
		
	<?php $this->load->helper('form'); ?>

	<?php foreach ($cuentas as $cuentas_item): ?>
	<tr>
		<th class="text-center"><?php echo $cuentas_item['id_cuenta_bancaria']; ?></th>
		<td class="text-center"><?php echo $cuentas_item['tipo_cuenta']; ?></td>
		<td class="text-center"><?php echo $cuentas_item['saldo']; ?></td>
		<td class="text-center"><?php echo $cuentas_item['departamento']; ?></td>
		<td class="text-center"><?php echo $cuentas_item['id_persona']; ?></td>
		<td><?php
		echo form_open('cuentas/delete', 'id="formEliminar'.$cuentas_item['id_cuenta_bancaria'].'"');
		echo form_hidden(array('id_cuenta_bancaria'=>$cuentas_item['id_cuenta_bancaria']));
		echo form_submit('mysubmit', 'Eliminar', 'form="formEliminar'.$cuentas_item['id_cuenta_bancaria'].'"');
		echo form_close(); ?></td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
