<h1>Login</h1>
				<div class='loginForm'>
					<form action='login.php' method='POST'>
						<?php if(!empty($success_message)) { ?>	
						<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
						<?php } ?>
						<?php if(!empty($error_message)) { ?>	
						<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
						<?php } ?>
						<label for='username'>Username:</label><br/>
						<input type='text' name='username'/><br/>
						<label for='password'>Password:</label><br/>
						<input type='password' name='password'/><br/>
						<input type='submit' value='Login' />
					</form>
					<a href="register.php">Don't have an account, register here</a>
				</div>