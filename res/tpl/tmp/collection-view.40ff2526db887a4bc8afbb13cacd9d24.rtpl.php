<?php if(!class_exists('raintpl')){exit;}?><div class="margin-top-20" style="text-align:center">
	<ul class="pagination" style="margin:0 auto">
		<li><a href="#">Prev</a></li>
		<?php $counter1=-1; if( isset($pages) && is_array($pages) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
		<?php if( $value1=='...' ){ ?>
		<li><a href="javascript:void(0)"><?php echo $value1;?></a></li>
		<?php }else{ ?>
		<li <?php if( $page == $value1 ){ ?>class="active"<?php } ?>><a href="?collection=<?php echo $collection;?>&limit=<?php echo $limit;?>&skip=<?php echo $value1*$limit;?>"><?php echo $value1;?></a></li>
		<?php } ?>
		<?php } ?>
		<li><a href="#">Next</a></li>
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Fields</th>
					<th>&nbsp</th>
					<th>&nbsp</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1; if( isset($rows) && is_array($rows) && sizeof($rows) ) foreach( $rows as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo $counter1+1;?></td>
					<td class="json-string"><?php echo $value1["name"];?></td>
					<td><?php echo $value1["fields"];?></td>
					<td><a href="document-edit.php?<?php echo $value1["id"];?>" class="btn btn-primary">Edit</button></td>
					<td><a onclick="return confirm('Are you sure you want to delete this document?')" href="document-delete.php?<?php echo $value1["id"];?>" class="btn btn-danger">Delete</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
			
		
	</div>
</div>

<div class="margin-top-20" style="text-align:center">
	<ul class="pagination" style="margin:0 auto">
		<li><a href="#">Prev</a></li>
		<?php $counter1=-1; if( isset($pages) && is_array($pages) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
		<?php if( $value1=='...' ){ ?>
		<li><a href="javascript:void(0)"><?php echo $value1;?></a></li>
		<?php }else{ ?>
		<li <?php if( $page == $value1 ){ ?>class="active"<?php } ?>><a href="?collection=<?php echo $collection;?>&limit=<?php echo $limit;?>&skip=<?php echo $value1*$limit;?>"><?php echo $value1;?></a></li>
		<?php } ?>
		<?php } ?>
		<li><a href="#">Next</a></li>
	</ul>
</div>

<link href="res/css/pretty-json.css" rel="stylesheet" type="text/css">
<script src="res/js/underscore-min.js"></script>
<script src="res/js/backbone-min.js"></script>
<script src="res/js/pretty-json-min.js"></script>
<script>
$(function(){

	$(".json-string").each(function(index, el){

		var json = $(el).text();
		var o = JSON.parse(json);

		var node = new PrettyJSON.view.Node({ 
	        el:$(el), 
	        data:o
	    });

	});

});
</script>