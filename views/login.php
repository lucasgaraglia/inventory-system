<div class="main-container">
    <form class="box login" action="" method="POST" autocomplete="off">
		<h5 class="title is-5 has-text-centered">Inventory system</h5>

		<div class="field">
			<label class="label">User</label>
			<div class="control">
			    <input class="input" type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
			</div>
		</div>

		<div class="field">
		  	<label class="label">Password</label>
		  	<div class="control">
		    	<input class="input" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
		  	</div>
		</div>

		<p class="has-text-centered mb-4 mt-3">
			<button type="submit" class="button is-info is-rounded">Log in</button>
		</p>
	</form>
</div