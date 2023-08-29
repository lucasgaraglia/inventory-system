<div class="container is-fluid mb-6">
	<h1 class="title">Users</h1>
	<h2 class="subtitle">New user</h2>
</div>
<div class="container pb-6 pt-6">

    <!-- este div es para mostrar la respuesta al enviar el form, desde ajax-->
	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/user_save.php" method="POST" class="FormAjax" autocomplete="off">
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Name</label>
				  	<input class="input" type="text" name="user_name" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Surname</label>
				  	<input class="input" type="text" name="user_surname" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Username</label>
				  	<input class="input" type="text" name="user_username" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Email</label>
				  	<input class="input" type="email" name="user_email" maxlength="70" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Password</label>
				  	<input class="input" type="password" name="user_password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Confirm password</label>
				  	<input class="input" type="password" name="user_password_confirm" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Save</button>
		</p>
	</form>
</div>