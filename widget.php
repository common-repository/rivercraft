<?php

	/**
		*@package Rivercraft
		*@version 1.3.2
	*/

	  ////////////////////////////////////////////////////////////////
	 // Widget function                                            //
	////////////////////////////////////////////////////////////////


	function rcou_widget(){
		register_widget("rcou_widget");}

	add_action("widgets_init", "rcou_widget");

	class rcou_widget extends wp_widget{
		function rcou_widget(){
			$options = array(
				"classname"   => "rcou-widget",
				"description" => "Afficher sur votre site l'état de votre serveur Minecraft."); 
			$this->WP_widget("rcou-widget", "RiverCraft - Online User", $options);}
	 
		function widget($arguments, $data){
			$defaut = array(
				"title"  => "",
				"iprc"   => "print(get_option( 'iprc', '' ));" ,
				"portrc" => "print(get_option( 'portrc', '' ));",
				"userrc" => "print(get_option( 'userrc', '' ));",
				"pwdrc"  => "print(get_option( 'pwdrc', '' ));",);

			$ip          = $data['iprc'];
			$port        = $data['portrc'];
			$user        = $data['userrc'];
			$pwd         = $data['pwdrc'];
			$api         = new JSONAPI($ip, $port, $user, $pwd, $salt);
			$Server      = $api->call("getServer");
			$PlayerCount = $api->call("getPlayerCount");
			$PlayerLimit = $api->call("getPlayerLimit");
			$PlayerNames = $api->call("getPlayerNames");
			$Version     = $api->call("getBukkitVersion");

			$data = wp_parse_args($data, $defaut);
			
			global $wpdb;
			$table_prefix = $wpdb->prefix;
			 
			extract($arguments);
			 
			echo $before_widget;
			echo $before_title . $data['title'] . $after_title;

			if ($Server["success"] == '') { 
				?>
					<div class="rcwidget">
							<div class="rcstatus">
								<h4>Etat du serveur: </h4>
								<h5 class="rcerror">Hors Ligne</h5>
							</div>
					</div>
				<?php
			}else {
				?>
					<div class="rcwidget">
						<div class="rcstatus">
							<h4>Etat du serveur: </h4><h5 class="rcsuccess">En Ligne</h5>
							<h4>IP:</h4><p><?php echo($ip); ?>:<?php echo($Server["success"]["port"]) ?></p><br>
							<h4>Version CB:</h4><p><?php echo($Version["success"]); ?></p>
						</div>
						<div class="rconplayer">
							<h4>Joueur en ligne:</h4>
							<p><?php print_r($PlayerCount["success"]) ?><strong> /<?php print_r($PlayerLimit["success"]) ?></strong></div>
							<div><?php 
									foreach ($PlayerNames["success"] as $key => $value) {
										echo"<img src=\"https://minotar.net/avatar/$value/32\" alt=\"$value\" title=\"$value\"> ";
									}
								?>
							</div>
						</div>
				<?php
			}
				echo $after_widget;
		}
	 
		function update($content_new, $content_old){

			$content_new['title']  = esc_attr($content_new['title']);
			$content_new['iprc']   = esc_attr($content_new['iprc']);
			$content_new['portrc'] = esc_attr($content_new['portrc']);
			$content_new['userrc'] = esc_attr($content_new['userrc']);
			$content_new['pwdrc']  = esc_attr($content_new['pwdrc']);
			return $content_new;

		}
	 
		function form($data){
 
			$defaut = array(
				"title"  => "",
				"iprc"   => "print(get_option( 'iprc', '' ));" ,
				"portrc" => "print(get_option( 'portrc', '' ));",
				"userrc" => "print(get_option( 'userrc', '' ));",
				"pwdrc"  => "print(get_option( 'pwdrc', '' ));",
				);
			
			$data = wp_parse_args($data, $defaut);
 
			global $wpdb;
			$table_prefix = $wpdb->prefix;
		 
			?>
			<div class="help-widget" >
				Les informations ont déjà été enregistré pendant la configuration de Rivercraft.
				Cependant, vous pouvez toujours modifié ces champs pour afficher d'autres serveurs.
			</div>
			<p>
				<!-- Title -->
				<label for="<?php echo $this->get_field_id('title'); ?>">Nom du serveur</label><br />
				<input value="<?php echo $data['title'];?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" type="text" />
			</p>
			<p>
				<!-- Server's Ip -->
				<label for="<?php echo $this->get_field_id('iprc'); ?>">Adresse IP du serveur</label><br />
				<input value="<?php print(get_option( 'iprc', '' )); ?>" name="<?php echo $this->get_field_name('iprc'); ?>" id="<?php echo $this->get_field_id('iprc'); ?>" type="text" />
			</p>
			<p>
				<!-- JSONAPI's Port -->
				<label for="<?php echo $this->get_field_id('portrc'); ?>">Port de JSONAPI</label><br />
				<input value="<?php print(get_option( 'portrc', '' )); ?>" name="<?php echo $this->get_field_name('portrc'); ?>" id="<?php echo $this->get_field_id('portrc'); ?>" type="text" />
			</p>
			<p>
				<!-- JSONAPI's User -->
				<label for="<?php echo $this->get_field_id('userrc'); ?>">Nom d'utilisateur</label><br />
				<input value="<?php print(get_option( 'userrc', '' )); ?>" name="<?php echo $this->get_field_name('userrc'); ?>" id="<?php echo $this->get_field_id('userrc'); ?>" type="text" />
			</p>
			<p>
				<!-- JSONAPI's Password -->
				<label for="<?php echo $this->get_field_id('pwdrc'); ?>">Mot de passe</label><br />
				<input value="<?php print(get_option( 'pwdrc', '' )); ?>" name="<?php echo $this->get_field_name('pwdrc'); ?>" id="<?php echo $this->get_field_id('pwdrc'); ?>" type="password" />
			</p>
			<?php
 
		}
	 

	}


?>