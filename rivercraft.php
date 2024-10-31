<?php

	/**
		*@package Rivercraft
		*@version 1.3.2
	 */
	/*
		Plugin Name: Rivercraft
		Description: Rivercraft permet d'unir Wordpress et Minecraft avec JSONAPI.
		Version: 1.3.2
		Author: Heithem DRIDI ( RiverNight )
		License: GPLv2 or later
	*/


		  ////////////////////////////////////////////////////////////////
		 // Include page/file                                          //
		////////////////////////////////////////////////////////////////




	//Require file
		require "JSONAPI.php";       // JSONAPI Class
		require "panel.php";        // Add a panel in Back-Office
		require "widget.php";      // Server statut widget


	//Include CSS files in the header
		wp_enqueue_style('Rivercraft', '/wp-content/plugins/Rivercraft/css/style.css');


?>