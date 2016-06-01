<?php

/**
 * Don't give direct access to the template
 */ 
if(!class_exists("RGForms")){
	return;
}

/**
 * Load the form data to pass to our PDF generating function 
 */
$form = RGFormsModel::get_form_meta($form_id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>	
    <link rel='stylesheet' href='<?php echo PDF_PLUGIN_URL .'initialisation/template.css'; ?>' type='text/css' />

	<?php 
		/* 
		 * Create your own stylesheet or use the <style></style> tags to add or modify styles  
		 * The plugin stylesheet is overridden every update		 
		 */
	?>
    <title>Family Farmed - Food Safety</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
IMG.displayed { display: block;
    margin-left: 60%;
    }
h1.ffo {color: #006600;}
h2.ffo {color: #006600;}
h3.ffo {color: #006600;}

</style>
</head>
	<body>
       
        <?php	

        foreach($lead_ids as $lead_id) {

            $lead = RGFormsModel::get_lead($lead_id);
            $form_data = GFPDFEntryDetail::lead_detail_grid_array($form, $lead);
			
	require 'foodsafety-variables.php';
				
			?>

<IMG class="displayed" src="<?php echo PDF_PLUGIN_DIR; ?>resources/images/ff_logo_top.png"  />  
<h1 class="ffo"> <?php echo $organization ?></h1>
<h1 class="ffo">Food Safety Manual</h1>
<p>Prepared by <?php echo $prepNameFirst;?> <?php echo $prepNameLast; ?> on <?php echo $creationDate; ?> </p>
<br><br>
<hr /><br><br><br><br><br><br><br><br>
<?php echo $organization ?><br>
<?php echo $form_data['field'][45][street]; ?><br>
<?php if ($form_data['field'][45][street2] != "") {
	echo $form_data['field'][45][street2];
	echo "<br>";
} ?>
<?php echo $form_data['field'][45][city];
    echo ", ";
    echo $form_data['field'][45][state];
	    echo " ";
    echo $form_data['field'][45][zip];
?> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<p style="page-break-after:always;">
<h2 class="ffo"> Section 1: General Requirments </h2>
<hr>
<h3 class="ffo"> 1.1 Food Safety Policy </h3>
<h4> 1.1.1 </h4>
<?php echo $organization; ?> has a written food safety policy as outlined below:<br>
<?php echo $fsPolicy; ?><br>
<?php echo $fsPolicyAdditional; ?><br>
Information about how <?php echo $organization; ?>'s food safety policy is implemented and communicated to employees is outlined below:<br>
<?php echo $form_data['field'][5]; ?> <br>
<?php echo $form_data['field'][4]; ?> <br>
<h3 class="ffo"> 1.2 Accountability </h3>
<h4> 1.2.1 </h4>
The following employees have accountability for food safety at <?php echo $organization; ?>:
<?php echo $form_data['field'][8]; ?>, <?php echo $form_data['field'][6]; ?> <br>
24-hour contact information in the event of a food safety emergency is as follows:
<?php echo $form_data['field'][10]; ?>
<hr>
<h5>Best Practice Information</h5>
<h6>ACCOUNTABLITY<br><ul>
<li>Accountability can be with one person or a number of individuals with designated responsibilities.</li>
<li>Personnel with food safety responsibilities should receive training sufficient to their responsibilities (e.g. completed at least one formal food safety course/workshop or by job experience) and demonstrate a knowledge of food safety principles1.
This person(s) should exhibit good food safety practices and encourage crew supervisors to set a good example.</li>
<li></ul>
</h6>
<hr>
<h3 class="ffo"> 1.3 Documentation </h3>
<h4> 1.3.1 </h4>
<?php echo $organization; ?> <?php echo $awareDocReq; ?> aware that documentation is required to demonstrate that our food safety plan is being followed.
<hr>
<h5>Best Practice Information</h5>
<h6>DOCUMENTATION<br><ul>
<li>Documents, records of procedures, (SOPs - standard operating procedures) and policies should be included your Food Safety Plan.</li>
<li>All documents need to be readily accessible for review/inspection and kept up to date. They may be maintained on-site or at an off-site location, or accessible electronically (e.g., MSDS) and must be kept for a minimum of 2 years or as required by prevailing regulation.</li>
<li>A self-audit of your food safety manual should be performed annually. The person reviewing the plan should have a knowledge of food safety requirements and should document that the review was performed and record any corrective actions required.
</li>
<li>If your food safety manual review reveals that changes need to be made, just log into the online tool and complete the relevant section to generate an updated section of your plan.<br>
</li>
</ul></h6>
<hr>
<h3 class="ffo"> 1.4 Traceback </h3>
<h4> 1.4.1 </h4>
<?php echo $organization; ?> <?php echo $traceProg; ?>  systems and records in place to enable one step forward (with the exception of direct to consumer sales) and one step back traceability of products. <?php echo $traceAppend; ?><br>
<br><?php echo $annualTracePre; ?> <?php echo $organization; ?> <?php echo $annualTracePost; ?> <br>
<h3 class="ffo"> 1.5 Recall </h3>
<h4> 1.5.1 </h4>
<?php echo $recallText; ?><br>
<h3 class="ffo"> 1.6 Corrective Action Procedure </h3>
<h4> 1.6.1 </h4>
<!---- <?php // echo $capText; ?><br> --->
<h3 class="ffo"> 1.7 Record Keeping </h3>
<h4> 1.7.1 </h4>
<?php echo $docText; ?><br>
</p>
<p style="page-break-after:always;">
<h2 class="ffo"> Section 2: Worker Health and Hygiene </h2>
<hr>
   <h3 class="ffo"> 2.1 Toilet Facilities </h3>
      <h4> 2.1.1 </h4>
<?php echo $tf1Text; ?><br>	  
<hr>	  
<h5>Best Practice Information</h5>
<h6>TOILET AND HAND WASHING FACILITIES<br><ul>
<li>Toilet facilities must be maintained in a sanitary condition and cleaned as often as necessary, preferably daily. The frequency of cleaning required will depend on the level of usage. The key point is to ensure that they are cleaned frequently enough to ensure suitable for use. Facilities should be well stocked and clean at all times.</li>
</ul>
Toilet facilities<ul>
<li>The Federal Code of Regulations19 requires that toilet facilities be adequately ventilated, appropriately screened and have self-closing doors that can be locked from inside to ensure privacy. Toilet and handwashing facilities must also be located in close proximity to each other.</li>
<li>Toilet paper must be held on a toilet paper holder or dispenser to keep it from being set on the floor or another place where it could become contaminated2.</li>
<li>Where necessary, racks and storage containers for protective clothing and tools shall be provided so these items can be removed and properly stored prior to entering toilet facilities.</li>
<li>Toilet facilities should not be located near an irrigation water source, or in a location where heavy rains could cause sewage to run into fields.</li>
<li>The doors of a toilet facility should not open into a room or area where food is exposed.</li>
</ul>
Hand washing facilities<ul>
<li>Hand washing stations can be provided inside or adjacent to portable or fixed toilet facilities.</li></ul>
All hand washing stations (portable or fixed)<ul>
<li>Must use potable water.</li>
<li>Shall provide soap and single-use hand towels. Soap should be dispensed from a
dispenser rather than a soap bar. Paper towels or a similar single-use-drying towel
should be available from a dispenser for hand-drying.</li>
<li>Shall provide signage in applicable languages and/or pictures adjacent to hand wash
basins requiring people to wash their hands after each toilet visit.</li>
</ul>
For portable handwashing facilities:<ul>
<li>Containers used to store and transport water for hand washing should be emptied, cleaned, sanitized and refilled with clean water routinely.</li>
<li>Containers should have a minimum capacity of 15 gallons of water.</li>
<li>There should be a mechanism for collecting and proper disposal of dirty water from hand washing, rather than letting it fall on the ground e.g. a tank that captures used water.</li>
</ul>
</h6>
<hr>
      <h4> 2.1.2 </h4>
<?php echo $tf2Text; ?><br>

      <h4> 2.1.3 </h4>
<?php echo $tf3Text; ?><br>

<hr>	  
<h5>Best Practice Information</h5>
<h6>CHOOSING A GOOD LOCATION FOR TOILET FACILITIES<br><br>
<ul><li>Field/portable toilets must be located away from growing fields, packing/storage house(s) and any areas where there is food or food contact surfaces.</li>
 <li>Toilet facilities and hand washing stations need to be accessible for servicing/cleaning to ensure they are appropriately maintained.</li>
</ul>
</h6>
<hr>
   <h3 class="ffo"> 2.2 Sewage and Septic Systems </h3>
      <h4> 2.2.1 </h4>
<?php echo $tf4Text; ?><br>

      <h4> 2.2.2 </h4>
<?php echo $tf5Text; ?><br>

<hr>	  
<h5>Best Practice Information</h5>
<h6>SEWAGE CONTAMINATION TREATMENT PLAN<br><br>
Any sewage spills must be dealt with immediately in a manner that minimizes the risk of contaminating the produce. In the case of a sanitation unit spilling or any other septic leakage occurring in or near field boundaries, the following cleanup steps will be performed:
<ul>
<li>Any affected produce is immediately disposed of in a covered waste bin.</li>
<li>The contaminated area will be marked off with caution tape or string.</li>
<li>Signs in appropriate languages will be posted at the perimeter prohibiting entry to the
contaminated area.</li>
<li>People and animals will be kept out until the area is sufficiently decontaminated.</li>
 Any solid waste still resting on the surface will be collected, shoveled up, and removed
to the waste bin.</li>
<li>Any affected permanent structures will be hosed off and disinfected with a dilute
bleach solution.</li>
<li>If a sanitation unit has caused the contamination, it will be cleaned up and replaced by
the company providing the units and maintenance services.</li>
</ul>
The spillage event and corrective actions should be written down on sanitation logs and kept in your records.</h6>
<hr>
   <h3 class="ffo"> 2.3 Hand Washing</h3>
 <h4> 2.3.1 </h4>
<?php echo $tf6Text; ?><br>

<hr>	  
<h5>Best Practice Information</h5>
<h6>PROPER HAND WASHING TECHNIQUE<br><br>
All employees handling produce for processing or sale must use proper hand washing techniques before beginning work and after returning to work after taking breaks, going to the restroom, eating, smoking, or otherwise potentially contaminate their hands.
Proper hand-washing technique includes the following:<ol>
<li>Wet hands with clean water (warm is preferred if available), apply soap, and work up a lather.</li>
<li>Rub hands together for at least 20 seconds.</li>
<li>Clean under the nails and between the fingers.</li>
<li>Rub fingertips of each hand in suds on palm of opposite hand.</li>
<li>Rinse under clean, running water.</li>
<li>Dry hands with a single-use towel.</li>
</ol><ul>
<li>It is important to remember to wash hands after touching any potentially unsanitary surface.</li>
<li>When possible, turn off the faucet with the single-use towel instead of directly with the hand (when using a sink and faucet).</li>
<li>Do NOT use a paper towel more than once or share towels with others.</li>
</ul>
<em>Use of Hand Sanitizers:</em> Current research indicates that proper hand washing with soap and water is the most effective method at removing potential pathogens from the hands. Soil and dirt on hands may actually decrease the effectiveness of sanitizers.
Frequent use of hand sanitizers can also strip the outer layer of oil from hands, leading to cracking and dryness, which can trap
germs and bacteria. Hand sanitizers can be used in addition to good hand washing, but not as a substitute.
</h6>
<hr>
   <h3 class="ffo"> 2.4 Proper Use of Toilet Facilities</h3>
 <h4> 2.4.1 </h4>
 <?php echo $tf7Text; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6>PROPER USE OF TOILET FACILITIES<br><ul>
<li>Used toilet tissue must be flushed down the toilet. It must not be disposed of on the floor, in trash receptacles, or in boxes.</li>
<li>Urinating and defecating in fields is absolutely prohibited.</li>
<li>Any feminine hygiene products should be disposed of in trash receptacles provided.  Feminine hygiene products should not be flushed as these products will block pipework and sewage systems.</li>
 </ul></h6>
<hr>

    <h3 class="ffo"> 2.5 Worker Health and Hygiene Policies</h3>
 <h4> 2.5.1 </h4>
 <?php echo $tf8Text; ?><br>
 <h4> 2.5.2 </h4>
 <?php echo $tf9Text; ?><br>
<h3 class="ffo"> 2.6 Designated Break Areas</h3>
 <h4> 2.6.1 </h4>
 <?php echo $tfAText; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6>BREAK AREAS AND DRINKING WATER STATIONS<br><ul>
<li>A designated area does not need to be a specifically built area. It just needs to be an area where workers can eat, drink, smoke etc. away from where produce is being handled/harvested/packed.</li>
<li>The area may also include places to store employees’ personal belongings so they are away from crops and field equipment.</li>
<li>Break areas should be near hand washing facilities so staff can easily wash hands before returning to work.</li>
<li>The break areas should be marked on your farm map.</li>
<li>These areas should be well maintained. For example, regularly cleaned so that contamination risk is minimized and rodents and other pests are not attracted to the area.</li>
<li>You may develop house rules for employees or have someone accountable for ensuring these areas are kept clean. Your policy should include cleaning activities and it is good practice to have these activities documented.</li>
</ul>
Field based drinking water station
<ul>
<li>Potable drinking water must be available (and easily accessible) to field employees.</li>
<li>Stations with single-use cups and a trash receptacle are recommended. Fountains may be used but the use of common drinking cups or dippers is prohibited.</li>
<li>Water should be suitably cool and in sufficient amounts, taking into account the air temperature, humidity and the nature of the work performed, to meet the needs of all employees.</li>
<li>Drinking water containers should be constructed of materials that maintain water quality, shall be refilled daily or more often as necessary, kept covered and be regularly cleaned.</li>
<li>Employers must notify each employee of the location of toilet, handwashing and drinking water facilities.</li>
<li>Employees must allow each employee reasonable opportunities during the workday to
use them. Each employee should also be informed of the importance of : (i) water and facilities provided for drinking, handwashing and bathroom activities; (ii) drinking water frequently and especially on hot days; (iii) urinating as frequently as necessary; (iv) washing hands both before and after using the toilet; and (v) washing hands before eating and smoking to minimize employee exposure to the hazards of heat, communicable diseases, retention of urine and agrichemical residues.</li>	
</ul>
</h6>
<hr>

 <h4> 2.6.2 </h4>
 <?php echo $tfBText; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6>EMPLOYEE BREAK AREAS<br>Eating, drinking (other than potable water for field employees), spitting, chewing gum and using tobacco are only allowed in clearly designated break areas. These areas must be located away from production fields and packing house areas.
 </h6>
<hr>
    <h3 class="ffo"> 2.7 Worker Illness and Injury</h3>
<h4> 2.7.1 </h4>
  <?php echo $tfCText; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6>WORKER ILLNESS REPORTING <br><ul>
<li>Employees must restrict their direct contact with produce or food-contact surfaces if showing signs of illness.</li>
<li>Employees must report signs of illness to the supervisor before beginning work.</li>
<li>Employees who have slight illnesses, but are healthy enough to work, shall be assigned to work in non-food areas, such as transporting closed boxes.</li>
<li>Examples of illnesses include: vomiting, jaundice, diarrhea, persistent coughs or sneezing, a runny nose, or discharge from the eyes, nose, or mouth.</li>
</ul>
</h6>
<hr>	
	
<h4> 2.7.2 </h4>
  <?php echo $tfDText; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6>OPEN CUTS AND SORES<br><ul>
<li>Methods to effectively cover an open cut or sore on the hand include using an impermeable bandage and a clean, single-use glove over the bandage.</li>
<li>Employees who have cuts which cannot be covered, but are healthy enough to work, can be assigned work in non-food areas, such as transporting closed boxes.</li>
</ul>
</h6>
<hr>
	
<h4> 2.7.3 </h4>
<?php echo $tfFText; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6>ACCIDENTS, INJURIES AND FIRST AID KITS<br><ul>
	<li>If an accident/injury has occurred, an accident/injury form should be completed.</li>
	<li>ou should also consider ways/implement corrective actions so such accidents/injuries can be avoided in the future.</li>
</ul>
First Aid Kits
<ul>
	<li>First aid kits should be present at all permanent sites and in the vicinity of field work, with the supplies checked and updated on a regular basis.</li>
	<li>Everyone should be aware of the exact location(s) of first aid kit(s) which shall also be kept in a sanitary condition.</li>
	<li>Any cut, abrasion, or other injury which occurs while working should be dealt with immediately to preserve the health and well-being of the employee and to minimize the risk of contamination to produce.</li>
</ul>
</h6>
<hr>	
<h4> 2.7.4 </h4>
<?php echo $tfGText; ?><br>
     <h3 class="ffo"> 2.8 Record Keeping</h3>
<h4> 2.8.1 </h4>
 Please see the appendix of this section for documented training records for all employees on:<ul>
 <li>Proper hand washing techniques</li>
 <li>Proper use of toilet facilities</li>
 <li>Glove use policy</li>
 <li>Protective clothing, hair coverings, artificial nails, jewelry policy, other items stored in/on clothing policies</li>
 <li>Use of designated break areas policy</li>
 <li>A written accident/injury form</li>
 </ul>
</p>

<p style="page-break-after:always;">
<h2> Section 3: Previous Land Use and Site Selection </h2>
<hr>
   <h3> 3.1  Risk Assessment </h3>
      <h4> 3.1.1 </h4>
	  
</p>

<p style="page-break-after:always;">
<h2> XXXXXXXX </h2>
<hr>
   <h3> #.1 ddddd </h3>
      <h4> #.1.1 </h4>
	  
</p>

/*         The document goes on and on....
*/


<?php
if ($form_data['field'][1] == "Yes"){
	echo "<p style='page-break-after:always;'><h1>Attach Food Safety Policy</h1></p>";
}
if ($form_data['field'][17] == "Yes"){
	echo "<p style='page-break-after:always;'><h1>Attach Recall Policy</h1></p>";
}
if ($form_data['field'][30] == "Yes"){
	echo "<p style='page-break-after:always;'><h1>Attach Corrective Action Procedure</h1></p>";
	echo "<p style='page-break-after:always;'> list designated employees on:
      <ul><li>traceback procedures</li>
      <li>recall procedures</li>
      <li>corrective action procedures</li></ul></p>";
}
if ($form_data['field'][60] == "Yes"){
		echo "<p style='page-break-after:always;'><h1>Attach plan for immediate control of spills from sewage/waste</h1></p>";
}
if ($form_data['field'][119] == "Yes"){
	echo "<p style='page-break-after:always;'><h1>Attach Training Records for Employee Hygiene</h1></p>";
}
?>
            <?php
        }

        ?>

	</body>
</html>
