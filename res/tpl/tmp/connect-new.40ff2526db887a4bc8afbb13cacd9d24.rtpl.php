<?php if(!class_exists('raintpl')){exit;}?><div class="row">
	<div class="col-md-12">
		
		<form action="connect-new-save.php" method="post" class="form-horizontal">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Server</label>
					<div class="col-md-4">
						<input type="text" name="server" required="required" class="form-control" placeholder="Server name or IP">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Database</label>
					<div class="col-md-4">
						<input type="text" name="database" required="required" class="form-control" placeholder="Database name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">User</label>
					<div class="col-md-4">
						<input type="text" name="user" class="form-control" placeholder="Username (opcional)">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Password</label>
					<div class="col-md-4">
						<input type="password" name="pass" class="form-control" placeholder="Password (opcional)">
					</div>
				</div>
				
			</div>
			<div class="form-actions fluid">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" class="btn blue">Add</button>
					<a href="default.php" class="btn default">Cancel</a>                              
				</div>
			</div>
		</form>

	</div>
</div>