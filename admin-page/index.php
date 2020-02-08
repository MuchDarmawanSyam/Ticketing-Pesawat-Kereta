<?php  
	/*
	* //==================================================================================================================//
	* //============================================= ASSEMBLY FRAMEWORK =================================================//
	* //==================================================================================================================//
	*								
	*							__________________________________________________________
	*							 !!!!! 	ONLY ++ SUB PARTS CAN YOU MAKE A CHANGE		!!!!!
	*							__________________________________________________________
	*	
	*	
	* 	//  === Set Your HomePage to First Page Your Load in App ===
	*	
	*	
	*
	*
	*	// ++ Page Name
	*	// You Can Change if Your File Name is not Index.
	*	// Make Sure Your File What Your Want to Load First is Exist in "First Sub" App(Or What Your Changed) Directory.
	*/
		
		$HOME = 'check-session';

	/*
	*
	*
	*
	*	// ++ Extention Name	   
	*	// Use PHP If Your File Format is PHP
	*/	 
		
		$EX = 'php';

	/*
	*
	*	
	*
	*
	*
	*
	*	 |												|
	*	 |	FOR USING THIS TECH ON YOUR FIRST TIME  	|
	*	 |			   I RECOMMEND TO READ 		        |
	*	 |				THE DOCUMENTATION				|
	*	 |												|
	*	 |	DEVELOPMENT BY MUCH DARMAWAN IRIANSYAH SYAM	|
	*	 |												|
	*
	*
	*	 
	*	 
	*	 
	*	 
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*	// ++ Directory to Load Page
	*	// Better to Do Not Make a Change
	*/

		$DIRLOAD = 'App/';
		
	/*
	*
	*
	*
	*
	*
	*
	*
	*	// Function To Load Your Page
	*/
		$HOME = $DIRLOAD.$HOME.'.'.$EX;
		header("location: $HOME");
?>