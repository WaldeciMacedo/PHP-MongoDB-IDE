<?php if(!class_exists('raintpl')){exit;}?><div class="row">
	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Documents</th>
					<th>Database</th>
					<th>Server</th>
					<th>&nbsp</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1; if( isset($collections) && is_array($collections) && sizeof($collections) ) foreach( $collections as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo $counter1+1;?></td>
					<td><?php echo $value1["name"];?></td>
					<td><?php echo $value1["count"];?></td>
					<td><?php echo $value1["database"];?></td>
					<td><?php echo $value1["server"];?></td>
					<td style="width:150px"><a href="collection-view.php?collection=<?php echo $value1["id"];?>" class="btn blue">view</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>