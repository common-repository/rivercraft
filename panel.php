<?php

	/**
		*@package Rivercraft
		*@version 1.3.2
	*/

	  ////////////////////////////////////////////////////////////////
	 // Add rivercraft panel for settings                          //
	////////////////////////////////////////////////////////////////

	add_action('admin_menu', 'panel');

	function panel(){
		add_menu_page( 'RiverCraft - Configuration', 'RiverCraft', 'activate_plugins', 'rivercraft-panel', 'rc_panel', plugins_url('Rivercraft/css/img/back_office/settings.png'), '99.1' );
	}

	$salt = get_option('saltrc', '');
	if (isset($salt)) {
		delete_option('saltrc');
	}

	function rc_panel(){
		if (isset($_POST['panel_update'])) {
			foreach ($_POST['options'] as $name => $value) {
				if (empty($value)) {
					delete_option($name);
				}
				else{
					update_option( $name, $value );
				}
			}
		}
		?>
			<div class="wrap">
				<div id="icon-options-general" class="icon32"><br /></div>
				<h2>RiverCraft</h2>
				<br>
				<form action="" method="post">
					<div class="theme-option-group">
						<table cellspacing="0" class="widefat option-table">
							<thead>
								<tr>
									<th colspan="2">Configuration</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">
										<label for="iprc">Adresse IP du serveur</label>
									</th>
									<td>
										<input type="text" placeholder="L'IP de votre serveur" id="iprc" name="options[iprc]" value="<?php print(get_option( 'iprc', '' )); ?>" size="100">
									</td>
								</tr>
								<tr>
									<th scope="row">
										<label for="userrc">Port</label>
									</th>
									<td>
										<input type="text" placeholder="Le port de JSONAPI" id="portrc" name="options[portrc]" value="<?php print(get_option( 'portrc', '' )); ?>" size="100">
									</td>
								</tr>
								<tr>
									<th scope="row">
										<label for="userrc">Nom d'utilisateur</label>
									</th>
									<td>
										<input type="text" placeholder="Votre nom d'utilisateur de JSONAPI" id="userrc" name="options[userrc]" value="<?php print(get_option( 'userrc', '' )); ?>" size="100">
									</td>
								</tr>
								<tr>
									<th scope="row">
										<label for="pwdrc">Mot de passe</label>
									</th>
									<td>
										<input type="text" placeholder="Votre mot de passe de JSONAPI" id="pwdrc" name="options[pwdrc]" value="<?php print(get_option( 'pwdrc', '' )); ?>" size="100">
									</td>
								</tr>
							</tbody>					
						</table>
					</div>
					<p class="submit">
						<input type="submit" name="panel_update" class="button-primary autowidth" value="Save">
					</p>
				</form>
			</div>
		<?php
	}

?>