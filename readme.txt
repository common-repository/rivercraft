=== RiverCraft ===
Contributors: RiverNight
Plugin URI: http://wordpress.org/extend/plugins/rivercraft/
Donate link: /
Tags: jsonapi, minecraft, bukkit
Requires at least: 3.0
Tested up to: 3.6
Stable tag: 1.3.2
License: GPLv2 or later
 
RiverCraft permet d'unir votre serveur Minecraft et votre site/blog Wordpress à l'aide de JSONAPI.
 
== Description ==
 
<strong>RiveCraft</strong> permet d'unir votre serveur Minecraft et votre site/blog Wordpress à l'aide de JSONAPI.
Pour plus d'information, cliquez <a href="http://www.bukkit.fr/index.php?threads/web-rivercraft-union-de-wordpress-et-de-minecraft.5048/">ici</a>
 
== Installation ==
<ul>
	<li>Vous devez tout d'abord installer le plugin <a href="http://dev.bukkit.org/server-mods/jsonapi/">JSONAPI</a> dans le dossier Plugin de votre serveur CraftBukkit.</li>
	<li>Ensuite réactulaiser ou redémarrer votre serveur. <br>
		Un nouveau dossier au nom de JSONAPI devrai apparaître dans le dossier Plugin.	</li>
	<li>Ouvrez le fichier config.yml qui s'y trouve. Vous devriez voir : </li>
			<pre>
				method-whitelist:	
					- getPlayerLimit
					- dynmap.getPort
				options:
		  			stream_pusher:
						max_queue_age: 30
				 		max_queue_length: 500
					startup-delay: 2000
					port: 20059
					ip-whitelist: []
					log-to-console: true
				 	log-to-file: 'false
					anyone-can-use-calladmin: true
					use-new-api: false
			</pre> 
	
	<li>Modifiez "20059" avec le port demandé au préalable à votre hébergeur.</li>

	<li>Ouvrez le fichier user.yml qui s'y trouve.Vous devriez voir :</li>		
		<pre>
			users:
				users1:
    				username: usernameGoeshere
					password: passwordGoesHere
   					groups:
    				- full_control
		</pre>

	<li>Modifiez "usernameGoeshere" avec un nom d'utilisateur.</li>
	<li>Modifiez "passwordGoesHere" avec un mot de passe.</li>

	<li>Installez RiverCraft, si ce n'est pas déjà fait sur votre site/blog Wordpress.	</li>
	<li>Allez dans le nouveau menu Rivecraft qui se trouve dans votre BackOffice.</li>
	<li>Insérez les  informations demandés</li>
	<li>Allez dans le Apparence>Widgets et activez le widget. Les champs sont déjà remplis. Vous pouvez éventuellement modifier ces champs pour afficher un autre serveur.</li>
</ul> 
	
== Screenshots ==
/
== Frequently Asked Questions ==
/
== Upgrade Notice ==
/
== Changelog ==

= Version 1.3.2 (08/09/2013) = 

- Correction d'un bug mineur

= Version 1.3.1 (07/09/2013) = 

- Correction du style

= Version 1.3 (07/09/2013) = 

- MàJ OBLIGATOIRE
- MàJ de la gestion des informations permettant la connexion au serveur

= Version 1.2 (25/01/2013) =

- MàJ non-obligatoire
- Modification du CSS
 
= Version 1.0 (14/01/2013) =
 
- Première release