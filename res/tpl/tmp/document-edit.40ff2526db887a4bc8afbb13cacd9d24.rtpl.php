<?php if(!class_exists('raintpl')){exit;}?><div class="row">
	<div class="col-md-12">
		<?php if( $msg_success ){ ?>
		<div class="note note-success">
			<h4 class="block">Success</h4>
			<p><?php echo $msg_success;?></p>
		</div>
		<script>
		$(function(){
			$(".note-success").delay(3000).slideUp();
		});
		</script>
		<?php } ?>
		<form action="document-edit-save.php" method="post" class="form-horizontal">
			<input type="hidden" name="__collection_name" value="<?php echo $collection;?>">
			<div class="form-body">
				<?php $counter1=-1; if( isset($fields) && is_array($fields) && sizeof($fields) ) foreach( $fields as $key1 => $value1 ){ $counter1++; ?>
				<div class="form-group">
					<label class="col-md-3 control-label" style="font-weight:bold"><?php echo $key1;?></label>
					<div class="col-md-4">
						<?php if( $key1=='_id' ){ ?>
						<p class="form-control-static text-muted"><?php echo $value1;?></p>
						<input type="hidden" name="_id" value="<?php echo $value1;?>">
						<?php }else{ ?>
							<input type="text" name="<?php echo $key1;?>" class="form-control" value="<?php echo $value1;?>">
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="form-actions fluid">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" class="btn blue">Save</button>
					<a href="javascript:history.back(-1)" class="btn default">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>