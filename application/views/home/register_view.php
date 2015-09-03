<div class="row">
	<div class="span6">

	<div id="register_form_error" class="alert alert-error"><!--Dynamic --></div>

	<form id="register_form" class="form-horizontal" method="post" action="<?=site_url('user/register')?>">	
		<div class="control-group">
			<label class="control-label"> Username </label>
			<div class="controls">
				<input type="text" name="login" class="input-xlarge" />		
			</div>
		</div>

		<div class="control-group">
			<label class="control-label"> Email </label>
			<div class="controls">
				<input type="text" name="email" class="input-xlarge" />		
			</div>
		</div>


		<div class="control-group">
				<label class="control-label"> Password </label>
				<div class="controls">
					<input type="password" name="password" class="input-xlarge" />		
				</div>
		</div>

		<div class="control-group">
				<label class="control-label">Confirm Password </label>
				<div class="controls">
					<input type="password" name="confirm_password" class="input-xlarge" />		
				</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<input type="submit" value="Register" class="btn btn-primary" />		
			</div>
		</div>
	</form>
	<a href="<?=site_url('/')?>">Home page</a>
	</div>

</div>

<script type="text/javascript">
	$(function() {

		$("#register_form_error").hide();
		$("#register_form").submit(function(evt){
			evt.preventDefault()
			var url = $(this).attr('action');
			var postData = $(this).serialize();

			$.post(url, postData, function(o) {
				
				if(o.result ==1){
					window.location.href = '<?=site_url('dashboard')?>';
					//alert('Login successfull');
				}else {

					$("#register_form_error").show();
					var output = '<ul>'
					// for (var i = 0; i < o.error.lenght; i++ ){
					// 	output += o.error[i];
					// }


					for (var key in o.error){
						var value =  o.error[key];
					output +='<li>' + value +'</li>'
					}
					output +='</ul>';
					$("#register_form_error").html(output);
				}
			}, 'json');

		});

	});
</script>