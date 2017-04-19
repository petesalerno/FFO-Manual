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
$endUl = "</ul>";
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
	  $capText = "$cap9 $cap1 $cap2 $cap3 $cap4 $cap5 $cap6 $cap7 $cap8 $endUl" ;
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
	  $PLU1 ="";
	  $PLU2 ="";
	  $PLU3 ="";
	  $PLU4 ="";
	  $PLU5 ="";
 if ($form_data['field'][120] == "Yes"){
   $PLU0 = "A written record of the initial risk assessment of previous land use history at is attached to the appendix of this section.<br>";
   if ($form_data['field'][122] == "Yes"){
      $PLU1 = "<br>$organization performs a risk assessment at least annually for land use.<br>";
   } 
   if ($form_data['field'][123] == "Yes"){
      $PLU3 = "<br>$organization performed preventive and/or corrective measures as a result of a land use risk assessment.<br>";	
      if ($form_data['field'][124] == "Yes"){
         $PLU4 = "<br>$organization written record of preventive and/or corrective measures are attached in the appendix.<br>";
	  }
   $PLUA = $PLU0 . $PLU1;
   $PLUB = $PLU2 .  $PLU3 . $PLU4;
   } else {
	  $PLUB = "";
   }
} else{
   $PLUA = "There has not been a risk assessment of previous land use history. <br>";
 }
/* 4.1 */
/* 4.1.1 */
 if ($form_data['field'][125] == "Yes"){
   $AgWA = "$organization uses water for field use.";
    if ($form_data['field'][130] == "Yes"){
	  $AgWA = $AgWA . "<br><br>A description of the water source(s) and distribution system used at is attached to the appendix.";
	}
 } else {
    $AgWA = "$organization does not use water for filed use.";
 }
 /* 4.2.1 */
  if ($form_data['field'][131] == "Yes"){
   $AgWB = "The water distribution system in use at is constructed so that human or animal waste systems are not cross-connected with agricultural water systems.";
 } else {
    $AgWB = "";
 }  
 /* 4.2.2 */   
if ($form_data['field'][132] == "Yes"){
   $AgWC = "An initial risk assessment of $organization’s water distribution system and all its water sources has been performed. Written risk assessment(s) and any associated documents are attached to the appendix.";
 } else {
    $AgWC = "";
 }     
$AgWC3 = $form_data['field'][134];
/* 4.3 */
/* 4.3.1 */
 if ($form_data['field'][135] == "Yes"){
    $AgWD1 = $form_data['field'][136];
    $AgWD = "$organization has an ongoing water management plan to ensure that the water quality at your farm remains adequate for its intended use.<br> the Procedures are $AgWD1 <br>";
 } else {
    $AgWD = "";
 }   
/* 4.3.2 */
if ($form_data['field'][137] == "Yes"){
   $AgWG = "$organization's water risk assessment, current industry standards and/or prevailing regulations for the commodities being grown requires that water testing be performed as part of your ongoing management plan.<br>";  
}else {
   $AgWG = "";
}
if ($form_data['field'][138] == "Yes"){
   $AgWG1 = "$organization's water management plan includes information about ongoing water testing<br>";  
}else {
   $AgWG1 = "";
}   
$AgWG2 = "";
if ($form_data['field'][133] != "") {
  $waterSource = $form_data['field'][133]; 
  foreach ($waterSource as $waterItem) {
     $AgWG2 = $AgWG2. "<li>$waterItem</li>";
  }
}
$AgWG3 = $form_data['field'][139];
/* 4.4 */
/* 4.4.1 */
if ($form_data['field'][140] == "Yes"){
   $AgWF = "Please see the appendix for training records and other documentation required as part of $organization's Water Management Plan.<br>";  
}else {
   $AgWF = "";
}
/* 5.1 */
/* 5.1.1 */
if ($form_data['field'][143] == "Yes" && $form_data['field'][144] == "Yes"){
   $Chem1 = "All agricultural chemicals used at $organization are used in accordance with label directions and any prevailing regulations.";
}else {
   $Chem1 = "";
}
/* 5.2 */
/* 5.2.1 */
if ($form_data['field'][145] == "Yes"){
   $ChemA = $form_data['field'][147];
   $Chem2 = "$organization's s policy for cleaning application equipment and for disposal of waste agricultural chemicals is attached in the appendix.<br>$ChemA";
}else {
   $Chem2 = $form_data['field'][148];
}
/* 5.3 */
/* 5.3.1 */
if ($form_data['field'][149] == "Yes"){
   $Chem3 = "All personnel who are involved with chemical application at $organization are suitably trained/licensed in chemical use.";
}else {
   $Chem3 = "";
}
/* 5.3.2 */
if ($form_data['field'][150] == "Yes"){
   $Chem4 = "Please see the appendix for documented chemical use records.";
}else {
   $Chem4 = "";
}
/* 6.1 */
/* 6.1.1 */
if ($form_data['field'][153] == "Yes"){
   $Apc1 = $form_data['field'][155] ;
   $ApcA = "Risk assessments at $organization for animal activity in production fields are performed $Apc1 <br>Records for assessments of animal activity in production fields at $organization are attached to the appendix of this section.";
}else {
   $Apc1 = $form_data['field'][156] ;
   $ApcA .="$organization will perform Risk assessments for animal activity $Apc1";
}
/* 6.1.2 */
if ($form_data['field'][158] == "Yes"){
   $Apc2 = $form_data['field'][159] ;
   $Apc3 = $form_data['field'][160] ;
   $ApcB = "$organization monitors $Apc3 for animal activity in production fields as described here:<br>$Apc2 <br>Records for routine monitoring for animal activity in production fields at $organization are attached to the appendix of this section.";
}else {
   $Apc2 = $form_data['field'][161] ;
   $Apc3 = $form_data['field'][162] ;
   $ApcB .="$organization will monitor $Apc3 for animal activity as described here:<br>$Apc2 ";
}
/* 6.2 */
/* 6.2.1 */
if ($form_data['field'][163] == "Yes"){
   $ApcC = "$organtzation has buildings associated with production of produce. (for example, packinghouse, storage, or cooling areas)";
   if ($form_data['field'][164] == "Yes"){
      $ApcC .= "Written pest control policy covering $organtzation's production buildings are attahced in the appendix.";
   }else {
	  if ($form_data['field'][165] == "Yes"){
        $Apc4 = $form_data['field'][170] ;
        $ApcC .= "Risk assessments at $organization for animal activity in and around production buildings are performed $Apc4 <br>Records for assessments of animal activity in and around production buildings at $organization are attached to the appendix of this section.";
      }else {
	    $Apc4 = $form_data['field'][172] ;
        $ApcC .= "Risk assessments at $organization for animal activity in and around production buildings will be performed $Apc4.";
      }
    }
	if ($form_data['field'][166] == "Yes"){
	  $Apc5 = $form_data['field'][174];
	  $Apc6 = $form_data['field'][176];
	  $ApcC .= "<br> $organization monitors $Apc5 for animal activity in and around your production buildings.  Details about this monitoring are:<br>  $Apc6";	
	} else {
	  $Apc5 = $form_data['field'][175];
	  $ApcC .= "<br>Details about planned monitoring for animal activity in and around $organization's production buildings are:<br> $Apc5 ";
	}
	if ($form_data['field'][167] == "Yes"){
	  $ApcC .= "<br> $organization routinely monitors for animal activity in and around your production buildings";
	}
	if ($form_data['field'][168] == "Yes"){
	  $ApcC .= "<br>Pest traps are used outside and/or inside $organization's buildings";
	} else{
	  $ApcC .= "<br>Pest traps are not used outside and/or inside $organization's buildings";
	}
	if ($form_data['field'][169] == "Yes"){
	  	if ($form_data['field'][169] == "Yes"){
	  $ApcC .= "$organization's pest control program performed by an external operator";
	} else {
	  	if ($form_data['field'][180] == "Yes"){
		   $Apc6 =  $form_data['field'][183];  
		   $ApcC =+ "$organization's pest control program performed by farm personnel";
		   if ($Apc6 != ""){
			   $ApcC .= "<br> Addtional Details about $organization's  pest control program are: <br> $Apc6";
		   }
		}
    }
}
} else {
   $ApcC  = "$organization does not have buildings associated with production of produce. (for example, packinghouse, storage, or cooling areas)";
}
/* 7.1 */
/* 7.1.1 */
if ($form_data['field'][186] == "No"){
   $Sam0 = "$organization does not use soil amendments.  This Section is N/A";
   $SkipSam = "Yes";
} else {
   $Sam0 = "$organization uses soil amendments.";
   $SkipSam = "No";   
}
/* 7.2 */
/* 7.2.1 */
if ($form_data['field'][187] == "Yes"){
   $SamA = $form_data['field'][188]; 
   $Sam1 = "$organization uses the following soil amendments (which do not contain raw or partially treated manure):<br>"; 
   $Sam1 = $Sam1 . $SamA;
} else {
   $Sam1 = "$organization does not use any soil amendments which do not contain raw or partially treated manure.<br>";   
}
/* 7.2.2 */
if ($form_data['field'][189] == "Yes"){
   $Sam2 = "$organization uses treated biosolids/sewage sludge.<br>"; 
} else {
   $Sam2 = "$organization does not use treated biosolids/sewage sludge.<br>";   
}
if ($form_data['field'][190] == "Yes"){
   $Sam2 = $Sam2 . "$organization uses treated compost that is plant and/or animal based or compost teas made from treated compost.<br>"; 
} else {
   $Sam2 = $Sam2 . "$organization does not use treated compost that is plant and/or animal based or compost teas made from treated compost.<br>";   
}
if ($form_data['field'][191] == "Yes"){
   $Sam2 = $Sam2 . "$organization uses compost (or compost tea) manufactured by a supplier.<br><br>Supplier records are attached to the appendix and show that finished compost product supplied to is free of pathogens of concern.<br>"; 
} else {
   $Sam2 = $Sam2 . "$organization does not use compost (or compost tea) manufactured by a supplier.<br>";   
}
/* 7.2.3 */
if ($form_data['field'][193] == "Yes"){
   $Sam3 = $Sam3 . "$organization uses the following method of composting:<br>";
   $Sam3 = $Sam3 . $form_data['field'][194];
   $Sam3 = $Sam3 . "<br><br>Temperature of compost is monitored at as follows::<br>";
   $Sam3 = $Sam3 . $form_data['field'][196];
   if  ($form_data['field'][198] == "Yes"){
       $Sam3 = $Sam3 . "<br><br>Temperature of compost is monitored at $organization<br>";
   }else{
       $Sam3 = $Sam3 . "Testing/analysis is not performed on compost/compost tea produced at $organization.";
   }
   if ($form_data['field'][193] != ""){
      $Sam3 = $Sam3 . "Additional information about $organization's composting practices:<br>";
	  $Sam3 = $Sam3 . $form_data['field'][199];
   } 
}
/* 7.2.4 */
if ($form_data['field'][200] == "Yes"){
   $Sam4 = "Please see the appendix for records of composition, dates of treatment (if applicable), methods used and application dates and rates for all soil amendments which do not contain raw or partially treated manure.";
}
/* 7.3 */
/* 7.3.1 */
if ($form_data['field'][201] == "Yes"){
   $Sam5 = "$organization uses the following soil amendments that contain raw or incompletely treated manure or biosolids:<br>";
   $Sam5 = $Sam5 . $form_data['field'][202];
   if ($form_data['field'][204] == "Yes"){
	   $Sam5 = $Sam5 . "<br><br> Please see the appendix for records of composition, dates of treatment (if applicable), methods used and application dates and rates for all soil amendments which contain raw or partially treated manure.";
   }  
   if ($form_data['field'][205] == "Yes"){
	   $Sam5 = $Sam5 . "<br><br> $organization stores your soil amendments (treated, partially treated and raw) to prevent contamination of produce and the surrounding environment by:<br>";
	   $Sam5 = $Sam5 . $form_data['field'][206];
   }  
}
/* 8.1 */
/* 8.1.1 */
if ($form_data['field'][209] == "Yes"){
   $FH0 = "Pre-harvest risk assessment record(s) for $organization are attached to the appendix.<br>";
} else {
   $FH0 ="";
}
/* 8.2 */
/* 8.2.1 */
if ($form_data['field'][210] == "Yes"){
   $FH1 = "The list of equipment used at $organization is attached to the appendix.<br>";
} else {
   $FH1 ="";
}
if ($form_data['field'][211] == "Yes"){
   $FH1 .= "<br>$organization uses vehicles/production equipment in the fields which may pose a risk of contamination to produce (for example, vehicles which use fuel, oil, or hydraulic fluids<br>";
} else {
   $FH1 .="<br>$organization does NOT use vehicles/production equipment in the fields which may pose a risk of contamination to produce (for example, vehicles which use fuel, oil, or hydraulic fluids<br>";  
}
/* 8.2.2 */
if ($form_data['field'][212] == "Yes"){
   $FH2 = "$organization's  written policy outlining what to do in the event of leaks and spills (e.g. fuel, oil, hydraulic fluids) from vehicle(s)/production equipment in the field is attached to the appendix.<br>";
   $FH2 .= $form_data['field'][213] ;
} else {
   if ($form_data['field'][214] == "Yes"){
       $FH2 .= "$organization's employees have been trained on the following and are aware that petroleum products of any kind should not be stored or used within the perimeter of the farm fields unless there is a specific permanent structure built there for storing such fluids.<br>";
   }
   if ($form_data['field'][215] == "Yes"){
       $FH2 .= "$organization's employees have been trained on the following and are aware that all refueling must take place away from produce fields to minimize the risk of contamination to the fields or produce. <br>";
   }
   if ($form_data['field'][217] == "Yes"){
      $FH2 .= "$organization's employees have been trained on the following and are aware that if gas or oil is spilled in the field, the spill must be immediately stopped by turning off valves or plugging the source of the leak. <br>";
   }
   if ($form_data['field'][216] == "Yes"){
       $FH2 .= "$organization's employees have been trained on the following and are aware that after stopping the source of the spill, the contaminated soil must be removed from the ground and contained in a bucket, pail, or other nonporous container. <br>";
   }
   if ($form_data['field'][218] == "Yes"){
       $FH2 .= "$organization's employees have been trained on the following and are aware that all the soil that has visible oil stains or petroleum odor should be dug out and contained. <br>";

   }
   $FH2 .= $form_data['field'][219] ;
}

/* 8.2.3 */
if ($form_data['field'][220] == "Yes"){
   $FH3 = "$organization's written policy regarding foreign objects in harvesting operations is attached to the appendix. The policy includes what to do if there is glass/plastic breakage during harvesting and how to properly dispose of broken glass as applicable.<br>";
   $FH3 .= $form_data['field'][221] ;
     if ($form_data['field'][222] == "Yes"){
     $FH3 .= "<br>Where applicable, $organization inspects vehicles and/or equipment prior to harvest to ensure that there is no broken or cracked plastic or glass windows, fixtures, covers, or other parts that may contaminate produce. ";
	 if ($form_data['field'][223] == "Yes"){
         $FH3 .= "<br> These Inpsections are documented<br>";
         $FH3 .= $form_data['field'][224];
	 }
   }
} else {
   $FH3 ="";
}
/* 8.2.4 */
$FH4 ="";
if ($form_data['field'][225] == "Yes"){
   $FH4 = "Procedures used at $organization to reduce/control potential contamination during harvest such as scheduled repairs, cleaning/sanitizing frequencies, storage and handling procedures for food contact surfaces are attached to the appendix.<br><br>";
   $FH4 .= $form_data['field'][226]; 
}
 if ($form_data['field'][228] != ""){
   $FH4 .= "<br>Additional infroamtion:<br>";
   $FH4 .= $form_data['field'][228];
 }
 if ($form_data['field'][225] == "Yes"){
   $FH4 .= "<br>Records for maintenance, cleaning and sanitation activities for field vehicles and equipment are also attached to the appendix.<br>";
 }
/* 8.2.5 */
if ($form_data['field'][231] == "Yes"){
   if ($form_data['field'][230] == "Yes"){
	  $FH5 = "$organization'’s procedure on cleaning water tanks (such as those used for dust control) is attached to the appendix of this section. Written records for these cleaning activities are also attached to the appendix.<br><br>";
      $FH5 .= $form_data['field'][232];
   }
}
/* 8.3 */
/* 8.3.1 */
if ($form_data['field'][233] == "Yes"){
   $FH6 ="$organization's policy regarding containers, bins and packaging materials used for harvesting is attache in the appendix,<br>Information about the types of containers, bins and any packaging materials used for harvesting activities at is outlined below:<br>";
   $FH6 .= $form_data['field'][234];
   $FH6 .="<hr><h5>Best Practice Information</h5><h6 class='bpi'>FIELD EQUIPMENT INSPECTION PROCEDURES<br><ul>";
   $FH6 .="<li>Harvesting containers should be stored in a manner so they do not become a source of contamination to the extent possible and appropriate. </li>";
   $FH6 .="<liHarvesting totes should be cleaned and disinfected before each harvest season and whenever needed. There should not be any dirt or other debris allowed to accumulate in any container.</li>";
   $FH6 .="<li>Food-contact totes, bins, packing materials, other harvest containers, and pallets (as applicable) should be visually inspected, clean, intact functioning properly and free of any foreign materials prior to use.</li>";
   $FH6 .="<li>Containers should be sufficiently maintained so they do not become a source of contamination.</li>";
   $FH6 .="<li>If washed, wooden pallets and other wooden surfaces should be properly dried before use..</li>";
   $FH6 .="<li>The types and construction of harvest containers and packing materials should be appropriate to the commodity being harvested and be suitable for their intended use1. The key point is that the containers and equipment being used do not to serve as a source of contamination with pathogens and are free of objects that may become embedded in product (e.g., material is in good repair, no splinters, glass).</li>";
   $FH6 .="<li>Food-contact totes, bins and other harvest containers designated for harvesting should only be used for harvestingand if  something other than produce is placed in a harvesting tote, that tote must be cleaned or disinfected.</li>";
   $FH6 .="<li>Food-contact totes, bins and other harvest containers and equipment that are no longer cleanable should be retired or disposed of.</li>";
   $FH6 .="<ul><li>Those which are not disposed of need to be clearly marked or labeled for non-food use only to prevent accidental use in food contact activities.</li></ul>";
   $FH6 .="<li>There is a policy prohibiting walking, stepping, or lying on produce, food contact surfaces or packaging materials.</li>";
   $FH6 .="</ul></h6><hr><hr>";
   $FH6 .="<br>Employees are aware of s policy regarding containers, bins and packaging materials used for harvesting as outlined below:<br>";
   if ($form_data['field'][237] == "Yes"){
      $FH6 .="Harvesting containers should be stored in a manner so they do not become a source of contamination to the extent possible and appropriate. <br>";
   }
   if ($form_data['field'][235] == "Yes"){
      $FH6 .="Harvesting totes should be cleaned and disinfected before each harvest season and whenever needed. There should not be any dirt or other debris allowed to accumulate in any container.<br>";
   }  
   if ($form_data['field'][243] == "Yes"){
      $FH6 .="Food-contact totes, bins, packing materials, other harvest containers, and pallets (as applicable) should be visually inspected, clean, intact functioning properly and free of any foreign materials prior to use.<br>";
   }
   if ($form_data['field'][242] == "Yes"){
      $FH6 .="Containers should be sufficiently maintained so they do not become a source of contamination.<br>";
   }
   if ($form_data['field'][241] == "Yes"){
      $FH6 .="If washed, wooden pallets and other wooden surfaces should be properly dried before use.<br>";
   }
   if ($form_data['field'][240] == "Yes"){
      $FH6 .="The types and construction of harvest containers and packing materials should be appropriate to the commodity being harvested and be suitable for their intended use. The key point is that the containers and equipment being used do not to serve as a source of contamination with pathogens and are free of objects that may become embedded in product (e.g., material is in good repair, no splinters, glass).<br>";
   }
   if ($form_data['field'][259] == "Yes"){
      $FH6 .="Food-contact totes, bins and other harvest containers designated for harvesting should only be used for harvesting and if  something other than produce is placed in a harvesting tote, that tote must be cleaned or disinfected.<br>";
   }
   if ($form_data['field'][238] == "Yes"){
      $FH6 .="Food-contact totes, bins and other harvest containers and equipment that are no longer cleanable should be retired or disposed of.<br>";
   }
   if ($form_data['field'][236] == "Yes"){
      $FH6 .="There is a policy prohibiting walking, stepping, or lying on produce, food contact surfaces or packaging materials.<br>";
   }
} else {
   $FH6 ="";
}
/* 8.4 */
/* 8.4.1 */
if ($form_data['field'][244] == "Yes"){
   $FH7 ="$organization's procedure to ensure quality of the water/ice that contacts product or food contact surfaces during harvesting activities is attached to the appendix.<br><br>";
   $FH7 .= $form_data['field'][245];
   if ($form_data['field'][247] == "Yes"){
	   $FH7 .="$organization grows crops where deliberate flooding of the field is part of production and harvest practices.<br><br>";
   }
   if ($form_data['field'][250] == "Yes"){
	   $FH7 .="Re-circulated water is used at $organization.<br><br>";
   }
   if ($form_data['field'][251] == "Yes"){
	   $FH7 .="A procedure is attached to the appendix which outlines that this re-circulated water is treated using an approved antimicrobial as per prevailing regulation or industry specific standards for the commodity.<br><br>";
   }
   if ($form_data['field'][253] == "Yes"){
	   $FH7 .="Water treatment and monitoring records are attached to the appendix.<br><br>";
  }
   if ($form_data['field'][254] != ""){
	   $FH7 .= $form_data['field'][254];
	   $FH7 .= "<br><br>";
   }
   if ($form_data['field'][252] == "Yes"){
	   $FH7 .="A procedure is attached to the appendix addressing the condition and maintenance activities for the water-delivery system used during harvesting activities at $organization.<br><br>";
   }
   if ($form_data['field'][256] == "Yes"){
	   $FH7 .="Maintenance activity records are attached to the appendix.<br><br>";
   }
   if ($form_data['field'][257] != ""){
	   $FH7 .= $form_data['field'][257];
	   $FH7 .= "<br><br>";
   }
   if ($form_data['field'][255] == "Yes"){
	   $FH7 .="Produce types which are known to be susceptible to microbial infiltration, are washed during harvest activities at $organization.<br><br>";
   }   
   if ($form_data['field'][258] == "Yes"){
	   $FH7 .="Procedures addressing control of wash water temperature are attached to the appendix.<br><br>";
   }
   if ($form_data['field'][261] != ""){
	   $FH7 .= $form_data['field'][261];
	   $FH7 .= "<br><br>";
   }  
} else {
   $FH7 ="";
}
/* 8.5 */
/* 8.5.1 */   
if ($form_data['field'][262] == "Yes"){
   $FH8 ="The procedure(s) used at $organization to minimize contamination risk to harvested produce (from damaged or decayed produce) is attached to the appendix.<br><br>";
} else {
   $FH8 =$form_data['field'][263] ;
   $FH8 .= "<br><br>";
}
if ($form_data['field'][264] == "Yes"){
   if ($form_data['field'][265] == "Yes"){
  	   $FH8 .="$organization has a policy that as much dirt, mud and debris as practicable should be removed from the produce before it leaves the field. <br><br>";
	   if ($form_data['field'][266] == "Yes") {
	       $FH8 .="$organization's procedure for what to do when harvest product that contacts the ground (e.g., drops) is attached to the appendix.<br><br>";
	   }
   } else {
  	   $FH8 .=$form_data['field'][267] ;
       $FH8 .= "<br><br>";
   }
}
if ($form_data['field'][268] == "Yes"){
  	   $FH8 .=$form_data['field'][269] ;
       $FH8 .= "<br><br>";
}
 $FH8 .=$form_data['field'][270] ;
$FH8 .= "<br>";
/* 8.6 */
/* 8.6.1 */ 
if ($form_data['field'][271] == "Yes"){
   if ($form_data['field'][272] == "Yes"){
	  $FH9 = "Documentation demonstrating suitability and safety of packaging materials for the commodities being harvested at $organization (if applicable) is attached to the appendix.<br><br>";
	  $FH9 .= $form_data['field'][273];
	  $FH9 .= "<br><br>";
   }
   if ($form_data['field'][274] == "Yes"){
	  $FH9 .= "$organization's policy on direct contact of packaging materials with soil is attached to the appendix.<br><br>";
   }
   $FH9 .= $form_data['field'][275];
   $FH9 .= "<br><br>";
} else {
   $FH9 = "";
}
/* 8.7 */
/* 8.7.1 */
if ($form_data['field'][276] == "Yes"){
   $FH10 = "$organization's written policy regarding produce handling and storage postharvest is attached to the appendix.<br><br>";
   $FH10 .= $form_data['field'][277];
   $FH10 .= "<br><br>";
} else {
   $FH10 = "";
}
/* 8.8 */
/* 8.8.1 */
if ($form_data['field'][276] == "Yes"){
   $FH11 = "Please see the appendix of $organization's food safety plan for documented training records for relevant employees on:<ul><li>Scheduled repair, cleaning, sanitizing, storage and handling procedures associated with food contact surfaces</li><li>Cleaning of water tanks, e.g. used for dust control (if applicable)</li><li>Vehicle and equipment leaks and spills policy (if applicable)</li><li>Foreign object contamination in the field and glass breakage policy</li><li>Storage, inspection and acceptable use of containers, bins and packaging materials policy</li><li>Procedures for ensuring quality of water/ice that contacts product or food contact surfaces during harvesting activities (if applicable)</li><li>Policy covering selective harvest of only sound produce to minimize contamination risks</li><li>Policy of storage of packaging materials for field packing (if applicable)</li><li>Policy covering produce handling and storage postharvest</li></ul><br>";
   $FH11 .= $form_data['field'][277];
   $FH11 .= "<br><br>";
} else {
   $FH11 = "";
}
/* 9.1 */
/* 9.1.1 */
if ($form_data['field'][284] == "Yes"){
   $TFP1 = "Vehicles/shipping units are dedicated to transport of produce at $organization.";
} else {
   $TFP1 = "Vehicles/shipping units are not dedicated to transport of produce at $organization.";
}
if ($form_data['field'][281] == "Yes"){
   $TFP1 .= "$organization has a policy to verify cleanliness and suitability of vehicle cargo bays/shipping units used to transport produce.  ";
   if ($form_data['field'][282] == "Yes"){
     $TFP1 .= "This written policy is attached to the appendix of this section.";
     if ($form_data['field'][290] == "Yes"){ 
         $TFP1 .= "<br><br>The record(s)/checklist for inspections addressing cleanliness and suitability are also attached to the appendix.";
	 }
   }
} else {
	   $TFP1 .= "<br><br>Employees responsible for the loading and unloading of produce at are aware that:<ul>";
   if ($form_data['field'][285] == "Yes"){ 
       $TFP1 .= "<li> Vehicle/shipping units used to transport produce should be clean, functional and free of objectionable odors before loading.</li>";
   }
   if ($form_data['field'][286] == "Yes"){ 
       $TFP1 .= "<li>Refrigeration units, if used, must be in working order.</li>";
   }
   if ($form_data['field'][287] == "Yes"){ 
       $TFP1 .= "<li>Trash should not come in contact with produce.</li>";
   }
   if ($form_data['field'][288] == "Yes"){ 
       $TFP1 .= "<li>Trash removed from field packing operations should be handled and transported out of the field in a manner that does not pose a contamination hazard to produce.</li>";
   }
   if ($form_data['field'][289] == "Yes"){ 
       $TFP1 .= "<li>Cargo areas and containers that have been used to transport trash, animals, raw animal products or other items that may be a source of contamination with pathogens must first be cleaned and sanitized to ensure that contamination of produce does not occur.</li>";
   }
   $TFP1 .= "</ul>";
}
$TFP1 .= "<br><br>";
$TFP1 .= $form_data['field'][283] ;
/* 9.1.2 */
if ($form_data['field'][291] == "Yes"){
   $TFP2 = "$organization's policy on loading and unloading produce and any associated equipment cleaning/maintenance requirements are attached to the appendix.<br><br>";
   if ($form_data['field'][292] == "Yes"){
	  $TFP2 .= "A written record of cleaning and maintenance of loading and unloading equipment is also attached to the appendix.<br>";
   }
} else {
   $TFP2 = "Employees responsible for the loading and unloading of produce at $organization are aware that:<ul>";
   if ($form_data['field'][293] == "Yes"){ 
       $TFP2 .= "<li>They should take steps to minimize physical damage to produce, which can introduce and/or promote the growth of pathogens.</li>";
   }
   if ($form_data['field'][294] == "Yes"){ 
       $TFP2 .= "<li>Loading/unloading equipment should be clean and well maintained and of a suitable type to avoid contamination of the produce.</li>";
   }
   $TFP2 .= "</ul>";
   if ($form_data['field'][295] == "Yes"){    
       $TFP2 .= "<br>A written record of cleaning and maintenance of loading and unloading equipment is also attached to the appendix.<br>";
}
}
$TFP2 .= "<br><br>";
$TFP2 .= $form_data['field'][296] ;
/* 9.1.3 */
if ($form_data['field'][297] == "Yes"){
   $TFP3 = "$organization's written policy regarding produce handling and storage postharvest is attached to the appendix.<br><br>";
   $TFP3 = $form_data['field'][298];
}
/* 9.2 */
/* 9.2.1 */
//static content here
/* 10.1 */
/* 10.1.1 */
if ($form_data['field'][303] == "Yes"){
   $PHA0 = "An approved supplier list is attached to the appendix of the food safety manual.<br><br>";
}
if ($form_data['field'][304] == "Yes"){
   $PHA0 .= "The procedure used at to approve suppliers, including the process for accepting materials from alternate sources, is attached to the appendix.<br><br>";
} else {
   $PHA0 .= $form_data['field'][305] ;
}
/* 10.1.2 */
if ($form_data['field'][308] == "Yes"){
   $PHA1  = "Documentation for raw product suppliers is attached to the appendix which provides evidence of compliance with food safety/GAP programs and the Field Operations and Harvesting section of the Harmonized GAP Standard.<br><br>";
}
$PHA1  .= $form_data['field'][307] ;
/* 10.2 */
/* 10.2.1 */
if ($form_data['field'][309] == "Yes"){
   $PHA2 = "$organization properly maintains non-product/packaging material storage areas in order to minimize contamination risks.<br><br>";
   $PHA2 .= $form_data['field'][310];
   if ($form_data['field'][311] == "Yes"){
	  $PHA2  .= "Chemicals are stored in a separate AND secure area.<br>";
   }
}
/* 10.3 */
/* 10.3.1 */
if ($form_data['field'][312] == "Yes"){
   $PHA3 = "$organization’s written policy regarding storage, inspection, handling and proper use of food contact containers and bins for packinghouse activities is attached to the appendix. <br><br>";
   $PHA3 .= $form_data['field'][313];
   if ($form_data['field'][314] == "No"){
	  if ($form_data['field'][315] == "Yes"){
	     $PHA3  .= "The policy on direct contact of product-contact containers with the ground is attached to the appendix of the food safety plan..<br>";
      } else {
		 $PHA3  .= $form_data['field'][316];
	}
   }
} else {
   $PHA3 = "$organization’s employees been trained in the following and are aware that:<ul>";
   if ($form_data['field'][317] == "Yes"){
      $PHA3 .= "<li>product-contact containers (e.g., harvest bins, totes, crates, sacks, buckets, finished product clam shells, bags or packaging films), should be stored, or handled (e.g., cleaned prior to post-storage use), so they do not become a source of contamination. </li>";
   }
   if ($form_data['field'][318] == "Yes"){
      $PHA3 .= "<li>food-contact totes, bins, packing materials, other harvest containers, and pallets should be visually inspected, clean, intact and free of any foreign materials prior to use</li>";
   }
   if ($form_data['field'][319] == "Yes"){
      $PHA3 .= "<li> the types and construction of product-contact containers and packing materials should be appropriate to the commodity being handled and suited to their intended purpose </li>";
   }
   if ($form_data['field'][320] == "Yes"){
      $PHA3 .= "<li>produce should only be stored in clean and sanitary containers </li>";
   }   
   if ($form_data['field'][321] == "Yes"){
      $PHA3 .= "<li>pallets (if used) should be inspected prior to use for conditions that may be a source of produce contamination </li>";
   }
   if ($form_data['field'][322] == "Yes"){
      $PHA3 .= "<li>pallets (if used) that cannot be cleaned should be removed from use </li>";
   }
   if ($form_data['field'][323] == "Yes"){
      $PHA3 .= "<li>pallets and other wooden surfaces should be properly dried after being washed </li>";
   }
   $PHA3 .= "</ul><br>";
   if ($form_data['field'][324] == "Yes"){
      $PHA3 .= "$organization requires that food-contact totes, bins and other packing containers and equipment designated for packing activities only be used for packing activities. <br><br>";
   }   else {
	     if ($form_data['field'][328] == "Yes"){
			$PHA3 .= "$organization's policy or procedure that clearly outlines approved non-product contact containers and equipment uses and how the containers and equipment are to be marked or labeled is attached in the appendix.";
		 } else {
		    $PHA3  .= $form_data['field'][329];			
		 }
   }
   $PHA3 .= "<br><br>";
     if ($form_data['field'][325] == "Yes"){
      $PHA3 .= "$organization disposes of packing containers and equipment that can no longer be cleaned. <br><br>";
   }   else {
	     if ($form_data['field'][330] == "Yes"){
			$PHA3 .= "$organization retires packing containers and equipment and have them clearly marked or labeled for non-food use only to prevent accidental use in food contact activities.";
		 } else {
		    $PHA3  .= $form_data['field'][331];			
		 }
   }
   $PHA3 .= "<br><br>";
   if ($form_data['field'][326] == "Yes"){
      $PHA3 .= "The produce in $organization's packinghouse normally contacts the ground during production stages (e.g. tuber crops).<br><br> ";
   }   else {
	     if ($form_data['field'][332] == "Yes"){
			$PHA3 .= "$organization's policy regarding whether product-contact containers ground contact is attache in the appendix.";
		 } else {
		    $PHA3  .= $form_data['field'][333];			
		 }
   }
   $PHA3 .= "<br><br>";
   $PHA3  .= $form_data['field'][327];		
}
/* 10.4 */
/* 10.4.1 */
if ($form_data['field'][334] == "Yes"){
   $PHA4 = "$organization's packinghouse is designed in a way to help minimize contamination risks.<br><br>";
   $PHA4 .= $form_data['field'][335];
   if ($form_data['field'][336] == "Yes"){
	  if ($form_data['field'][337] == "Yes"){
		 $PHA4 .= "The glass and brittle plastic control policy for $organization's packinghouse, including why these materials are used is attached to the appendix. A glass and brittle plastic register of the materials and where they are used is also attached to the appendix.";
	  }
   }
}
/* 10.4.2 */
if ($form_data['field'][338] == "Yes"){
   if ($form_data['field'][339] == "Yes"){
       $PHA5 = "The sewage disposal system at is adequate for packinghouse processes and is maintained to prevent direct or indirect product contamination.<br><br>";
       if ($form_data['field'][340] == "Yes"){
		  $PHA5 .= "Written records for maintenance activities are attached to the appendix.<br>";
	   }
   }
}
/* 10.5 */
/* 10.5.1 */
if ($form_data['field'][341] == "Yes"){
   $PHA6 = "$organization uses lubricants in the packinghouse. <br>";
   if ($form_data['field'][342] == "Yes"){
	  $PHA6 .= "<br>";
	  $PHA6 .= $form_data['field'][343];
   }
}else {
   $PHA6 = "$organization does not use lubricants in the packinghouse. <br>";
}
/* 10.5.2 */
if ($form_data['field'][344] == "Yes"){
   $PHA7 = "$organization's preventive maintenance and/or cleaning and sanitation covering all food and non-food contact surfaces in the packinghouse is attached to the appendix. <br>";
}
$PHA7 .= $form_data['field'][345];
$PHA7 .= "<br><br>";
if ($form_data['field'][346] == "Yes"){
   $PHA7 = "$organization's written procedures for cleaning and sanitation activities for food contact surfaces, tools and equipment, and equipment used for cooling (e.g. hydro coolers, air coolers) are attached to the appendix. <br><br>";
   $PHA7 .= $form_data['field'][347];
} else {
   $PHA7 .= $form_data['field'][348];
   $PHA7 .= "<br><br>";
}
if ($form_data['field'][349] == "Yes"){
   $PHA7 = "$organization's preventive maintenance records are attached to the appendix. <br><br>";
}
if ($form_data['field'][350] == "Yes"){
   $PHA7 = "$organization's procedure to ensure that any temporary repairs must not create a potential contamination source/food safety risk and that permanent repairs are implemented in a timely manner is attached to the appendix. <br><br>";
} else {
   $PHA7 .= $form_data['field'][351];
   $PHA7 .= "<br><br>";
}
/* 10.5.3 */
if ($form_data['field'][352] == "Yes"){
   $PHA8 = "Equipment and tools used for cleaning the packinghouse at are kept clean, in good working order and stored properly away from product handling areas. <br><br>";
   $PHA8 .= $form_data['field'][353];
   $PHA8 .= "<br><br>";
   if ($form_data['field'][354] == "Yes"){
	  if ($form_data['field'][355] == "Yes"){
	     $PHA8 .= "Cleaning agents and/or sanitizers used on food contact surfaces in the packinghouse are approved for use on food contact surfaces according to the chemical manufacturer and all federal, state and local requirements.<br><br>";
	  }
   }
   $PHA8 .= "Any information used to verify compliance (e.g. purchasing practices, use procedures, MSDS sheetsetc) are attached to the appendix.<br><br>";
   $PHA8 .= $form_data['field'][356];
}
   $PHA8 .= "<br>";
   
/* 10.5.4 */
if ($form_data['field'][357] == "Yes"){
   $PHA9 = "All food-contact equipment, tools and utensils used in the packinghouse at are designed and made of materials that are easily cleaned and maintained. <br><br>";
   $PHA9 .= $form_data['field'][358];
}
$PHA9 .= "<br>";
/* 10.6 */
/* 10.6.1 */
if ($form_data['field'][359] == "Yes"){
   if ($form_data['field'][360] == "Yes"){
      $PHA10 = "$organization's procedure to ensure quality of the water/ice that contacts product or food contact surfaces during packinghouse activities is attached to the appendix.<br><br>";
      $PHA10 .= $form_data['field'][361] ;
	  $PHA10 .= "<br><br>";
   } else {
	  $PHA10 .= $form_data['field'][362] ;
	  $PHA10 .= "<br><br>";
   }
   if ($form_data['field'][363] == "Yes"){
	  $PHA10 .= "$organization uses sanitizing chemicals for water sources other than re-circulated water. <br><br>" ;
	  if ($form_data['field'][364] == "Yes"){
	     $PHA10 .= "$organization has written records of your water treatments and monitoring.<br><br>" ;
      }
   }
   if ($form_data['field'][365] == "Yes"){
	  $PHA10 .= "$organization reuses water in packinghouse activites. " ;
	  if ($form_data['field'][366] == "Yes"){
	      $PHA10 .= "$organization has the following water-change schedules developed for all uses of water where water is re-used:<br>" ;
		  $PHA10 .= $form_data['field'][368] ;
	  }
	  $PHA10 .= "<br><br>";
      if ($form_data['field'][367] == "No"){
	  	  $PHA10 .= "Recirculated water does not come in contact with product or food contact surfcaces.<br><br>" ;
	  } else {
		  if ($form_data['field'][369] == "Yes"){
	  	      $PHA10 .= "Re-circulated water that contacts product or food contact surfaces is treated using an approved antimicrobial process or chemical treatment sufficient to prevent cross-contamination as per prevailing regulation or industry specific standards for the commodity.  " ;
			  if ($form_data['field'][371] == "Yes"){
	  	         $PHA10 .= "Records of $organization's water treatments and monitoring are attached in the appendix";
			  }
	      } else {
		      $PHA10 .= $form_data['field'][370] ;
	      }
		  $PHA10 .= "<br><br>";
	  }
   } else {
	  $PHA10 .= "$organization does not reuse water in packinghouse activites.<br><br>" ;
   }
   if ($form_data['field'][372] == "Yes") {
	     if ($form_data['field'][373] == "Yes") {
			$PHA10 .= "Written procedures addressing control of water temperature are attached in the appendix. ";
			if ($form_data['field'][374] == "Yes") {
			   $PHA10 .= "  In Addition, records of water temperature measurments are attached in the appendix.";
			}
			
		 }
   } else {
	  $PHA10 .= "$organization minimizes product contamination risk through microbial infiltration from water by: <br>";
	  $PHA10 .= $form_data['field'][375] ;
   }
   $PHA10 .= "<br><br>";
   $PHA10 .= $form_data['field'][376];
   $PHA10 .= "<br>";
} else {
   $PHA10 = "$organization does not use water or ice in packinghouse activites<br>";
}
/* 10.6.2 */
if ($form_data['field'][359] == "Yes"){
   if ($form_data['field'][377]){
	  $PHA11 = "A description of the water source(s) and distribution system used at is attached to the appendix.  <br<br>";
	  if ($form_data['field'][378]){
		 $PHA11 = "A procedure is attached to the appendix addressing the condition and maintenance activities for the water-delivery system used during packinghouse activities at $organization.<br><br>Maintenance activity records are also attached to the appendix.<br><br>";
	  }
	  $PHA11 .= $form_data['field'][382];
	  $PHA11 .= "<br><br>";
	  if ($form_data['field'][383] =="Yes"){
		 $PHA11 .= "Water installations and equipment at are constructed and maintained to prevent back siphonage backflow and cross connections between product contact water and waste water.<br><br>";
	     if ($form_data['field'][384] =="Yes"){
			$PHA11 .= "Routine checks are performed annually (or as needed to maintain continuous protection) to verify that back siphonage and backflow prevention units are functioning properly. ";
			if ($form_data['field'][385] =="Yes"){
			   $PHA11 .= "Records documenting these routine checks are attached to the appendix.<br>";
		    }
		 }
	  }
	  $PHA11 .= "<br>";
   }
} else {
   $PHA11 = "$organization does not use water or ice in packinghouse activites<br>";
}
/* 10.7 */
/* 10.7.1 */
if ($form_data['field'][359] == "Yes"){
    if ($form_data['field'][386] == "Yes"){
	    if ($form_data['field'][387] == "Yes"){
	       $PHA12 = "Please find attached to the appendix the risk assessment performed for washing process(es) at $organization.<br><br>";
		}
   	    if ($form_data['field'][388] == "Yes"){
	       $PHA12 .= "A procedure outlining that debris and damaged produce should be removed from wash areas/dump tanks to the extent possible is attached to the appendix.<br><br>";
		}
		$PHA12 .= $form_data['field'][389] ;
	}else {
	  $PHA12 = "$organization does not wash produce<br>";
	}
} else {
   $PHA12 = "$organization does not use water or ice in packinghouse activites<br>";
}
/* 10.7.2 */
if ($form_data['field'][359] == "Yes"){
    if ($form_data['field'][390] == "Yes"){
	  $PHA13 = "Antimicrobial chemicals are used in wash water at $organization. <br><br>";
	    if ($form_data['field'][391] == "Yes"){
		 $PHA13 .= "Documents showing regulatory approval for the wash water antimicrobials in use at $organization are attached to the appendix.<br><br>";		 
	    }
	    if ($form_data['field'][394] == "Yes"){
		  $PHA13 .= "The procedure used at $organization to control, monitor and record use of wash water antimicrobials (including corrective actions if minimum limits are not met) is attached to the appendix.<br><br>";
  	    } else {
	      $PHA13 .= $form_data['field'][395];
		  $PHA13 .= "<br><br>";
	    }
	    if ($form_data['field'][396] == "Yes"){
	      $PHA13 .= "Records for water treatment monitoring of wash water are attached to the appendix.<br><br>";		 
	    }
		$PHA13 .= $form_data['field'][397];
	    $PHA13 .= "<br>"; 
      } else {
	  $PHA13 = "Antimicrobial chemicals are not used in wash water at . $organization. <br><br>";
	}
} else {
   $PHA13 = "$organization does not use water or ice in packinghouse activites<br>";
}
/* 10.8 */
/* 10.8.1 */
if ($form_data['field'][359] == "Yes"){   
   if ($form_data['field'][398] == "Yes"){
      $PHA14 = "$organization uses the following types of instruments to monitor variables that impact food safety.<br><br>";
	  $PHA14 .= $form_data['field'][400];
	  if ($form_data['field'][401] == "Yes"){
		 $PHA14 .= "These instruments are calibrated at a sufficient frequency to ensure continuous accuracy. Calibration frequencies are outlined below:<br><br>";
	     $PHA14 .= $form_data['field'][402];
	  }
	  if ($form_data['field'][403] == "Yes"){
		 $PHA14 .= "Records for these calibration/verification activities are attached to the appendix.<br>";
	  }
   } else {
	  $PHA14 = $form_data['field'][399];
   }
}else {
   $PHA13 = "$organization does not use water or ice in packinghouse activites<br>";
}
/* 10.9 */
/* 10.9.1 */
if ($form_data['field'][404] == "Yes"){
   $PHA15 = "Microbial testing is performed at $organization.";
   if ($form_data['field'][405] == "Yes"){
	  $PHA15 .= "A policy is attached to the appendix which covers minimum accreditation requirements for testing lab(s) used, sampling procedures, test frequency and type of testing to be performed and responsibilities and actions to be taken based on results attached to the appendix.<br><br>";
	  $PHA15 .= $form_data['field'][419];
	  $PHA15 .= "<br><br>";
	  if ($form_data['field'][420] == "Yes"){
		 $PHA15 .= "Tests, their results and any corrective actions are attached to the appendix.<br><br>";	  
	  }
	  if ($form_data['field'][421] == "Yes"){
		 $PHA15 .= "$organization tests finished product for pathogens or other contaminants. <br><br> ";
	     if ($form_data['field'][422] == "Yes"){
		    $PHA15 .= "A written procedure that outlines that product should not be distributed outside your operation’s control until test results are obtainedattached to the appendix.";
	     }
		 $PHA15 .= $form_data['field'][419];
	     $PHA15 .= "<br><br>";
	  }
   } else {
	  $PHA15 .= $form_data['field'][406];
	  $PHA15 .= "<br><br>";
	  $PHA15 .= "Microbial Sampling is done by: <br><br>";
	  $PHA15 .= $form_data['field'][407];
	  $PHA15 .= "<br><br>";
	  if ($form_data['field'][408] == "Yes"){
		 $PHA15 .= "Written procedure for sampling are attached in the appendix<br><br>";
	  }else{
		 $PHA15 .= $form_data['field'][409];
	     $PHA15 .= "<br><br>";
	  }
	  $PHA15 .= "Lab testing for $organization is done at:<br><br>";
	  $PHA15 .= $form_data['field'][410];
	  $PHA15 .= "<br><br>";
	  $PHA15 .= $form_data['field'][411];
	  $PHA15 .= "<br><br>";
	  if ($form_data['field'][412] == "Yes"){
	     $PHA15 .= "This testing lab provides acceptance limits/criteria for assessing microbial test results.";
		 $PHA15 .= "If lab test results are out of limits:<br><br>";
	     $PHA15 .= $form_data['field'][413];
	     $PHA15 .= "<br><br>The lab test acceptance limits/criteria used at $organization are:<br><br>";
	     $PHA15 .= $form_data['field'][414];
	     $PHA15 .= "<br><br>";
	  }
	  if ($form_data['field'][415] == "Yes"){
		 $PHA15 .= "$organization tests finished product for pathogens or other contaminants.<br><br>";
	  }
	  if ($form_data['field'][416] == "Yes"){
		 $PHA15 .= "$organization's written procedure that outlines that product should not be distributed outside $organization operation’s control until test results are obtaine are attached in the appendix<br><br>";
	  }else{
		 $PHA15 .= $form_data['field'][418];
	     $PHA15 .= "<br><br>";
	  }
   }
	  $PHA15 .= $form_data['field'][419];
	  $PHA15 .= "<br><br>";
}

/* 10.10 */
/* 10.10.1 */
if ($form_data['field'][424] == "Yes"){
   if ($form_data['field'][425] == "Yes"){
	  $PHA16 = "Temperature monitoring equipment is located in all temperature controlled areas at $organization.<br><br>";
	  if ($form_data['field'][427] == "Yes"){
	     $PHA16 .= "Temperature measuring devices at are located so as to monitor the warmest part of the room.Frequency of monitoring of cooling unit(s) temperatures is outlined below:<br><br>";
		 $PHA16 .= $form_data['field'][428];
	     $PHA16 .= "<br><br>";
		 if ($form_data['field'][430] == "Yes"){
			$PHA16 .= "Records for temperature monitoring activities are attached to the appendix.<br><br>";
		 }
      }
	  if ($form_data['field'][433] == "Yes"){
		 $PHA16 .= "Temperature measuring devices used at are calibrated/verified on a scheduled basis and as needed. Calibration/verification frequency for temperature measuring devices is outlined below:<br><br>";
		 $PHA16 = $form_data['field'][432];
	     $PHA16 .= "<br><br>";	 
	  }
	  $PHA16 = $form_data['field'][429];
	     $PHA16 .= "<br><br>";	
   } else {
	  $PHA16 = $form_data['field'][426];
	  $PHA16 .= "<br><br>";	  
   }
}

/* 10.11 */
/* 10.11.1 */
if ($form_data['field'][431] == "Yes"){
   if ($form_data['field'][434] == "Yes"){
	  $PHA17 = "The register of packaging specifications (for packaging that could impact finished product safety and quality) and label approvals (if applicable) is attached to the appendix.<br><br>";
	  $PHA17 .= $form_data['field'][436];
	  $PHA17 .= "<br><br>";
	  if ($form_data['field'][439] == "Yes"){
		 $PHA17 .= "Methods and responsibilities for developing and approving specifications and labels for packaging at are attached to the appendix.<br>";
	  }
   } else {
	  $PHA17 .= $form_data['field'][438];
	  $PHA17 .= "<br>";
   }
} else {
   $PHA17 = "$organization does not use packaging materials for finished products<br>";
}

/* 10.12 */
/* 10.12.1 */
if ($form_data['field'][440] == "Yes"){
   if ($form_data['field'][441] == "Yes"){
	  $PHA18 = "The Allergen Control Policy used at is attached to the appendix<br><br>";
   } else {
      $PHA18 .= $form_data['field'][442];
	  $PHA18 .= "<br><br>";
   }
   $PHA18 .= $form_data['field'][443];
   $PHA18 .= "<br><br>";
} else {
   $PHA18 = "$organization packinghouse facility does not process produce that may contain allergens<br>";
}
/* 10.13 */
/* 10.13.1 */
if ($form_data['field'][444] == "Yes"){
   $PHA19 = "Please see the appendix of $organization's food safety plan for documented training records for applicable employees on:<ul><li>Procedure for approving raw material suppliers, including accepting materials from alternate sources</li><li>Policy regarding storage, inspection, handling and proper use of food contact containers and bins</li><li>Glass and brittle plastic control policy, including when/why these materials need to be used</li><li>Procedures for ensuring the quality of water/ice that contacts product or food contact surfaces (e.g. treating water with antimicrobial chemicals, water re-use policies, control of wash/immersion water temperature, water delivery system maintenance procedures, debris removal and water change frequencies etc (as applicable)</li><li>Allergen Control Policy (if applicable)</li><li>Policy for microbial testing requirements (if applicable)</li><li>Procedures associated with your Preventive Maintenance and/or Master Cleaning Schedule</li></ul>";
}

/* 11.1 */
/* 11.1.1 */
if ($form_data['field'][447] == "Yes"){
   $FTP0 = "$organization has a policy to verify cleanliness and suitability of vehicle cargo bays/shipping units used to transport produce. This written policy is attached to the appendix of this section.<br><br>";
   $FTP0 .= $form_data['field'][448];
   $FTP0 .= "<br><br>";
} else {
   $FTP0 = "";
   if ($form_data['field'][450] == "Yes"){
	  $FTP0 .= "Vehicles/shipping units are dedicated to transport of produce at $organization";
   } else {
	  $FTP0 .= "Vehicles/shipping units are not dedicated to transport of produce at $organization";
   }
   $TFP0 .= "Employees been trained and made aware that:<ul>";
   if ($form_data['field'][453] == "Yes"){
	  $TFP0 .= "</li>Vehicle/shipping units used to transport produce should be clean, functional and free of objectionable odors before loading.</li>";
   }
   if ($form_data['field'][454] == "Yes"){
	  $TFP0 .= "</li>Refrigeration units, if used, must be in working order.</li>";
   }
   if ($form_data['field'][455] == "Yes"){
	  $TFP0 .= "</li>Trash should not come in contact with produce.</li>";
   }
   if ($form_data['field'][456] == "Yes"){
	  $TFP0 .= "</li>Raw animal or animal product, or other materials that may be a source of contamination are prohibited from final product transport vehicles.</li>";
   }
   if ($form_data['field'][457] == "Yes"){
	  $TFP0 .= "</li>Trash removed from packing operations should be handled and transported in a manner that does not pose a contamination hazard to produce.</li>";
   }
   if ($form_data['field'][458] == "Yes"){
	  $TFP0 .= "</li>Cargo areas and containers that have been used to transport trash, animals, raw animal products or other items that may be a source of contamination with pathogens must first be cleaned and sanitized to ensure that contamination of produce does not occur.</li>";
   }
   $TFP0 .= "</ul><br>";
}
if ($form_data['field'][459] == "Yes"){
   $TFP0 .= "The record(s)/checklist for inspections addressing cleanliness and suitability are also attached to the appendix.<br><br>";
}
if ($form_data['field'][461] == "Yes"){
   $TFP0 .= "$organization has a responsible person signing off the completed checklist/inspection report.<br><br>";
}
$FTP0 .= $form_data['field'][463];
$FTP0 .= "<br>";

/* 11.1.2 */
if ($form_data['field'][464] == "Yes"){
   $TFP1 = "Procedures for produce loading and unloading which outline practices to minimize damage and contamination attached to the appendix.<br>";
} else {
   $TFP1 = "Employees responsible for the loading and unloading of produce at are aware that:<ul>";
   if ($form_data['field'][465] == "Yes"){
	  $TFP1 .= "<li>They shall take steps to minimize physical damage to produce, which can introduce and/or promote the growth of pathogens.</li>";
   }
   if ($form_data['field'][465] == "Yes"){
	  $TFP1 .= "<li>Loading/unloading equipment should be clean and well maintained and of a suitable type to avoid contamination of the produce.</li>";
   }
   $TFP1 .= "</ul><br>";
}
if ($form_data['field'][467] == "Yes"){
   $TFP1 = "A written record of cleaning and maintenance of loading and unloading equipment is also attached to the appendix.<br><br>";
}
$FTP1 .= $form_data['field'][468];
$FTP1 .= "<br>";
/* 11.2 */
/* 11.2.1 */
if ($form_data['field'][469] == "Yes"){
   $TFP2 = "The written policy outlining temperature ranges required to be maintained for commodities being transported to customers is outlined below. The policy is accessible to those transporting the product.<br><br>";
   $FTP2 .= $form_data['field'][470];
   $FTP2 .= "<br><br>";
   if ($form_data['field'][471] == "Yes"){
	  $FTP2 .= "Vehicles are pre-cooled at for applicable commodities prior to transport.  ";
      if ($form_data['field'][472] == "Yes"){
	      $FTP2 .= "Records are attached to the appendix which document pre-cooling activities.";
      }
	   $FTP2 .= "<br><br>";
   }
   if ($form_data['field'][473] == "No"){
	  $FTP2 .= $form_data['field'][474];
      $FTP2 .= "<br><br>";
   }
   if ($form_data['field'][475] == "Yes"){
	  $FTP2 .= "Prevailing regulations, your customers or current industry standards require temperatures of product to be taken and recorded prior to or upon loading. <br><br>";
	  if ($form_data['field'][476] == "Yes"){
		 $FTP2 .= "A procedure for when and how to measure product temperaturesprior to and/or upon loading is outlined below.  ";
		 if ($form_data['field'][477] == "Yes"){
		    $FTP2 .= "Records for temperature measurements performed are also attached to the appendix.";
		 }
		 $FTP2 .= "<br><br>";
	  } else {
		 $FTP2 .= $form_data['field'][478];
         $FTP2 .= "<br><br>";
	  }
   }
} else {
   if ($form_data['field'][469] == "No"){
	  $FTP2 .= $form_data['field'][479];
      $FTP2 .= "<br><br>";
	     if ($form_data['field'][480] == "Yes"){
	  $FTP2 .= "Vehicles are pre-cooled at for applicable commodities prior to transport.  ";
      if ($form_data['field'][481] == "Yes"){
	      $FTP2 .= "Records are attached to the appendix which document pre-cooling activities.";
      }
	   $FTP2 .= "<br><br>";
   }
   if ($form_data['field'][482] == "No"){
	  $FTP2 .= $form_data['field'][483];
      $FTP2 .= "<br><br>";
   }
   if ($form_data['field'][485] == "Yes"){
	  $FTP2 .= "Prevailing regulations, your customers or current industry standards require temperatures of product to be taken and recorded prior to or upon loading. <br><br>";
	  if ($form_data['field'][486] == "Yes"){
		 $FTP2 .= "A procedure for when and how to measure product temperaturesprior to and/or upon loading is outlined below.  ";
		 if ($form_data['field'][487] == "Yes"){
		    $FTP2 .= "Records for temperature measurements performed are also attached to the appendix.";
		 }
		 $FTP2 .= "<br><br>";
	  } else {
		 $FTP2 .= $form_data['field'][488];
         $FTP2 .= "<br><br>";
	  }
   }
   } else {
	  $TFP2 = "$organization does not utilize temperature control during transport";
   }
}

/* 11.3 */
/* 11.3.1 */
if ($form_data['field'][489] == "Yes"){
	  $FTP3 = "Please see the appendix of this section for training records for assigned employees on loading/unloading procedures used at and vehicle and refrigerated transport policies (as applicable).<br>";
}


?>