<?php

		////////////////////////
		//RETURN PROPER ERROR MESSAGING
		//////////////////////////
		function filterMessage($errMsg)
		{
			switch ($errMsg) 
			{ 	
				case strncmp($errMsg,'Duplicate entry',5): 		 
				return "Barcode already in use. Check barcode encoded."; 
				break;
				
				
				
				default:
					return $errMsg;
			}
		}











?>