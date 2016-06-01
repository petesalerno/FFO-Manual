<?php

/*
 * Add &data=1 when viewing the PDF via the admin area to view the $form_data array
 */
PDF_Common::view_data($form_data);				
			
/*
 * Store your form fields from the $form_data array into variables here
 * To see your entire $form_data array, view your PDF via the admin area and add &data=1 to the url
 * 
 * For an example of accessing $form_data fields see https://developer.gravitypdf.com/documentation/custom-templates-introduction/
 *
 * Alternatively, as of v3.4.0 you can use merge tags (except {allfields}) in your templates. 
 * Just add merge tags to your HTML and they'll be parsed before generating the PDF.	
 * 		 
 */				 					
 /* Organization Info */
$organization = $form_data['field'][42];
$prepNameFirst = $form_data['field'][43][first];
$prepNameLast= $form_data['field'][43][last];
$creationDate= $form_data[date_created_usa];
/* General Requirments */
/* 1.1 */
if ($form_data['field'][1] == "Yes"){
   $fsPolicy = "Policy is attached in appendix";    
   } else {
   $fsPolicy = $form_data['field'][3];
}
$fsPolicyAdditional = $form_data['field'][2];
/* 1.2 */
if ($form_data['field'][11] == "Yes"){
   $awareDocReq = "is";
      } else {
   $awareDocReq = "is not";
}
/* 1.3 */
/* 1.4 */
if ($form_data['field'][14] == "Yes"){
   $traceProg = "has";
   $traceAppend = "The traceback procedure used is attached to the appendix.";
   if ($form_data['field'][16] == "Yes"){
	     $annualTracePre = "A traceback audit exercise is conducted annually to ensure records and procedures at ";
         $annualTracePost = "are sufficient to allow traceback of products.";
   } else {
         $annualTracePre = "";
         $annualTracePost  = "does not have an annual traceback audit exercise";
   }
} else {
   $traceProg = "does not have";
   $traceAppend = "";
   $annualTracePre = "";
   $annualTracePost  = "does not have an annual traceback audit exercise";
}
/* 1.5 */
if ($form_data['field'][17] == "Yes"){
       $recall1 = "The recall procedure used at $organization is attached to the appendix. <br>";
	   if ($form_data['field'][18] == "Yes"){
		  $recallText= "$recall1 The recall system is tested annually.";
	   } else {
		 $recallText = "$recall1";
		 }
} else {
      $formData20 = $form_data['field'][20];
	  $formData21= $form_data['field'][21];
	  $endUl = "</ul>";
      $recall1 = "The recall team at $organization consists of:<br> $formData20 <br> The following people will act as back up in the event of absence:<br>$formData21";
	  $recall2 = "<br>Assigned employees are trained in the following and are aware that in the event of contaminated product being released to the marketplace they need to:<br><ul>";
      if ($form_data['field'][19] == "Yes"){
		 $recall3 = "<li>Record the reason for the recall and the health risk</li>";
	  }
	  if ($form_data['field'][22] == "Yes"){
		 $recall4 = "<li>Halt distribution of the product and isolate the quantities still within the operation</li>";
	  }
	  if ($form_data['field'][23] == "Yes"){
		 $recall5 = "<li>Identify the product and determine the quantities involved</li>";
	  }
	  if ($form_data['field'][24] == "Yes"){
		 $recall6 = "<li>Identify who needs to be contacted</li>";
	  }
	  if ($form_data['field'][25] == "Yes"){
		 $recall7 = "<li>Communicate with the parties concerned</li>";
	  }
	  if ($form_data['field'][26] == "Yes"){
		 $recall8 = "<li>Recall the product</li>";
	  }
	  if ($form_data['field'][27] == "Yes"){
		 $recall9 = "<li>Properly dispose of all contaminated product</li>";
	  }
	  if ($form_data['field'][28] == "Yes"){
		 $recall10 = "<li>Determine preventive plans</li>";
	  }
	  $recallText = "$recall1 $recall2 $recall3 $recall4 $recall5 $recall6 $recall7 $recall8 $recall9 $recall10 $endUl";
}
/* 1.6 */
if ($form_data['field'][30] == "Yes"){
   $capText = "The documented corrective action procedure for $organization is attached to the appendix. <br> <br> ";
} else {
	  $capAdd = $form_data['field'][41];
	  $cap9 = "The following personnel at $organization are responsible for ensuring corrective actions are completed:<br> $capAdd <ul>";
	  if ($form_data['field'][29] == "Yes"){
		 $cap1 = "<li>All employees aware that when they identify a minor deviation from normal operation, they should take immediate corrective action</li>";
	  }
	  if ($form_data['field'][33] == "Yes"){
		 $cap2 = "<li>All employees aware that when they identify a minor deviation from normal operation, they should communicate the minor deviation and corrective action to their supervisor</li>";
	  }
	  if ($form_data['field'][34] == "Yes"){
		 $cap3 = "<li>All employees been trained in the following and are aware that when they identify a major deviation from normal operation, they should immediately report it to their supervisor or person accountable for food safety onsite</li>";
	  }
	  if ($form_data['field'][35] == "Yes"){
		 $cap4 = "<li>Supervisors or the person(s) accountable for food safety onsite aware they must assess the major deviation situation and determine the required corrective action</li>";
	  }
	  if ($form_data['field'][36] == "Yes"){
		 $cap5 = "<li>Supervisors or the person(s) accountable for food safety onsite aware they must assess the major deviation situation and determine the cause of the major deviation</li>";
	  }
	  if ($form_data['field'][37] == "Yes"){
		 $cap6 = "<li>Supervisors or the person(s) accountable for food safety onsite aware they must assess the major deviation situation and determine the required preventative action needed to prevent recurrence of the major deviation</li>";
	  }
	  if ($form_data['field'][38] == "Yes"){
		 $cap7 = "<li>Supervisors or the person(s) accountable for food safety onsite aware they must assess the major deviation situation and determine new procedures or modifications to current procedures as required to address the identified major deviation, and train employees on the new or modified procedures</li>";
	  }
	  if ($form_data['field'][39] == "Yes"){
		 $cap8 = "<li>Supervisors or the person(s) accountable for food safety onsite aware they must assess the major deviation situation and document the major deviation and corrective actions undertaken</li>";
	  }
	  $capText = "$cap1 $cap2 $cap3 $cap4 $cap5 $cap6 $cap7 $cap8 $endUl $cap9"  ;
}
/* 1.7 */
if ($form_data['field'][32] == "Yes"){
   $docText = "Please go to the appendix of the food safety plan for $organization training records to see designated employees on:<ul><li>traceback procedures</li><li>recall procedures</li><li>corrective action procedures</li></ul>"; 
} else {
   $docText = "<br>";
}
/* 2.1.1 */
$tf1Freq = $form_data['field'][50];
if ($form_data['field'][48] == "Yes"){
   $tf1Text = "All personal hygiene facilities (portable or fixed facilities) and hand washing stations at $organization are kept clean, well supplied with toilet paper, water, soap, single use paper towels and a towel disposal container.<br>
   $organization cleans and maintains these facilities at the following frequency:<br>$tf1Freq";
} else {
   $tf1Text = "";
}
/* 2.1.2 */
 $tf2Freq = $form_data['field'][53];
if ($form_data['field'][52] == "Yes"){
   $tf2Text = "$organization has toilet and hand washing facilities that are easily accessible to employees.<br>
   $organization has the following personal hygiene and hand washing facilities available for employees: $tf2Freq";
} else {
   $tf2Text = "";  
}
/* 2.1.3 */
if ($form_data['field'][56] == "Yes"){
   $tf3Text = "Field /portable toilets used at $organization are designed, constructed, and located to minimize the risk of product contamination.";
} else {
   $tf3Text = "";  
}

/* 2.2.1 */
if ($form_data['field'][57] == "Yes"){
   $tf4Freq = $form_data['field'][57];
   $tf4Text = "$organization maintains all sewage and septic systems to prevent contamination to fields or produce. Sewage and septic inspections are performed at the following frequency:
<br>$tf4Freq";
} else {
   $tf4Text = "";  
}
   
/* 2.2.2 */
if ($form_data['field'][60] == "Yes"){
   $tf5Addl = $form_data['field'][61];
   $tf5Text = "$organizations's plan for immediate control of spills from sewage/waste is attached the appendix of this section.<br>$tf5Addl";
} else {
   $tf5s0 = "$organization's employees and/or service providers (e.g., for portable toilets) been trained in the following and are aware: <ul>";
   if ($form_data['field'][63] == "Yes"){
		 $tf5s1 = "<li>that any affected produce must be immediately disposed of in a covered waste bin.</li>";
	  }
   if ($form_data['field'][64] == "Yes"){
		 $tf5s2 = "<li>that the contaminated area needs to be marked off with caution tape or string.</li>";
	  }  
   if ($form_data['field'][65] == "Yes"){
		 $tf5s3 = "<li>that signs in appropriate languages must be posted at the perimeter prohibiting entry to the contaminated area.</li>";
	  }
   if ($form_data['field'][66] == "Yes"){
		 $tf5s4 = "<li>that people and animals must be kept out until the area is sufficiently decontaminated.</li>";
	  }
   if ($form_data['field'][67] == "Yes"){
		 $tf5s5 = "<li>that any solid waste still resting on the surface must be collected, shoveled up, and removed to the waste bin.</li>";
	  }
   if ($form_data['field'][68] == "Yes"){
		 $tf5s6 = "<li>that any affected permanent structures must be hosed off and disinfected with a dilute bleach solution.</li>";
	  }
   if ($form_data['field'][69] == "Yes"){
		 $tf5s7 = "<li>that if a field/portable toilet unit has caused the contamination, it will be cleaned up and replaced by the company providing the units and maintenance services.</li>";
	  }
   if ($form_data['field'][70] == "Yes"){
		 $tf5s8 = "<li>that the spillage event and corrective actions must be written down on a cleaning and maintenance log for the toilet facility and the record kept.</li>";
	  }
      $tf5Addl = $form_data['field'][71];
   $tf5Text = "$tf5s0 $tf5s1 $tf5s2 $tf5s3 $tf5s4 $tf5s5 $tf5s6 $tf5s7 $tf5s8 $endUl $tf5Addl" ;
}
/* 2.3.1 */
if ($form_data['field'][72] == "Yes"){
   $tf6Text = "All employees at $organization have been trained in best practices for hand washing as outlined below and are aware they need to wash hands before starting work, after using the toilet, after each break, after using a handkerchief/tissue and at any other times when their hands might become a source of contamination.<br>";
} else {
   $tf6Text = "";
   }
/* 2.4.1 */
if ($form_data['field'][73] == "Yes"){
   $tf7Text = "All employees at $organization have been trained in best practices for the proper use of toilet facilities as outlined below.<br>";
} else {
   $tf7Text = "";
   }
/* 2.5.1 */
 if ($form_data['field'][74] == "Yes"){
   $tf8Text = "$organization's policies for protective clothing, hair coverings, jewelry, artificial nails and storage of loose items such as cell phones in clothing are attached to the appendix of this section.<br>";
 } else {
   $tf8s0 = "$organization has policies covering protective clothing, hair coverings, jewelry, artificial nails and storage of loose items such as cell phones in clothing. Policies are outlined below:<ul>";
   if ($form_data['field'][75] == "Yes"){
		 $tf8s1 = "<li>Use of aprons is required at $organization</li>";
	  } else {
		 $tf8s1 = "<li>Use of aprons is not required at $organization</li>";
	  }
   if ($form_data['field'][76] == "Yes"){
		 $tf8s2 = "<li>There are requirments for types of footware worn at $organization</li>";
	  } else {
		 $tf8s2 = "<li>There are no restrictions on types of footware worn at $organization</li>";
	  }
   if ($form_data['field'][77] == "Yes"){
		 $tf8s3 = "<li>Employees wear hair coverings while performing activities in production fields</li>";
	  } else {
		 $tf8s3 = "<li>Employees are nor required to wear hair coverings while performing activities in production fields</li>";
	  }
   if ($form_data['field'][78] == "Yes"){
		 $tf8s4 = "<li>Employees wear hair coverings during produce packing activities</li>";
	  } else {
		 $tf8s4 = "<li>Employees are not required to wear hair coverings during produce packing activities</li>";
	  }
   if ($form_data['field'][79] == "Yes"){
		 $tf8s5 = "<li>Employees wear beard nets (if applicable) during produce packing activities</li>";
	  } else {
		 $tf8s5 = "<li>Employees are not required to wear beard nets (if applicable) during produce packing activities</li>";
	  }
   if ($form_data['field'][80] == "Yes"){
		 $tf8s6 = "<li>$organization restricts wearing artificial nails</li>";
	  } else {
		 $tf8s6 = "<li>There are no restrictions on wearing artificial nails at $organization</li>";
	  }
   if ($form_data['field'][81] == "Yes"){
		 $tf8s7 = "<li>$organization restricts wearing jewelry</li>";
	  } else {
		 $tf8s7 = "<li>There are no restrictions on wearing jewelry at $organization</li>";
	  }
   if ($form_data['field'][82] == "Yes"){
		 $tf8s8 = "<li>$organization restricts storing items in clothing</li>";
	  } else {
		 $tf8s8 = "<li>There are no restrictions on storing items in clothing at $organization</li>";
	  }
   $tf8Text = "$tf8s0 $tf8s1 $tf8s2 $tf8s3 $tf8s4 $tf8s5 $tf8s6 $tf8s7 $tf8s8 $endUl" ;
   }
/* 2.5.2 */
if ($form_data['field'][83] == "Yes"){
    $tf9Addl = $form_data['field'][85];
    if ($form_data['field'][84] == "Yes"){
	  $tf9Text = "$organization has attached their policy on glove use to the appendix of this section.<br>$tf9Addl";
	} else {
	  $tf9g0 = "$organization has the following policies on glove use:<ul>"; 
  	  if ($form_data['field'][86] == "Yes"){
		if ($form_data['field'][87] == "Yes"){
		 $tf9g1 = "<li>Employees who use gloves are trained in the following and have been made aware that hands should be washed and dried (using single use paper towel if possible) before gloves are put on and after they are removed.</li>";
		}
		if ($form_data['field'][88] == "Yes"){
		 $tf9g2 = "<li>Employees who use gloves are trained in the following and have been made aware that disposable gloves must be changed between tasks or when the gloves have become torn, soiled or otherwise damaged or contaminated.</li>";
		}
		if ($form_data['field'][89] == "Yes"){
		 $tf9g3 = "<li>Employees who use gloves are trained in the following and have been made aware that they should dispose of disposable gloves that have come into contact with the ground or other non-food contact surfaces.</li>";
	    }
		if ($form_data['field'][90] == "Yes"){
		 $tf9g4 = "<li>Employees who harvest, wash, and/or pack produce are aware that they should wash and dry hands and put on clean gloves between these different tasks.</li>";
		}
		if ($form_data['field'][91] == "Yes"){
		 $tf9g5 = "<li>Single use disposable gloves are used for hand contact with leafy greens/produce</li>";
		}  
	  } 
	  if ($form_data['field'][92] == "Yes"){
		if ($form_data['field'][93] == "Yes"){
		 $tf9g6 = "<li>Gloves used are made of materials that can be readily cleaned and sanitized.</li>";
		}
		if ($form_data['field'][94] == "Yes"){
		 $tf9g7 = "<li>Employees who use reusable / cloth gloves are trained and aware that hands should be washed and dried (using single use paper towel if possible) before reusable gloves are put on and after they are removed.</li>";
		}
		if ($form_data['field'][95] == "Yes"){
		 $tf9g8 = "<li>Emmployees who use reusable / cloth gloves are trained and aware that they need to clean and sanitize or change reusable gloves that have come in contact with the ground or other non-food contact surfaces.</li>";
	    }
		if ($form_data['field'][96] == "Yes"){
		 $tf9g9 = "<li>Employees who use reusable / cloth gloves are trained and aware that reusable gloves should be removed when leaving the work area and replaced upon return.</li>";
		}
		if ($form_data['field'][97] == "Yes"){
		 $tf9gA = "<li>Employees who use reusable / cloth gloves are trained and aware that reusable plastic gloves should be washed (using proper hand washing technique) after being put back on or laundered daily (for cloth)</li>";
		}  
		if ($form_data['field'][98] == "Yes"){
		 $tf9gB = "<li>Employees who use reusable / cloth gloves are trained and and are aware that cloth gloves should be washed daily.</li>";
		}
		if ($form_data['field'][99] == "Yes"){
		 $tf9gC = "<li>Employees who harvest, wash and/or pack produce are trained and aware that they should wash and dry their hands and put on clean gloves after harvesting and before washing or packing.</li>";
		}
		if ($form_data['field'][100] == "Yes"){
		 $tf9gD = "<li>Cloth gloves that are worn, are separated in pairs dedicated for each specific use (e.g., composting/manure versus harvesting).</li>";
	    }
		if ($form_data['field'][101] == "Yes"){
		 $tf9gE = "<li>Gloves that are appropriately cleaned and sanitized are issued regularly and as necessary? For example, after gloves have become torn, soiled or otherwise damaged or contaminated.</li>";
		}
		if ($form_data['field'][102] == "Yes"){
		 $tf9gF = "<li>$organization provides a safe and sanitary location to leave gloves when they are not in use by an employee.</li>";
		}	
	 }
   $tf9end = "$organization has attached their policy on glove use to the appendix of this section.<br>$tf9Addl";
   $tf9Text = "$tf9g0 $tf9g1 $tf9g2 $tf9g3 $tf9g4 $tf9g5 $endUl $tf9g6 $tf9g7 $tf9g8 $tf9g9 $tf9gA $tf9gB $tf9gC $tf9gD $tf9gE $tf9gF $endUl $tf9end" ;
    }
   } else {
     $tf9Text = "";
}
/* 2.6.1 */
 if ($form_data['field'][103] == "Yes"){
   $tfAAddl = $form_data['field'][104];
   $tfAText = "$organization has clearly designated areas where employees can take breaks and which are located away from produce fields and handling/packing areas<br><br>$tfAAddl";
 } else {
   $tfAText = "";
   }
/* 2.6.2 */
 if ($form_data['field'][105] == "Yes"){
   $tfBText = "All $organization employees and visitors aware that eating, drinking (other than potable water for field employees), spitting, chewing gum and using tobacco is only allowed in these clearly designated break areas.<br>";
 }else {
   $tfBText = "";
   }
/* 2.7.1 */
if ($form_data['field'][106] == "Yes"){
   $tfCText = "All employees and visitors to $organization are made aware that if they show signs of illness they need to restrict their direct contact with produce or food-contact surfaces. $organization employees are also aware that they must report signs of illness to the supervisor before beginning work.<br>";
}else {
   $tfCText = "";
   }
/* 2.7.2 */
if ($form_data['field'][107] == "Yes"){
   $tfDText = "All $organization employees have been trained and are aware that they need to restrict their direct contact with produce or food-contact surfaces if they have an open sore or lesion that cannot be effectively covered.<br>";
}else {
   $tfDText = "";
   }
/* 2.7.3 */
if ($form_data['field'][108] == "Yes"){
   $tfEText = "All employees (and visitors) to $organization are made aware that they need to seek prompt treatment for cuts, abrasions and other injuries.<br>";
}else {
   $tfEText = "";
   }
/* 2.7.4 */
$tfGAddl = $form_data['field'][110] ;
if ($form_data['field'][109] == "Yes"){
   $tfGText = "All employees (and visitors) to $organization are made aware that they need to seek prompt treatment for cuts, abrasions and other injuries.<br>$tfGAddl <br>";
} else {
   $tfGg0 = "$organization employees have been trained on the following and are aware that:<ul>"; 
   if ($form_data['field'][111] == "Yes"){
	  $tfGg1 = "<li>Presence of blood and bodily fluid on food or food contact surfaces poses a serious food safety risk.</li>";
   }  
   if ($form_data['field'][112] == "Yes"){
	  $tfGg1 = "<li> If blood or other bodily fluid should ever come in contact with the field or the produce it must be immediately dealt with by whoever finds the contamination.</li>";
   }  
   if ($form_data['field'][113] == "Yes"){
	  $tfGg1 = "<li>If that person is not able to immediately deal with the contamination, that person will mark the area and immediately notify a supervisor who will take appropriate action.</li>";
   }  
   if ($form_data['field'][114] == "Yes"){
	  $tfGg1 = "<li>If there is blood in the field, all contaminated surfaces and/or food will be removed to a plastic bag with a shovel or gloved hands and placed in a secure trash can.</li>";
   }  
   if ($form_data['field'][115] == "Yes"){
	  $tfGg1 = "<li>All affected soil will be shoveled up around and under the area and will be removed.</li>";
   }  
   if ($form_data['field'][116] == "Yes"){
	  $tfGg1 = "<li>First Aid shall be provided or 911 called for the person who is bleeding.</li>";
   }  
   if ($form_data['field'][117] == "Yes"){
	  $tfGg1 = "<li>If a surface that is used to carry or process the produce (including harvesting equipment or carrying totes) is contaminated, it will be immediately cleaned with soapy water away from any field or other produce and then disinfected with food-grade cleaners available on-site.</li>";
   }  
   if ($form_data['field'][118] == "Yes"){
	  $tfGg1 = "<li>Broken glass should also be properly handled, by placing it in a cardboard box, that is sealed, and placed in a secure trash can.</li>";
   }  
    $tfGText = "$tfGg0 $tfGg1 $tfGg2 $tfGg3 $tfGg4 $tfGg5 $tfGg6 $tfGg7 $tfGg8 $endUl $tfGAddl" ;
 }
/* 2.8.1 */
/* 3.1 */
 
?>