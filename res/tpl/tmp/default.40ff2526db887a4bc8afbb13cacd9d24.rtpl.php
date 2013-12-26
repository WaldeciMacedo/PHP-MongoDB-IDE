<?php if(!class_exists('raintpl')){exit;}?><div class="row">
	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Server</th>
					<th>Database</th>
					<th>User</th>
					<th>&nbsp</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1; if( isset($connections) && is_array($connections) && sizeof($connections) ) foreach( $connections as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo $counter1+1;?></td>
					<td><?php echo $value1["server"];?></td>
					<td><?php echo $value1["database"];?></td>
					<td><?php if( $value1["user"] ){ ?><?php echo $value1["user"];?><?php }else{ ?>anonymous<?php } ?></td>
					<td style="width:300px"><a href="connect.php?<?php echo $value1["id"];?>" class="btn btn-success">Connect</a>&nbsp<a onclick="return confirm('Are you sure you want to delete this connection?')" href="connect-remove.php?<?php echo $value1["id"];?>" class="btn btn-danger">Remove</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>