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
.tab { margin-left: 40px; }
h6.bpi { margin-left: 40px; }

</style>
</head>
	<body>
       
        <?php	

        foreach($lead_ids as $lead_id) {

            $lead = RGFormsModel::get_lead($lead_id);
            $form_data = GFPDFEntryDetail::lead_detail_grid_array($form, $lead);
			
	require 'foodsafety-variables.php';
				
			?>

<IMG class="displayed" src="<?php echo WP_CONTENT_DIR; ?>/uploads/2016/03/ff_logo_top.png"  />  
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
<pagebreak />
<p>
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
<h6 class="bpi">ACCOUNTABLITY<br><ul>
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
<h6 class="bpi">DOCUMENTATION<br><ul>
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
<?php  echo $capText; ?><br>
<h3 class="ffo"> 1.7 Record Keeping </h3>
<h4> 1.7.1 </h4>
<?php echo $docText ; ?><br>
</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 2: Worker Health and Hygiene </h2>
<hr>
   <h3 class="ffo"> 2.1 Toilet Facilities </h3>
      <h4> 2.1.1 </h4>
<?php echo $tf1Text; ?><br>	  
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">TOILET AND HAND WASHING FACILITIES<br><ul>
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
<h6 class="bpi">CHOOSING A GOOD LOCATION FOR TOILET FACILITIES<br><br>
<ul><li>Field/portable toilets must be located away from growing fields, packing/storage house(s) and any areas where there is food or food contact surfaces.</li>
 <li>Toilet facilities and hand washing stations need to be accessible for servicing/cleaning to ensure they are appropriately maintained.</li>
</ul>
</h6>
<hr>
   <h3 class="ffo"> 2.2 Sewage and Septic Systems </h3>
      <h4> 2.2.1 </h4>
<?php echo $tf4Text; ?><br>

      <h4> 2.2.2 </h4>
<?php echo esc_html( $tf5Text ); ?><br>

<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">SEWAGE CONTAMINATION TREATMENT PLAN<br><br>
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
<h6 class="bpi">PROPER HAND WASHING TECHNIQUE<br><br>
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
<h6 class="bpi">PROPER USE OF TOILET FACILITIES<br><ul>
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
<h6 class="bpi">BREAK AREAS AND DRINKING WATER STATIONS<br><ul>
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
<h6 class="bpi">EMPLOYEE BREAK AREAS<br>Eating, drinking (other than potable water for field employees), spitting, chewing gum and using tobacco are only allowed in clearly designated break areas. These areas must be located away from production fields and packing house areas.
 </h6>
<hr>
    <h3 class="ffo"> 2.7 Worker Illness and Injury</h3>
<h4> 2.7.1 </h4>
  <?php echo $tfCText; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">WORKER ILLNESS REPORTING <br><ul>
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
<h6 class="bpi">OPEN CUTS AND SORES<br><ul>
<li>Methods to effectively cover an open cut or sore on the hand include using an impermeable bandage and a clean, single-use glove over the bandage.</li>
<li>Employees who have cuts which cannot be covered, but are healthy enough to work, can be assigned work in non-food areas, such as transporting closed boxes.</li>
</ul>
</h6>
<hr>
	
<h4> 2.7.3 </h4>
<?php echo $tfFText; ?><br>
 <hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">ACCIDENTS, INJURIES AND FIRST AID KITS<br><ul>
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
<pagebreak />
<p>
<h2 class="ffo"> Section 3: Previous Land Use and Site Selection </h2>
<hr>
   <h3 class="ffo">3.1  Risk Assessment </h3>
      <h4> 3.1.1 </h4>
<?php echo $PLUA; ?>
 <hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PREVIOUS LAND USE RISK ASSESSMENT<br>
Your <em>initial</em> risk assessment should consider: Record a physical description of the soil type in each field, the crop history and soil amendment history. Examples of records include: planting schedules, pesticide or fertilizer applications etc.
<br></be><em>Septic leach fields</em>: If located within 100 ft of growing fields, a risk based assessment should be performed. Consider the topography of land, ground sloped or graded away from growing field, and physical barriers as these influence the potential for contamination.
<br><em>Previous land use</em>:  Do not plant in a field that does not have a well-documented land history. Begin site assessment with land history documentation. Fields should not have been used previously as feedlots, landfills or toxic waste sites (e.g. a disposal site for chemicals). Persistent heavy metals such as mercury and lead may result from such previous land use. 
<br>Growers should make sure that their land has not been previously used for biosolid disposal or as a livestock site, or have soil tested for persistent pathogen populations. If the land has been used for animal husbandry, which is the practice of raising and breeding livestock, it is recommended that a buffer time of 3 years is allowed before using the field for edible crop cultivation, since most serious pathogenic microorganisms cannot survive in the soil for longer than this amount of time.
<br>If another person or operation previously has managed the production site, a Previous Land Use declaration or affidavit, filled out by the previous owner/manager, can be used to document land history. These declarations/affidavits are commonly used by new farm owners/managers wishing to gain USDA National Organic Program (NOP) certification.
<br>If previous land history is unknown, soil testing for pathogens can help assess food safety risks. If land history is unknown, consult your clients/food safety auditing company for their requirements.
<br><em>Adjacent Land Use</em>: Topographical features such as strong slopes can encourage contamination from adjacent fields and water sources by rain or flooding. If the ground slopes toward the crop, it may be necessary to erect physical barriers like trenches, fences, diversion berms or ditches. Also consider wind patterns and run-off seepage patterns for the possibility of movement from adjacent fields.
<br>If manure must be applied to nearby fields, it should be covered while stored, and applied on a schedule that does not interfere with the produce-growing schedule. Maintain these coverings, containers and barriers regularly.   The field should not be near animal feedlots or other points where the movement of animal waste (run-off, wind dispersal) off-site, by any means, will contaminate the field3.
<br><em>Flooding</em>: An assessment of potential contamination should be done following any significant flood event. This may include soil testing to determine if there is contamination. Fresh produce that has been in contact with flood waters must be discarded from the human food supply due to potential exposure to sewage, animal waste and pathogens.
<br><em>Organic Certification</em>: For farms wishing to be certified organic by the USDA, you will need to ensure the land to be certified also meets the requirements of the USDA National Organic Program (NOP) Standard.  For further information on these requirements for previous land use please see “NOP Regulations” on the USDA AMS National Organic Program website: www.ams.usda.gov/AMSv1.0/nop.
<br>Areas to consider during your annual land use risk assessment:
<br>Check that every production site selected has no:<ul>
<li>Unusually high levels of animal and bird activity (e.g., migratory paths, nesting or feeding areas)</li>
<li>And no adjacent areas where:<ul>
<li>livestock waste, dust, aerosols or feathers may drift or leach</li>
<li>crop production inputs may drift or leach (e.g., agricultural chemicals, soil amendments, fertilizers, pulp sludge)</li>
<li>non-agricultural activities contribute to air, water or soil pollution [e.g., industrial activities, roadside debris, foreign objects (e.g., glass bottles, etc.)]</li>
</ul></li>
</ul>
</h6>
<hr>
     <h4> 3.1.2 </h4>
<?php echo $PLUB; ?>
 <hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PREVIOUS LAND USE CORRECTIVE AND PREVENTIVE ACTIONS<br>
Example corrective/preventive actions for risks associated with site selection/previous land use:<ul>
<li>Testing soil--If land history indicates a recent possible source of contaminants (e.g., from dairy operations, feedlots, or other waste or flooding), the soil should be tested for microbial contaminants. </li>	
<li>Avoiding growing an edible crop.</li>
<li>Incorporating manure into the soil in adjacent fields.</li>
<li>Constructing and maintaining barriers (e.g., fences, ditches, storage pits, buffer zones).</li>
<li>Seeking and following expert advice.</li>
<li>Using animal/bird scaring devices (e.g., bangers, wailers).</li>
</ul>
</h6>
</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 4: Agricultural Water </h2>
<hr>
   <h3 class="ffo">4.1  Water System Description</h3>
      <h4> 4.1.1 </h4>
<?php echo $AgWA; ?>
    <h3 class="ffo"> 4.2  Water System Assessment</h3>
	  <h4> 4.2.1 </h4>
<?php echo $AgWB; ?>
 <hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">WATER DISTRIBUTION SYSTEMS AND POTENTIAL PATHOGENS<br>
Animal and human waste can carry pathogenic organisms that can readily survive in water. These organisms can pose a serious risk to food safety and human health:<ul>
<li>Bacteria (e.g., E. coli, Salmonella)</li>
<li>Parasites (e.g., Cryptosporidium spp., Giardia spp.)</li>
<li>Viruses (e.g., Hepatitis A, Norovirus) which can readily survive in water.</li>
</ul>
It is important to ensure that there are no cross-connections between agricultural water sources and contaminated sources such as water systems intended to convey untreated human or animal waste. Eliminating cross-connections will prevent back-siphonage, which can cause contamination of one water source by another.
</h6><hr>
      <h4> 4.2.2 </h4>	  
<?php echo "$AgWC <br>"; ?>
<?php echo "$AgWC3 <br>"; ?>
<br>Water sources in use are:<ul>
	<?php echo "$AgWG2 <br>"; ?>
</ul>
<?php   if ($form_data['field'][133] != "") {  
    $waterSource2 = $form_data['field'][133]; 
    foreach ($wtarerSource2 as $waterItem2) {
     if ($item2 =="Municipal/City") {
	 echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>MUNICIPAL WATER RISK ASSESSMENT<br>
Areas to consider during your risk assessment include (but are not limited to):<ul>
<li>Abnormal events may cause contamination (e.g., publicly announced breach of sewage system, chemical leakage etc).</li>
<li>Become familiar with any microbial monitoring programs followed by the municipal water supplier (e.g., local water authority). Their water testing records may be used as documentation in place of self-testing. Request a copy of results annually.</li>
<li>Store irrigation pipes so they don’t become contaminated by manure, pests or agricultural chemicals.</li>
</ul>
</h6><hr> ";
	 };
	 if ($waterItem2 =="Well") {
     echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>WELL WATER RISK ASSESSMENT<br>
Areas to consider during your risk assessment include (but are not limited to):<ul>
<li>Runoff or spills from agricultural chemicals, oil, fuel, manure, etc. Ensure that wells are designed and maintained to prevent surface run-off and soil infiltration from contaminating the water supply. Locate wells in an elevated area that is upslope of potential sources of contamination if possible.</li>
<li>Growers should consider the risks of the potential contaminants when deciding how far away a well should be situated from a potential source of contamination. Sources such as an animal feedlot or animal waste storage facility carry a very high risk, whereas the risk of a storage facility for treated compost is much lower.</li>
<li>Wells should be covered to prevent contamination with bird/animal feces.</li>
<li>Working condition of the well (e.g., seals and well casings fit tightly, pump functioning).</li>
<li>Well casings should be inspected regularly and repaired as needed.  The casing should extend to the water level in the well, and have a grout seal.</li>
<li>Unused or inadequately maintained wells can provide a direct path for contaminants to enter ground water sources. Hire a licensed, registered well driller or pump installer to retire wells that are not being used.</li>
<li>Also consider the condition of older or shallow wells – they may be more easily influenced by surface water sources (thinner or corroded casing is more likely to leak lubrication oils).</li>
<li>Leaching of sunken wells by overland flooding. A sanitary well sleeve may be installed to protect against flood contamination.</li>
<li>Preventing backflow into the well. Use antibackflow devices when filling pesticide sprayer tanks, as well as on faucets with hose connections.</li>
<li>Store irrigation pipes so they don’t become contaminated by manure, pests or agricultural chemicals.</li>
<li>Your water source should be tested prior to initial use to determine adequacy for its intended use. For water already in use, water sampling should be conducted and a testing schedule established.</li>
<li>Water testing requirements will be discussed in more detail later.</li>
</ul>	 
</h6><hr> ";
	 };
	 if ($waterItem2 =="Spring and/or Rainwater Fed Pond/Reservoir/Dugout") {
	 echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>SPRING AND/OR RAINWATER RISK ASSESSMENT<br>
Areas to consider during your risk assessment include (but are not limited to):<ul>
<li>Unusually high levels of wild animal and bird activity (e.g., migratory paths, nesting or watering areas) near surface water.</li>
<li>Access by livestock, domestic animals and birds.</li>
<li>Recreational use (e.g., swimming area).</li>
<li>Runoff or spills from agricultural chemicals, oil, fuel, manure, etc. Study water movements on land to make sure that livestock waste from nearby barnyards/fields cannot enter water sources via runoff or drift.</li>
<li>Store irrigation pipes so they do not become contaminated by manure, pests or agricultural chemicals.</li>
<li>Any historical testing results of the water source, the characteristics of the crop, the stage of the crop, and the method of irrigation.</li>
<li>Your water source should be tested prior to initial use to determine adequacy for its intended use. For water already in use, water sampling should be conducted and a testing schedule established.</li>
<li>Water testing requirements will be discussed later.</li>
</ul>
</h6><hr> ";
	 };
	 if ($waterItem2 =="Well Fed Pond/Reservoir/Dugout") {
	 echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>WELL FED POND/RESERVOIR DUGOUT WATER RISK ASSESSMENT<br>
Areas to consider during your risk assessment include (but are not limited to):<ul>
<li>Runoff or spills from agricultural chemicals, oil, fuel, manure, etc. Study water movements on land to make sure that livestock waste from nearby barnyards/fields cannot enter water sources via runoff or drift.</li>
<li>Ensure that wells are designed and maintained in a manner that prevents surface run-off and soil infiltration from contaminating the water supply. It is preferable to have them located in an elevated area that is upslope of potential sources of contamination.</li>
<li>Recommendations for the distance between potential contaminants and a water source range from 30 to 400 feet. Growers should take the risks of the potential contaminant into consideration when deciding how far away a well should be situated. For example, contamination sources such as an animal feedlot or animal waste storage facility carry a very high risk, whereas the risk of a storage facility for treated compost is much lower.</li>
<li>Wells should be covered to prevent contamination with bird/animal feces.</li>
<li>Well should be  in proper condition (e.g., seals and well casings fit tightly, pump functioning). If the well casing is secure and well-maintained, and if livestock and manure storages are excluded from the well recharge and pumping area, then the risk of contamination is greatly reduced.</li>
<li>Well casings should be inspected regularly and repaired as needed.  The casing should extend to the water level in the well, and have a grout seal.</li>
<li>Also consider the condition of older or shallow wells – they may be more easily influenced by surface water sources. They may have a thinner or corroded casing, as well as more likely to leak lubrication oils.</li>
<li>Leaching of sunken wells by overland flooding2. A sanitary well sleeve may be installed to protect against flood contamination.</li>
<li>Good well maintenance includes preventing backflow into the well. Use antibackflow devices when filling pesticide sprayer tanks, as well as on faucets with hose connections.</li>
<li>Unused or inadequately maintained wells can provide a direct path for contaminants to enter ground water sources. Hire a licensed, registered well driller or pump installer to retire wells that are not being used.</li>
<li>Unusually high levels of wild animal and bird activity (e.g., migratory paths, nesting or watering areas) near surface water</li>.
<li>Access by livestock, domestic animals and birds.</li>
<li>Recreational use (e.g., swimming area).</li>
<li>Become familiar with the routes and handling of surface water sources and seasonal influences on water quality.</li>
<li>Runoff or spills from agricultural chemicals, oil, fuel, manure, etc. Study water movements on land to make sure that livestock waste from nearby barnyards/fields cannot enter water sources via runoff or drift.</li>
<li>Store irrigation pipes so they do not become contaminated by manure, pests or agricultural chemicals.</li>
<li>Any historical testing results of the water source, the characteristics of the crop, the stage of the crop, and the method of irrigation.</li>
<li>Your water source should be tested prior to initial use to determine adequacy for its intended use. For water already in use, water sampling should be conducted and a testing schedule established.</li>
<li>Water testing requirements will be discussed in more detail later.</li>
	 </ul>
</h6><hr> ";
	 };
	 if ($waterItem2 =="Other surface water sources (lake, pond/dugout fed by stream, ditch or run-off, river, stream, creek, canals, reservoirs, cisterns, sloughs,flooding)") {
			echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>OTHER SURFACE WATER SOURCES RISK ASSESSMENT<br>
Areas to consider during your risk assessment include (but are not limited to):<ul>
<li>Unusually high levels of wild animal and bird activity (e.g., migratory paths, nesting or watering areas) near surface water.</li>
<li>Access by livestock, domestic animals and birds.</li>
<li>Recreational use (e.g., swimming area).</li>
<li>Runoff or spills from agricultural chemicals, oil, fuel, manure, etc. Study water movements on land to make sure that livestock waste from nearby barnyards/fields cannot enter water sources via runoff or drift4. Ideally, upstream neighbors keep animals out of waterways and prevent feedlot runoff from entering streams to minimize risk of microbial contamination.</li>
<li>Store irrigation pipes so they don’t become contaminated by manure, pests or agricultural chemicals.</li>
<li>Working with local watershed committees to better understand watershed areas and promoting stewardship of these waterways. This can improve irrigation water quality for all farms and further reduce microbial risks on your farm.</li>
<li>Any historical testing results of the water source, the characteristics of the crop, the stage of the crop, and the method of irrigation.</li>
<li>Your water source should be tested prior to initial use to determine adequacy for its intended use. For water already in use, water sampling should be conducted and a testing regime established.</li>
<li>Water testing requirements will be discussed in more detail in the next section.</li>
</ul>
</h6><hr> ";
	 };
	echo"<br>";
}} ?>
    <h3 class="ffo"> 4.3  Water Management Plan</h3>
      <h4> 4.3.1 </h4>
<?php echo $AgWD; ?>
      <h4> 4.3.2 </h4>
<?php echo $AgWG; ?>
<?php echo $AgWG1; ?>	
<?php
 if ($form_data['field'][133] != "") {  
   $watersource3 = $form_data['field'][133];
   foreach ($watersource3 as $wateritem3) {
     if ($wateritem3 =="Municipal/City") {
	 echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>MUNICIPAL WATER TESTING<br>
<ul>
<li>If your water comes from a public source, such as the local water authority, their testing records may be used as documentation in lieu of self-testing.</li>
<li>Test results should be obtained annually, and records kept in the appendix section of your food safety plan.</li>
</ul>
</h6><hr> ";
	 };
	 if ($wateritem3 =="Well") {
     echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>WELL WATER TESTING<br><em>Frequency and When to Test Well Water (used for irrigation purposes)</em>
<ul>
<li>The frequency of testing required and the location of water sampling needs to be determined based on the water source, its particular history and your risk assessment.  If prior test results are available, they can be used to establish the baseline.</li>
<li>It is recommended that farm well water be tested at least twice each year and treated if fecal coliform bacteria are present.The best time to sample your well water is when the probability of contamination is greatest. This is likely to be in early spring just after the thaw, after an extended dry spell, following heavy rains or after lengthy periods of non-use. In addition to regular testing, test well water after any repairs such as a pump repair or replacement and if there has been a change in water appearance, color or odor. Note: Current industry standards or prevailing regulations for specific commodities being grown may necessitate additional testing.</li>
<li>When contamination is suspected, testing frequencies and locations of testing within the water distribution system may need to increase until adequacy of water quality for intended use has been shown.</li>
</ul>
<em>Testing Requirements</em>
<ul>
<li>The laboratory chosen for water testing must have, at minimum, passed a Good Laboratory Practices (GLP) audit or participates in a Proficiency Testing program, and utilize BAM, US EPA, FDA or AOAC International testing methods for analysis of each target organism. Labs which use PCR based or immunochemistry based detection methods with a sensitivity of 1 organism per 25 gram sample, ≤ 10% false positive rate and ≤2% false negative rate are recommended.</li>
<li>The microbiological quality of your water is determined by looking for the presence of bacteria indicative of fecal (sewage) contamination – namely E. coli. E. coli are present only in the gut of humans and animals. Their presence in well water therefore indicates definite fecal (sewage) pollution possibly as a result of surface water infiltration or seepage from a septic system.</li>
<li>It is therefore recommended that your agricultural water should be tested for Generic Escherichia coli (E. coli), E. coli 0157-H7, Enterohemoragic E. coli (EHEC) and Salmonella spp (which can also exist in water sources). All tests must include a count of the number of E. coli units, and not just its presence or absence8.</li>
<li>Some localities may also require testing for fecal coliforms.</li>
</ul>
<em>Procedure for Sampling Well Water</em>
<ul>
<li>Once you have chosen a laboratory, call first to arrange shipping and analysis. They also may have a sampling procedure for you to follow. If so, please attach a copy to the appendix of your food safety plan. If not, the following procedure (reproduced from Canada GAP) provides the key points for taking a sample. </li>
<ul>
<li>Get a proper, sterile sample bottle from the accredited laboratory. Make sure you read and follow the instructions included with the bottle. Do not use any other container to collect the sample because it will not yield meaningful results and will not be accepted by the laboratory.</li>
<li>Plan to sample your well water when you’re sure you can deliver it to the designated location within 24 hours. Do not let your water sample sit for a long period of time as this can lead to inaccurate results.</li>
<li>Ideally the sample should be pulled from the well head if possible. Samples should be taken by trained sample collectors (this procedure can be used to train your employees). If this is not possible, take a sample from an inside tap with no aerator, such as the sink.  If there is an aerator, screen or other attachments, remove them from the faucet prior to sampling. Taking a sample from an outside faucet or the garden hose is not recommended.</li>
<li>Disinfect the end of the faucet spout with an alcohol swab or dilute bleach solution (1 part household bleach to 10 parts water) before running water to remove debris or bacteria. Disinfecting the tap with a flame is not recommended because this can damage the faucet.</li>
<li>Turn on cold water and let it run for three to four minutes to remove standing water from your plumbing system.</li>
<li>Remove the sample bottle lid. - DON’T TOUCH THE INSIDE OF THE LID. - DON’T PUT THE LID DOWN. - DON’T RINSE OUT THE BOTTLE.</li>
<li>Fill the bottle to the level that is marked, as described in the enclosed instructions, and close the lid firmly.</li>
<li>Make sure to fill out the enclosed paperwork completely and accurately or you may not get your results back2. The water source should be identified on sample submittal forms.</li>
<li>Keep the sample refrigerated (but not frozen) until it’s returned to the drop-off location. Again, deliver the sample within 24 hours or it may not be processed. Remember that proper handling will help to make sure that your test results are accurate! Use a cooler with ice packs to keep the sample cold until it can be refrigerated and while transporting it to the lab.</li>
</ul></ul>
<em>Interpreting the Test Results<br>
Acceptance criteria</em>
<ul>
<li>E. coli 0157-H7, Enterohemoragic E. coli (EHEC) and Salmonella spp results must be negative (0 per 100 mL of water).</li>
<li>Generic E. coli results must lie between ≤126MPN (or CFU)/100mL and ≤235MPN/100mL for any single sample where edible portions of the crop ARE contacted by water.</li>
<li>If testing has been performed for fecal coliforms then the limit is less than 2.2 fecal coliforms/100 mL of water. The Environmental Protection Agency (EPA) established this standard for reclaimed water (treated effluent) used on nonprocessed fresh produce. This 2.2 fecal coliforms/100 mL limit is considered free of pathogens for nonpotable agricultural purposes by the EPA. If higher densities of fecal coliforms are detected, it is suggested that growers do not use overhead irrigation.</li>
<li>It is recommended that you check your local/state guidelines before interpreting any results. The laboratory who undertook the test, local EPA office and your local Agricultural Extension agent may also be able to help.</li>
<li>Please note: the above limits outlined are for use for agricultural irrigation water. If you are also using your well water source for drinking then the limits should meet EPA drinking water standards. Please consult  http://water.epa.gov/drink/contaminants/index.cfm (EPA web site) for further information on the requirements for safe drinking water. <em>Note:  Water containing E. coli is not safe to drink.</em></li>
</ul>
<em>What to do when test results are out of limits – corrective action</em>
<ul>
<li>If results are found to exceed the acceptable limits, <em>corrective action should be taken immediately.</em></li>
<li>Corrective actions for adverse water tests generally include three steps:</li>
<ul>
<li>Identify and correct the source of contamination (e.g., working condition of the well; overland flooding due to improper location of well casing or land grading; drifting or leaching of manure due to improper storage; problems with septic or sewage systems).</li>
<li>If a well is contaminated, it can be chemically treated to reduce fecal coliform counts. (e.g. shock chlorination of wells; batch treatment of cisterns or tanks; installing a permanent treatment system).</li>
<li>Re-test water.</li>
<ul>
<li>Water that tests out of specified limits for microbial contamination should not be used for crop production. Mitigation measures should be taken or an alternative water source used.</li>
</ul></ul></ul>
<ul>
<li>Tests, their results and actions taken must be documented.</li>
</ul>
</h6><hr> ";
	 };
	 if ($wateritem3 =="Reclaimed Municipal/City Waste Water (Tertiary Water)") {
	 echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpi'>RECLAIMED MUNICIPAL/CITY WASTE WATER TESTING<ul>
<li>For treated municipal waste water, test results from the local water authority can be used in lieu of self-testing.</li>
<li>Test results should be obtained annually and records kept in the appendix section of your food safety plan.</li>
</ul>	 
</h6><hr> ";
	 };
	 if ($wateritem3 =="Spring and/or Rainwater Fed Pond/Reservoir/Dugout" || $wateritem3 =="Well Fed Pond/Reservoir/Dugout" || $source =="Other surface water sources (lake, pond/dugout fed by stream, ditch or run-off, river, stream, creek, canals, reservoirs, cisterns, sloughs,flooding)" ) {
	 echo " <hr>	  
<h5>Best Practice Information</h5>
<h6 class='bpiSURFACE WATER TESTING<br>
<em>Frequency and When to Test Surface Water</em>
<ul>
<li>The frequency of testing required and the location of water sampling needs to be determined based on the water source, its particular history and your risk assessment. </li>
<li>Surface water quality varies with both time and location. Sampling is only a small snapshot of the big picture; therefore, it is difficult to establish sample frequencies. However, a baseline can be established by sampling at least once a month for one season to determine what would be normal for your water source. If prior test results are available, they can be used to establish the baseline.</li>
<li>Thereafter, it is recommended that surface water be tested quarterly in warm climates such as California, Florida, Texas and other southern states. In northern climates, such as New York, Pennsylvania, and Michigan it is recommended that surface water is tested three times during the growing season – first at planting, second at peak use, third at or near harvest. Testing should be performed more often if historical data indicates a need.</li>
<li>Note: Current industry standards or prevailing regulations for specific commodities being grown may necessitate additional testing.</li>
<li>When contamination is suspected, testing frequencies and locations of testing within the water distribution system may need to increase until adequacy of water quality for intended use has been shown.</li>
</ul>
<em>Testing Requirements</em>
<ul>
<li>The laboratory chosen for water testing must have, at minimum, passed a Good Laboratory Practices (GLP) audit or participates in a Proficiency Testing program, and utilize BAM, US EPA, FDA or AOAC International testing methods for analysis of each target organism. Labs which use PCR based or immunochemistry based detection methods with a sensitivity of 1 organism per 25 gram sample, ≤ 10% false positive rate and ≤2% false negative rate are recommended.</li>
<li>The microbiological quality of your water is determined by looking for the presence of bacteria indicative of fecal (sewage) contamination – namely E. coli. E. coli are present only in the gut of humans and animals. Their presence therefore indicates definite fecal (sewage) pollution possibly as a result of surface water infiltration or seepage from a septic system.</li>
<li>It is therefore recommended that your agricultural water should therefore be tested for Generic Escherichia coli (E. coli), E. coli 0157-H7, Enterohemoragic E. coli (EHEC) and Salmonella spp (which can also exist in water sources). All tests must include a count of the number of E. coli units, and not just its presence or absence.</li>
<li>Some localities may also require testing for fecal coliforms</li>
</ul>
<em>Procedure for Sampling Surface Water</em>
<ul>
<li>Once you have chosen a laboratory, call first to arrange shipping and analysis. They also may have a sampling procedure for you to follow. If so, please attach a copy to the appendix of your food safety plan. If not, the following procedure (reproduced from Canada GAP) provides the key points for taking a sample.</li>
<ul>
<li>Water should be sampled from the source point of entry into the field for surface water, as close to the point of foliar contact for distributions systems, and at fill location for pesticide mixing, frost protection, dust control, and cleaning of equipment by trained sample collectors (this procedure can be used to train your employees). The water source should be identified on sample submittal forms.</li>
<li>Use a sterile bottle or container with a tight fitting lid. Most laboratories will be able to provide you with bottles and detailed instructions. Be sure to read and follow the instructions closely.</li>
<li>Do not touch the inside of the bottle, cup or the lid. Do not set the lid down and do not rinse out the bottle.</li>
<li>When sampling surface water, use a clean, dry weighted pail or a sampling cup mounted on a long handle. Collect the water sample from well below the surface. Alternatively, take the sample at the end of the irrigation line; from the sprinkler or open drip tape.</li>
<li>Refrigerate the sample immediately after collection and have it transported, under refrigerated conditions (e.g., in a cooler with ice packs), to a lab within 24 hours.</li>
</ul>
</ul>
<em>Interpreting the Test Results<br>Acceptance Criteria</em>
<ul>
<li>E. coli 0157-H7, Enterohemoragic E. coli (EHEC) and Salmonella spp results must be negative (0 per 100 mL of water).</li>
<li>Generic E. Coli results must lie between ≤126MPN (or CFU)/100mL and ≤235MPN/100mL for any single sample where edible portions of the crop ARE contacted by water.</li>
<li>If testing has been performed for fecal coliforms then the limit is less than 2.2 fecal coliforms/100 mL of water. The Environmental Protection Agency (EPA) established this standard for reclaimed water (treated effluent) used on nonprocessed fresh produce. This 2.2 fecal coliforms/100 mL limit is considered free of pathogens for nonpotable agricultural purposes by the EPA. If higher densities of fecal coliforms are detected, it is suggested that growers do not use overhead irrigation.</li>
<li>It is recommended that you check your local/state guidelines before interpreting any results2. The laboratory who undertook the test, local EPA office and your local Agricultural Extension agent may also be able to help.</li>
<li>Please Note: The above limits outlined are for use for agricultural irrigation water. If you are using your surface water source for drinking also then the limits should meet EPA drinking water standards. Please consult  http://water.epa.gov/drink/contaminants/index.cfm (EPA web site) for further information on the requirements for safe drinking water.</li>
<li><em>Note: Water containing E. coli is not safe to drink.</em></li>
</ul>
<em>What to do when test results are out of limits – corrective action</em>
<ul>
<li>If results are found to exceed the acceptable limits, <em>corrective action should be taken immediately.</em></li>
<li>Corrective actions for adverse water tests generally include three steps:</li>
<ul>
<li>Identify and correct the source of contamination. If you have consistent problems with agricultural water quality, the best solution is to try and identify and correct the source of the problem. Look for upstream contamination sources such as livestock operations or campsites, or on-site contamination sources such as domestic and wild animals, improper manure or chemical storage and faulty sewage or septic systems. Vegetative buffer zones around ponds and along streams can help by filtering water and slowing down run-off. Ponds can be protected from significant and persistent problems with wildlife by building fences and/or creating steep sides or rocky berms to discourage the nesting of birds. For serious and persistent water quality problems, site-specific remediation may be possible. Seek advice to avoid harming your crop, your workers or the environment.</li>
<li>If water test results indicate the presence of fecal coliforms, filtering the water or using settling ponds can reduce these counts in surface water systems.</li>
<li>Re-test water.</li>
<ul>
<li>Water that tests out of specified limits for microbial contamination should not be used for crop production. Mitigation measures should be taken or an alternative water source used.</li>
</ul>
</ul>
</ul>
<em>Documentation</em>
<ul>
<li>Tests, their results and actions taken must be documented.</li>
</ul>
</h6><hr> ";
	 };
	echo"<br>";
} } ?>
<?php echo "$AgWG3 <br>"; ?>	
   <h3 class="ffo"> 4.4  Record Keeping</h3>
      <h4> 4.4.1 </h4>
<?php echo $AgWF; ?>
</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 5: Agricultural Chemicals </h2>
<hr>
   <h3 class="ffo">5.1  Usage </h3>
      <h4> 5.1.1 </h4>
<?php echo $Chem1; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PROPER CHEMICAL USAGE AND STORAGE<br>
<ul>
<li>If product is intended for export, you will need to consider the agricultural chemical requirements of the destination country1. You will also need procedures, such as pre-harvest interval and application rates, which meet the entry requirements of the country(ies) where your product will be traded, if known during production.</li>
<li>Cleaning chemicals should be stored away from a high traffic area and at moderate temperatures and humidity. The area should be kept locked, if possible.</li>
<li>Chemicals should be stored on pallets or racks, not on the bare floor or shelf. </li>
<li>Chemical hazards should be indicated to employees by signs, pictures and/or labels in the chemical storage area, cabinet or other place that is effectiv.</li>
<li>Information on what to do in the case of a chemical spill (including gas and petroleum spills or leaks) can be found by contacting the “Pollution Control Agency” in your state.</li>
</ul>
</h6><hr>
   <h3 class="ffo">5.2 Agricultural Chemical Policy</h3>
      <h4> 5.2.1 </h4>
<?php echo $Chem2; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">CHEMICAL APPLICATION EQUIPMENT<br>
Agricultural chemical application equipment must NOT be cleaned, used for mixing, maintained, rinsed or flushed where water source(s) or the production site may become contaminated.
</h6>
<hr>
   <h3 class="ffo">5.3 Record Keeping</h3>
      <h4> 5.3.1 </h4>
<?php echo $Chem3; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">CHEMICAL APPLICATION TRAINING<br><ul>
<li>Personnel responsible for chemical applications must be trained and/or licensed, or supervised by licensed personnel, in compliance with current regulations.</li>
<li>Records demonstrating training or licenses should be kept.</li>
<li>Training should include procedures for disposal of waste agricultural chemicals and for cleaning of application equipment that protects against contamination of product and growing areas.</li>
</ul></h6><hr>

      <h4> 5.3.2 </h4>
<?php echo $Chem4; ?><br> 
</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 6: Animals and Pest Control </h2>
<hr>
   <h3 class="ffo">6.1 Animal Control - Fields</h3>
      <h4> 6.1.1 </h4>
<?php echo $ApcA; ?><br>
Preventive or corrective measures for animal activity in productions fields at are attached to the appendix of this section.<br>
Records are attached to the appendix documenting preventive and/or corrective measures taken as a result of animal activity risk assessment(s) in production fields.<br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">ANIMAL AND PEST CONTROL RISK ASSESSMENT<br>
It is not possible, or may not be allowable, to eliminate all animal influences from production fields. All the same, you need to determine what steps you can take to minimize their presence or activities.
Any corrective actions taken for animal control must follow all applicable local, state and federal regulations.To learn more about animal control and any necessary permits or licenses, it is recommended that you contact your state’s Department of Natural Resources or the US Fish and Wildlife permits, www.fws.gov/permits.
<ul>
<li>A written assessment of potential contamination risks from animals needs to be done for all your production areas.</li>
<li>The assessment of risk from animals needs to take into considerationthe crop characteristics, type and number of animals, pathogens of concern, nearness to the growing field, conservation practices used to reduce indirect spread of pathogens, deterrents and proximity to harvest.</li>
</ul>
<em>Pathogens of Concern</em>
<ul>
<li>E. coli O157H:7 and Salmonella.</li>
</ul>
<em>Crop Characteristics</em>
<ul>
<li>If a crop is destined to be cooked, such as bunched kale or artichokes, then that process kills bacteria, and a less stringent set of food safety practices may apply.</li>
<li>If water is used to rinse or wash a harvested freshly eaten crop, it has the potential to spread pathogens, so animal presence should be assessed more closely.</li>
<li>If a crop has a thin protective skin or will most likely be eaten raw, such as carrots or lettuce, it has the potential to spread pathogens if not thoroughly washed; therefore, animal presence and the link to contaminated water should be carefully assessed.
</li>
</ul>
<em>Type and Number of Animals</em>
<ul>
<li>Domestic animals (including pets and poultry) should be excluded from fields during the growing season especially close to harvest time4,6.Your operation should have risk-appropriate actions to prevent or minimize the potential for contamination of produce with pathogens from animal feces, including from domestic animals used in farming operations. Keep a written record of any preventative or corrective actions used.</li>
<li>If you use domestic animals as part of your farming operation, have measures in place to prevent or minimize the potential for contamination of produce with pathogens from animal urine and feces especially when produce is close to harvest.</li>
<li>In general, some types of wildlife are known to carry low levels of E. coli O157:H7 and Salmonella. Research studies that document the risk from wildlife are scarce and incomplete.</li>
<li>High concentrations of wildlife in the growing and harvesting environment increase risk. When there is a large number of anything with a small risk, the risk increases.</li>
<li>Cattle are a main carrier of E. coli O157:H7 and therefore pose an increased food safety risk. Herds in feedlots and large confined dairy operations have higher percentages of this pathogen than those out on pasture, although pastured cattle mayalso be infected with this deadly bacteria.</li>
<li>Animals associated with human activities and contaminated areas (including but not limited to non-field rodentsand some birds), can be sources of pathogens. Potential sources of contamination include use of untreated or improperly treated manure; nearby composting or manure storage areas, livestock, or poultry operations; nearby municipal wastewater or biosolids storage, treatment, or disposal areas, urban areas, and garbage dumps.</li>
</ul>
<em>Nearness to the Growing Field</em>
<ul>
<li>If animals that pose an increased risk are near or in the field, the risk of crop contamination increases.</li>
<li>Livestock should not have access to fields until the crop has been harvested, and depending on the lay of the land, physical barriers may be required to prevent run off from grazing areas.</li>
</ul>
<em>Conservation Practices Used to Reduce Indirect Spread of Pathogens</em>
Indirect spread of pathogens through water, soil, air and dust can be lessened by conservation practices:
<ul>
<li>Hedgerows and windbreaks reduce the occurrence of airborne pathogens contaminating the crop.</li>
<li>Grasses and wetlands filter pathogens in water.</li>
</ul>
<em>Deterrent examples</em>
<ul>
<li>Minimize the presence of animal attractants (such as cull piles) within a production field.</li>
<li>Maintain structures and equipment within or adjacent to fields to minimize harborage of pests and wildlife.</li>
<li>Fencing</li>
</ul>
<em>Proximity to Harvest</em>
<ul>
<li>Any part of the crop contaminated with excrement should not be harvested.</li>
<li>In addition to not harvesting the contaminated crop(s), a radius of 5’ around the specified crop(s) should not be harvested.</li>
<li>The crop should be further surveyed to determine if other contamination is present.</li>
</ul>
</h6><hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">CORRECTIVE ACTIONS<br>Corrective actions for animal intrusions should be developed and implemented if these intrusions are likely to contaminate produce in the field.
Some examples of corrective/protective actions include:
<ul>
<li>Your waste management practices should include minimizing weeds and other potential pest harborage areas (e.g., outside garbage receptacles/dumpsters are closed, and the area around such sites is reasonably clean)</li>
<li>Non-crop areas next to growing fields are reasonably free of litter (such as cull piles), debris and standing water that may attract or harbor pests.</li>
<li>Where present, removes all feces, wash contaminated equipment as necessary and dispose of any product or packaging materials that may be contaminated.</li>
<li>Develop and implement a pest control program and/or hire a third party pest control company.</li>
<li>Re-evaluate and revise your existing pest control program to better meet your needs. If necessary seek expert advice.</li>
<li>Maintain structures and equipment within or adjacent to fields to minimize harborage of pests and wildlife.</li>
<li>If large numbers of wildife are seen in the growing area, install or fix fencing.</li>
</ul>
</h6><hr>
<h4> 6.1.2 </h4>
<?php echo $ApcB; ?><br>
</h6><hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">ANIMAL AND PEST CONTROL MONITORING<br>Farm operations are inevitably subject to animal and pest infiltration. You must do your best to keep problems under control:
<ul>
<li>Scheduled monitoring of growing fields and adjacent land for evidence of animal activity (such as field, fence inspections, etc.) is required on an ongoing basis.</li>
<li>It is recommended that in addition to noting any signs of animal activity while carrying out everyday farming activities, that a walk through or around the fields be performed daily.</li>
<li>Fencing is not required, but if fencing is used, it is recommended that fence lines be inspected at least every two weeks.</li>
<li>Inspection of fences and fields should include the following:</li>
<ul>
	<li>walk the fence line and observe any places where the fence may be compromised or in need of repair.</li>
	<li>make sure there are no weaknesses or places where animals are clearly entering and exiting the fields.</li>
	<li>check to see if any part of the fence needs to be re-baited for deer (if applicable and allowable in your state).</li>
	<li>visually inspect the fields from the outside to see if there are any noticeable signs of animal presence.Look out for signs of animals passing through or feeding in the fields and evidence of pest infestation such as presence of rodents, animal feces,nests or nesting material.</li>
	<li>make notes and take action on these and any other needs that arise in keeping wild or domesticated animals out of the fields.</li>
</ul>
<li>Traps and other methods of control must be inspected on a regular basis, preferably daily.</li>
<li>Shot is allowed in the field only if there is no risk that it will contaminate produce (e.g., should only be used prior to cupping in lettuce/cabbages etc to avoid trapping shot in the finished head.</li>
<li>If you need to hire an exterminator"</li>
<ul>
	<li>they should monitor your operation on a monthly basis.</li>
	<li>all traps must be checked and documented daily by the farm manager/person responsible.</li>
	<li>a service report from the exterminating company should be provided or updated monthly.</li>
	<li>if a change in conditions develops, the monitoring company should be contacted immediately.</li>
	<li>depending on regulations in your area, the exterminator may require a license.</li>
</ul>
<li>If pesticides are used it is recommended that:</li>
<ul>
	<li>a licensed pest control advisor be used to provide advice on pesticide recommendations.</li>
	<li>a licensed pest control advisor be used to provide advice on pesticide recommendations.</li>
	<li>pesticide applications be made by certified/fully trained applicators.</li>
	<li>only approved pesticides are used according to the label and in compliance with US federal, state and local regulations.</li>
	<li>applicators be in compliance with application restrictions and worker safety guidelines.</li>
	<li>application services are subject to state, county and private audits.</li>
	<li>measures be taken to avoid pesticide application drift from adjacent fields.</li>
	<li>pesticide application records be kept on file for two years.</li>
	<li>water used for pesticide applications be from a known/identified source and tested where necessary to ensure fields are not contaminated with pathogens of concern. Please consult section 4 of this tool (Agricultural Water) for additional information on testing requirements.</li>
</ul>
</ul>
</h6><hr>	  
   <h3 class="ffo">6.2 </h3>
      <h4> 6.2.1 </h4>
<?php echo $ApcC; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PEST CONTROL MANAGEMENT<br>Employees must be diligent in reporting any signs of pest infestation in processing, packaging, cooling and storage areas.<br>
<em>Things to consider:</em><ul>
<li>For buildings where food is handled, equipment structures and equipment/building surfaces (floors, walls, ceilings, doors, frames, hatches, etc.) should be constructed to allow easy cleaning and sanitation.</li>
<li>If cracks and holes in buildings become a route for pests, they will need to be fixed.</li>
<li>Adequate space shall be maintained between rows of stored materials to allow cleaning and inspection. Materials should be stored away from walls and ceiling.</li>
<li>Chill and cold storage loading dock areas need to be appropriately sealed, drained and graded to prevent pest intrusion.</li>
<li>Nesting of birds on the interior and exterior of buildings should be prevented (e.g., netting overopenings to prevent entry). It is illegal to remove nests once eggs have been laid.</li>
<li>Domestic animals shall be prohibited from packing house, cooling and storage facilities unless procedures are in place for their safe presence.</li>
<li>Procedures are in place to exclude wild and feral animals to the extent practical.</li>
<li>Where present, remove all feces, nesting materials rodents or animals,chewed boxes or packaging. Wash contaminated equipment and building areas as necessary and dispose of any product or packaging materials that may be contaminated.</li>
<li>Maintain structures and equipment (both within buildings and equipment stored outside) to minimize harborage of pests and wildlife.</li>
<li>Dispose of any product that has come in to contact with bait or other pest control products.</li>
<li>Washing any equipment that has come into contact with pest control products or pests.</li>
<li>Re-evaluate and revise your existing pest control program to better meet your needs.  Seek expert advice if necessary.</li>
<li>Equipment stored outside is stored away from the building perimeter. Equipment is not to accumulate near the building.</li>
<li>Boneyards, which are places where unused machinery is stored, should be located away from the building.</li>
<</ul>
<em>If traps are used, ensure that:</em>
<ul>
<li>only non-toxic traps and pest control devices should be used inside the packing house, chilling or storage areas.</li>
<li>traps and other methods of control must be inspected on a regular basis, preferably daily with inspection activities documented.</li>
<li>they are flush against the wall.</li>
<li>bait used inside buildings is in a trap from which rodents cannot escape (e.g., tin cat, iron cat, ketch-all).</li>
<li>they are set, at a minimum, on the inside of each entrance (doorways) on both sides (i.e., two traps per door).</li>
<li>each trap and area controlled is identified and actions taken (if applicable) recorded.</li>
<li>all baits are secure within traps. Remove all bait that is not secured in a trap.</li>
<li>devices (including rodent traps and electrical flying insect devices) should be located so they do not contaminate produce or food handling surfaces.</li>
</ul>
<em>If you need to hire an exterminator:</em>
<ul>
<li>they should monitor your operation on a monthly basis.</li>
<li>all traps must be checked and documented daily by the farm manager/ person responsible.</li>
<li>a service report from the exterminating company should be provided or updated monthly.</li>
<li>the monitoring company should be contacted immediately if a change in conditions develops.</li>
<li>depending on regulations in your area, the exterminator may require a license.</li>
</ul>
<em>Pesticide Use (e.g., insecticides, rodenticides, baited traps)</em>
<ul>
<li>Applications of pesticides must be performed in compliance with local, state, and federal regulations</li>
<li>Only pesticides approved for use in the US should be  used.</li>
<li>Persons applying pesticides should be certified/trained and comply  with application restrictions and worker safety guidelines.</li>
<li>All pesticides should be securely stored and labeled according to all federal, state and local regulations.</li>
<li>Consider that application services are subject to state, county and private audits.</li>
<li>Pesticide application records should be on file for two years.</li>
</ul>
<em>Waste Management</em>
<ul>
<li>Waste containers and compactors should be located away from produce handling areas, remain closed or have lids (except for waste collection/cull trailers in active use and emptied on a scheduled  or as needed basis.</li>
<li>Outside garbage receptacles/dumpsters should also be closed and be located away from entrances of buildings used for food packaging, storage, cooling etc. </li>
<li>our operation should have procedures to maintain the grounds surrounding the building as well as all waste containers to minimize sources of contamination, such as litter, vegetation, debris and standing water that may be pest attractants or harborages. Note: Vegetation that does not serve as an attractant or harborage is permitted.</li>
</ul>
</h6><hr>


</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 7: Soil Amendments and Manure</h2>
<hr>
<h3 class="ffo"> 7.1 Soil Amendments </h3>
<h4> 7.1.1 </h4>
<?php echo $Sam0; ?><br>

<?php if ($SkipSam =="No") { ?>

<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">SOIL AMENDMENT MANAGEMENT<br><ul>
<li>All soil amendments must be produced and applied in accordance with applicable federal, state, and/or local regulations.</li>
<li>It is important for you to assess the risk of soil amendments to your fields and have documentation verifying that material treatments or process have minimized pathogen risk. </li>
<li>When water is used for distributing soil amendments to the field, it is important that the water be free of pathogens. If you are using potentially contaminated water for this purpose, contact with the edible portion of the crop must be avoided3. Please consult section 4 of this tool (Agricultural Water) for additional information.</li>	
</ul></h6><hr>
<h3 class="ffo"> 7.2 Soil Amendments That Do NOT Contain Raw or Partially Treated Manure </h3>
<h4> 7.2.1 </h4>
<?php echo $Sam1; ?><br>
<h4> 7.2.2 </h4>
<?php echo $Sam2; ?><br><br>
Supplier records are attached to the appendix and show that finished compost product supplied to is free of pathogens of concern.<br>
<h4> 7.2.3 </h4>
<?php echo $Sam3; ?><br>
<h4> 7.2.4 </h4>
<?php echo $Sam4; ?><br>
<h3> 7.3 Soil Amendments That Contain Raw or Partially Treated Manure </h3>
<h4> 7.3.1 </h4>
<?php echo $Sam5; ?><br>

<?php } ?>
	  
</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 8: Field Harvesting</h2>
<hr>
<h3 class="ffo"> 8.1 Risk Assessment-Pre-harvest</h3>
<h4> 8.1.1 </h4>
<?php echo $FH0; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">FIELD RISK ASSESSMENT<br><ul>
<li>The scope and nature of your evaluation will vary depending on what is being harvested and how complex your operation is.</li>
<li>Your risk assessment process could be as simple as an entry into your daily harvest activity notebook or a formal inspection log.  However, you should include the following general information in your evaluation:</li>
<ul><li>Field Location</li>
<li>Risks whether they be biological (e.g., pathogens), chemical or physical (e.g., broken glass).</li>
<li>Corrective and/or Preventive Actions</li>	</ul>
</ul></h6><hr>
<hr>
<h3 class="ffo"> 8.2 Vehicles, Equipment, Tools and Utensils</h3>
<h4> 8.2.1 </h4>
<?php echo $FH1; ?><br>
<h4> 8.2.2 </h4>
<?php echo $FH2; ?><br>
<h4> 8.2.3 </h4>
<?php echo $FH3; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">DEBRIS AND OTHER FIELD CONTAMINATION MANAGEMENT<br><ul>
<li>Take measures to inspect for and remove foreign objects such as glass, metal, rocks, or other dangerous/toxic items during harvest activities.</li>
<li>All vehicles/equipment should be inspected prior to entering fields to ensure there are no broken or cracked plastic or glass windows, fixtures, covers, or other parts that may contaminate produce.</li>
<li>Foreign objects such as glass, plastic, metal or other debris should be excluded from production equipment wherever possible. If not possible to exclude, light bulbs and glass on production equipment and in the growing area should be protected so they do not to contaminate produce or fields in case of breakage1 and/or be made of shatterproof material.</li>
<li>f  foreign objects (glass, plastic, metal or other debris) come in contact with the field or produce:</li>
<ul>
<li>It should be immediately dealt with by whoever finds the contamination. If that person is not able to immediately deal with the contamination, that person must mark the area and immediately notify a supervisor who will take appropriate action.</li>
<li>The debris should be removed with a shovel or gloved hands (which protect them from injuries such as cuts if debris is sharp) and  placed in a secure trash can.</li>
<li>Affected product should be evaluated for potential contamination and disposal if necessary (due to food safety risk).</li>
<li>Broken glass and sharp objects should be placed in a cardboard box that is then sealed, and placed in a secure trash can.</li>	</ul>
</ul></h6><hr>
<hr>
<h4> 8.2.4 </h4>
<?php echo $FH4; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">FIELD EQUIPMENT INSPECTION PROCEDURES<br><ul>
<li>Your operation should develop, implement, and schedule repair, cleaning, sanitizing, storage and handling procedures of all food contact surfaces to reduce and control the potential for contamination.</li>
<li>Vehicles and equipment shall be properly calibrated, operated, maintained, and used as intended as necessary for food safety.</li>
<li>Your procedures should also cover equipment and vehicles that are in the field infrequently.</li>
<li>Product contact tools, utensils and equipment should be made of materials that can be cleaned and sanitized1e.g. are made of non-porous surfaces (e.g., metal, stainless steel, puckboard, rubber).</li>
<li>It is recommended that hand-held cutting and trimming tools be inspected and cleaned daily and this activity recorded weekly.</li>
<li>It is recommended that an inspection be conducted at least weekly for other equipment in direct contact with product (e.g., cutting blades, brushes,  packing lines, conveyors, belts) or that may have an impact on food safety (e.g., chlorinator, sprayer) (when in use).</li>
<li>Check for leaks, broken, loose, corroded or damaged parts, soil, mud, build-up, etc. and perform any cleaning, maintenance and calibration needed. Washing, grading, sorting, and packing lines used in the field (if applicable) should be cleaned and sanitized, at least daily when in use.  </li>
<li>Tools and equipment should be easily accessible for cleaning and maintenance.</li>
<li>Harvest tools, utensils and knives should be stored in a way that minimizes contamination.</li>
<li>Equipment traffic flow should be prevented from traveling through untreated manure area(s) into the harvesting field(s).</li>
</ul></h6><hr>
<hr>
<h4> 8.2.5 </h4>
<?php echo $FH5; ?><br>
<h3 class="ffo"> 8.3 Containers, Bins and Packaging Materials</h3>
<h4> 8.3.1 </h4>
<?php echo $FH6; ?><br>
<h3 class="ffo"> 8.4 Water and Ice (which contacts food contact surfaces during harvesting)</h3>
<h4> 8.4.1 </h4>
<?php echo $FH7; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">WATER AND ICE QUALITY<br><ul>
<li>If water or ice directly contacts the harvested crop or is used on food-contact surfaces, such as in the field, as the final wash step prior to consumer packaging, or as a cooling aid in a consumer package, then you should have a procedure that requires that this water or ice meets the microbial standards for drinking water.</li> 
<li>Any sanitizing chemicals used to ensure water meets drinking water standards must comply with all requirements of EPA registration and federal, state, and local regulations.</li>
<li>Protective measures should be in place in areas where iced down product is stored over like or dissimilar items in order to prevent melting ice from contaminating product below.</li>
<li>Ice and water used at your operation must be sourced/manufactured, transported, and stored (as applicable) under sanitary conditions1.  This needs to be considered for ice produced on-site or if it is purchased in from an external source.</li>
<li>If you use re-circulated water, then your procedures should outline the use of an approved antimicrobial to treat re-circulated water to prevent it from becoming a source of contamination, according to prevailing regulation or industry specific standards for your commodity(ies).</li>    
<li>Your water-delivery system should be maintained so it does not become a source of contamination of produce, water supplies or equipment with pathogens, or to create an unsanitary condition. There should be procedures  place to address condition and maintenance of the water-delivery system, with records of maintenance kept.</li> 
<li>It has been shown that pathogens can become internalized into produce tissue for some commodities when wash water is more than 10 degrees lower than produce temperature7. For produce demonstrated as being susceptible to microbial infiltration from wash water, wash water temperature differences during immersion should be considered. If applicable to your specific commodity, your water use procedures should address control of wash water temperature, with monitoring records documented.</li>   
</ul></h6><hr>
<hr>
<h3 class="ffo"> 8.5 Field Handling</h3>
<h4> 8.5.1 </h4>
<?php echo $FH8; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PRODUCE HARVESTING PROCEDURES<br><ul>
<li>Your operation should have a policy that only sound produce appropriate for its intended use is harvested, and that produce that has been damaged to an extent that it may be a microbial food safety hazard is not harvested or is culled1. All relevant employees should be trained in your procedures.</li> 
<li>Produce which shows significant decay, is damaged, has fallen to the ground (unless the product normally grows in contact with the ground) or where there is evidence of contact with animal feces may be contaminated7. It is recommended that this produce not be harvested.</li> 
<li>You should have written policies developed regarding produce that comes in contact with the soil (e.g., drops) and your policy should be consistent with industry standards or prevailing regulations for the commodities harvested.</li> 
<li>Any part of the crop contaminated with excrement should not be harvested. Besides not harvesting the specific crop plants found with feces, a radius of 5’ around the contamination should not be harvested12. The crop should be further surveyed to determine if other contamination is present is present.</li> 
<li>As much dirt, mud and debris as practicable should be removed from the produce before it leaves the field.</li> 
<li>If you wipe produce with cloths, towels, or other cleaning materials during harvesting you need to have a written procedure on how you prevent cross-contamination.</li>   
</ul></h6><hr>
<hr>
<h3 class="ffo"> 8.6 Field Packaging</h3>
<h4> 8.6.1 </h4>
<?php echo $FH9; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PROPER PRODUCE PACKAGING USAGE AND STORAGE<br><ul>
<li>Product contact packaging must be appropriate to the commodity being harvested and suited for its intended purpose. Information from supplier, customer specification, industry standards and/or prevailing regulation can be used to determine if packaging creates an unsafe condition.</li>  
<li>Packaging storage should be designed so packaging is maintained in a dry, clean state and is free from dirt or residues so it remains fit for the purpose. Particular care should be taken to prevent packaging from becoming a harborage for rodents and other pests.</li>  
<li>Packaging should be stored away from areas where rodent/bird droppings might contaminate their surfaces and/or covered to prevent this occurring.</li>  
<li>Packaging should also be stored separately from hazardous chemicals, toxic substances and other sources of contamination.</li>  
<li>You should have a written policy regarding placement of packing materials directly on the soil, or whether a physical buffer (e.g., buffer bin, slip sheet, placed on pallet of clean cardboard) is required. Your policy should be consistent with industry standards.</li>   
</ul></h6><hr>
<hr>
<h3 class="ffo"> 8.7 Post-Harvest Handling</h3>
<h4> 8.7.1 </h4>
<?php echo $FH10; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PRODUCE HANDLING AND POSTHARVEST STORAGE<br><ul>
<li>Your handling practices should comply with current industry practices or regulatory requirements for the commodities you grow.</li>
<li>Your postharvest policies should consider the potential contamination risks of handling, walking, stepping, or lying on harvested produce, food contact surfaces or packaging materials.</li>
<li>Harvested produce should be stored separately from chemicals which may pose a food safety hazard. Chemicals, including cleaning and maintenance compounds, should be stored in a separate area.</li>
<li>Materials (pallets, produce bins, totes, etc.) that come in contact with produce during postharvest and subsequent transport activities (if applicable) should be clean and in good repair to ensure that contamination risks are minimized.</li>  
<li>Where temperature control is important for food safety, steps should be taken to minimize temperature increases and the time between harvest and destination.</li>   
</ul></h6><hr>
<hr>
<h3 class="ffo"> 8.8 Record Keeping</h3>
<h4> 8.8.1 </h4>
<?php echo $FH11; ?><br>
</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 9: Transportation (field to packinghouse)</h2>
<hr>
<h3 class="ffo"> 9.1 Produce Transportation from Field to Packinghouse</h3>
<h4> 9.1.1 </h4>
<?php echo $TFP1; ?><br>
<h4> 9.1.2 </h4>
<?php echo $TFP2; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PROPER PRODUCE LOADING AND UNLOADING PROCEDURES<ul>
<li>Personnel responsible for the loading and unloading of produce should take steps to minimize the potential of physical damage to produce, which can introduce and/or promote the growth of pathogens.</li>
<li>Loading/unloading equipment should be clean and well maintained and of suitable type to avoid contamination of produce1. You should consider all vehicle types that come into contact with produce (cars, trucks, pallet jacks, carts, trolleys and forklifts).</li>
<li>Potential sources of contamination include soil, dirt, organic fertilizer, spills, trash, animals, raw animal products, pallet covers and other materials that come in contact with produce.</li>
</ul></h6><hr>
<hr>
<h4> 9.1.3 </h4>
<?php echo $TFP3; ?><br>
<h3> 9.2 Record Keeping</h3>
<h4> 9.2.1 </h4>
<p>Please see the appendix of this section for training records for relevant employees on loading/unloading procedures used at <?php echo $organization; ?> and the vehicle policy (if applicable).</p>
<pagebreak />
<p>
<h2 class="ffo"> Section 10: Packinghouse Activities</h2>
<hr>
<h3 class="ffo"> 10.1 Material Sourcing (Raw Materials)</h3>
<h4> 10.1.1 </h4>
<?php echo $PHA0; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PURCHASING AND RECEIVING RAW MATERIALS<ul>
<li>When purchasing raw materials, they must be appropriately manufactured for their intended use.</li>
<li>When receiving chemicals, the receiver should verify that label contains the name of the product, active ingredients, concentration and the name of the manufacturer.</li>
<li>The receiver only receives materials that were purchased or selected.</li>
<li>Raw materials suppliers must provide evidence of food safety programs and compliances which includes sufficient documentation.</li>
</ul></h6><hr>
<hr>
<h4> 10.1.2 </h4>
<?php echo $PHA1; ?><br>
<h3 class="ffo"> 10.2 Non-Product Material Storage </h3>
<h4> 10.2.1 </h4>
<?php echo $PHA2; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PROPER STORAGE OF PACKAGING MATERIALS<ul>
<li>Materials and packaging materials must be protected from contaminants.</li>
<li>Materials stored in uncovered areas shall be protected from condensation, sewage, dust, dirt, chemicals, allergens or other contamination.</li>
<li>Materials should be stored off the floor/ground on pallets, slip-sheets or stands and covered where applicable.</li>
<li>Storage areas must be maintained so as not to be a source of product contamination. Areas designated to store materials, whether indoors or out, shall be clean, well ventilated, and designed to protect materials and produce from contaminants.</li>
<li>All chemicals should be properly labeled and stored in a secure separate area.</li>
<li>Chemicals, including cleaning and maintenance compounds and lubricants, when not being used, are stored away from product handling areas and in a manner that inhibits unauthorized access.</li>
<li>Food-grade and non food-grade lubricants are kept separate from each other.</li>
</ul></h6><hr>
<h3 class="ffo"> 10.3 Containers and Bins</h3>
<h4> 10.3.1 </h4>
<?php echo $PHA3; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PROPER PRODUCT CONTAINER MAINTENANCE<br>
Containers should be sufficiently maintained so as not to become a source of contamination.<ul>
<li>Product-contact containers (e.g., harvest bins, totes, crates, sacks, buckets, finished product clam shells, bags or packaging films), should be stored, or handled (e.g., cleaned prior to post-storage use), so they do not become a source of contamination.</li>
<li>Food-contact totes, bins, packing materials, other harvest containers, and pallets should be visually inspected, clean, intact and free of any foreign materials prior to use.</li>
<li>The types and construction of product-contact containers and packing materials should be appropriate to the commodity being handled and suited to their intended purpose.</li>
<li>Produce should only be stored in clean and sanitary containers.</li>
<li>Food-contact totes, bins and other packing containers and equipment designated for packing activities shall only be used for packing activities unless you have a policy or procedure that clearly outlines approved non-product contact uses and how the containers are to be marked or labeled for that purpose.</li>
<li>Food-contact totes, bins and other packing containers and equipment that are no longer cleanable should be retired or disposed of. Note: Those which are not disposed of need to be clearly marked or labeled for non-food use only to prevent accidental use in food contact activitiesµ.</li>
<li>If pallets are used, you should inspect them prior to use for conditions that may be a source of produce contamination. Pallets that can no longer be cleaned should be removed from use.</li>
<li>Pallets and other wooden surfaces should be properly dried after being washed.</li>
<li>If produce does not normally contact the ground during production, you should have a policy regarding whether product-contact containers are allowed to directly contact the ground, or whether a physical buffer is required (e.g., buffer bin or slip sheet or use of containers constructed to prevent contact of the produce with the ground). Your policy should be consistent with industry standards. </li>
</ul></h6><hr>
<h3 class="ffo"> 10.4 Packinghouse Design</h3>
<h4> 10.4.1 </h4>
<?php echo $PHA4; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">HOW TO MINIMIZE PACKINGHOUSE CONTAMINATION RISKS<br>
<u>Packinghouse Design</u><ul>
<li>Your packinghouse should be designed, constructed and maintained in a manner that prevents contamination of produce during staging and cooling.</li>
<li>Facility and equipment structures and surfaces (floors, walls, ceilings, doors, frames, hatches, etc.) should be constructed in a manner that allows easy cleaning and sanitation and which does not serve as harborage for contaminants or pests.</li>
<li>Adequate lighting must be provided in all areas and shouldbe sufficient to enable cleaning, sanitation, repairs, etc..</li>
<li>Cooling, packing and other food contact equipment should be installed away from walls and also positioned so as not to inhibit access for proper cleaning.</li>
<li>Chill and cold storage loading dock areas should be appropriately sealed, drained and graded.</li>
<li>Fixtures, ducts, pipes and overhead structures should be installed and maintained so that drips and condensation do not contaminate produce, raw materials or food contact surfaces.</li>
<li>Water from refrigeration drip pans should be drained and disposed of away from product and product contact surfaces. Drip pans and drains should be designed to assure condensate does not become a source of contamination.</li>
<li>Air intakes should not be located near potential sources of contamination.</li>
<li>Catwalks above product zones should be protected to prevent produce or packaging contamination. Where workers walk over product contact surfaces, those walkways should be solid surface or have catch trays installed, are protected by kick plates, product covers or other barriers. </li>
</ul>
<u>Use of glass and brittle plastic</u><ul>
<li>Only essential glass and brittle plastic should be present in the packinghouse.</li>
<li>Light bulbs, fixtures, windows, mirrors, skylights and other glass and brittle plastic in the packinghouse or in the product path entering or exiting the facility should be of the safety type, or be otherwise protected (e.g. covers) to prevent breakage.</li>
<li>If glass or brittle plastic must be used, there should be a written glass and brittle plastic control policy, including a glass and brittle plastic register.</li>
</ul></h6><hr>
<h4> 10.4.2 </h4>
<?php echo $PHA5; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">SEWAGE DISPOSAL SYSTEM ADEQUACY<ul>
<li>Your human waste and gray water sewage system should have sufficient capacity to handle the operation’s peak flows and not cause direct or indirect product contamination.</li>
<li>Cross-connections between the sewage disposal system and product contact water systems are prohibited.</li>
</ul></h6><hr>
<h3 class="ffo"> 10.5 Packinghouse Protocols</h3>
<h4> 10.5.1 </h4>
<?php echo $PHA6; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">EQUIPMENT LUBRICATION MANAGEMENT<br>Equipment lubrication should be managed so as not to contaminate food products.<ul>
<li>Only food-grade lubricants should be used on food processing and packaging equipment, or on any other equipment where incidental food contact may occur, unless the equipment manufacturer specifies only a non-food grade lubricant.</li>
<li>Lubricant leaks are promptly fixed or catch pans installed to prevent product contamination.</li>
<li>You should keep purchase or maintenance records so auditors/purchasers can verify that all lubricants used are food-grade.</li>
</ul></h6><hr>
<h4> 10.5.2 </h4>
<?php echo $PHA7; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PREVENTIVE MAINTENANCE PROCEDURES<ul>
<li>Roof leaks should be promptly identified, controlled and repaired1.
<li>Drip pans and drains should be maintained to assure condensate does not become a source of contamination.</li>
<li>Prior to use, the lines used for washing, grading, sorting, or packing should be cleaned and sanitized as appropriate based on assessment of risk. When in use, the lines should be maintained so as not to be a source of contamination.</li>
<li>Your operation should develop, implement, and schedule repair, cleaning, sanitizing, storage and handling procedures of all food contact surfaces to reduce and control the potential for contamination. These procedures should be documented.</li>
<li>Transporting equipment should be maintained to prevent contamination of products being transported. Maintenance of pallet jacks, carts, trolleys and forklifts, should be listed on a Preventive Maintenance and/or Master Cleaning Schedule(s).</li>
<li>Any temporary repairs on food contact surfaces must be constructed of food-grade material. Your operation should have procedures to ensure temporary repairs are compliant with all food safety requirements, and do not create potential sources of chemical, microbiological or physical contamination.</li>
<li>Your operation should have a procedure to ensure that permanent repairs are implemented as soon as practical and include timelines and responsibilities for completion.</li>
<li>Foreign material control devices should be inspected and maintained. If in use at your operation, they should be included as part of your Preventive Maintenance Schedule or other program and maintained to ensure effective operation. Calibration checks should be performed according to written procedure or manufacturer's recommendations.</li>
<li>Trash, leaves, trim, culls, waste water and other waste materials should be removed from the produce handling areas at a sufficient frequency so they don't become a source of produce contamination1.</li>
</ul></h6><hr>
<h4> 10.5.3 </h4>
<?php echo $PHA8; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PACKINGHOUSE EQUIPMENT AND TOOL MAINTENANCE<ul>
<li>Equipment, utensils and tools used for cleaning or sanitizing, including food contact and non-food contact surfaces, must be maintained so they do not become a source of produce contamination. They should be stored away from product handling areas.</li>
<li>All chemicals used for cleaning or sanitizing food contact equipment, tools, utensils, containers and other food contact surfaces must be approved for that use, according to the chemical manufacturer or supplier and all federal, state and local requirements. These chemicals should only be used in a manner consistent with the approved use.</li>
</ul></h6><hr>
<h4> 10.5.3 </h4>
<?php echo $PHA9; ?><br>
<h3 class="ffo"> 10.6 Water and Ice</h3>
<h4> 10.6.1 </h4>
<?php echo $PHA10; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PACKINGHOUSE WATER AND ICE QUALITY<ul>
<li>If water or ice directly contacts the harvested crop or is used on food-contact surfaces, the operation should have a procedure/SOP (standard operating procedure) which requires that water or ice meets the microbial standards for drinking water, as defined by prevailing regulation or the country in which the product will be traded, whichever is more strict.</li>
<li>Contamination may occur through dirt and soil build up or cross contamination of "clean" fruit with those carrying pathogens, if water is not maintained in a sanitary condition through added sanitizers and/or frequent water changes.</li>
<li>Water may be treated (e.g., with chlorine) to achieve the microbial standards or to prevent cross-contamination.</li>
<li>Ice and water shall be sourced/manufactured, transported, and stored under sanitary conditions.</li>
</ul></h6><hr>
<h4> 10.6.2 </h4>
<?php echo $PHA11; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PACKINGHOUSE WATER DISTRIBUTION SYSTEMS <ul>
<li>The water-delivery system should be maintained so as not to serve as a source of contamination of produce, water supplies or equipment with pathogens, or to create an unsanitary condition.</li>
<li>Water installations and equipment should be constructed and maintained to prevent back siphonage backflow and cross connections between product contact water and waste water. Routine checks should verify that back siphonage and backflow prevention units are functioning properly (annually or as needed to maintain continuous protection). Results should be documented.</li>
</ul></h6><hr>
<h3 class="ffo"> 10.7 Wash Protocols</h3>
<h4> 10.7.1 </h4>
<?php echo $PHA12; ?><br>
<h4> 10.7.2 </h4>
<?php echo $PHA13; ?><br>
<h3 class="ffo"> 10.8 Monitoring Equipment</h3>
<h4> 10.8.1 </h4>
<?php echo $PHA14; ?><br>
<h3 class="ffo"> 10.9 Microbial Testing</h3>
<h4> 10.9.1 </h4>
<?php echo $PHA15; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">LABORATORY TESTING REQUIREMENTS<ul>
<li>Where microbiological analysis is required in your Food Safety Plan, testing should be performed by a Good Laboratory Practices (GLP) laboratory using validated methods.</li>
<li>The laboratories used should have, at minimum, passed a GLP audit or participates in a Proficiency Testing program, and utilizes BAM (Bacteriological Analytical Manual), AOAC International (Association of Official Chemists)or testing methods that have been validated for detecting or quantifying the target organism(s).</li>
<li>Samples should be taken in accordance with an established written sampling procedure.</li>
<li>Tests, their results and actions taken must be documented and records maintained for two years.</li>
<li>For all microbiological testing required, there should be a written testing procedure that includes test frequency, sampling, test procedures, responsibilities and actions to be taken based on results.</li>
<li>If finished product is tested for pathogens or other contamination, the operation should have a procedure requiring that it not be distributed outside the operation’s control until test results are obtained.</li>
</ul></h6><hr>

<h3 class="ffo"> 10.10 Cooling Facilities</h3>
<h4> 10.10.1 </h4>
<?php echo $PHA16; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">TEMPERATURE MONITORING<ul>
<li>Pathogens such as Listeria monocytogenes can grow and multiply in unclean cooling areas and air cooling equipment.</li>
<li>Cooling facilities should be fitted with temperature monitoring equipment or a suitable temperature monitoring device.</li>
<li>When produce is cooled, it should be cooled to temperatures appropriate to the commodity based on current regulatory or industry standards.</li>
<li>When required for food safety or by industry guidelines, steps are taken to minimize temperature increases and minimize the time between produce receipt and cooling at the operation.</li>
<li>Product temperature and equipment control mechanisms should be calibrated and monitored at a defined frequency and temperatures kept appropriate to the commodity. Records must be kept.</li>
<li>It is recommended that temperature monitoring equipment be fitted with a temperature gauge that is easily readable and accessible2. Multiple thermometers can be used to assure correct temperatures.</li>
<li>It is recommended that storage cooler temperatures will be checked and logged two times per day, and the thermometer calibration performed monthly.</li>
<li>Air intakes near contamination sources (e.g. manure/compost piles, animal sheds etc) can pose a risk to food safety.</li>
<li>Containers holding finished produce during chilling operations should be clean and sanitary.</li>
</ul></h6><hr>

<h3 class="ffo"> 10.11 Packaging</h3>
<h4> 10.11.1 </h4>
<?php echo $PHA17; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">PACKAGING SPECIFICATIONS AND LABEL APPROVALS<ul>
<li>Specifications for all packaging materials that have an impact on finished product safety and quality should be available and comply with prevailing regulations.</li>
<li>The methods and responsibility for developing and approving detailed specifications and labels for all packaging should be documented.</li>
<li>A register of packaging specifications and label approvals should be maintained and kept current.</li>
</ul></h6><hr>

<h3 class="ffo"> 10.12 Allergen Control Program</h3>
<h4> 10.12.1 </h4>
<?php echo $PHA18; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">ALLERGEN CONTROL PROCEDURES<ul>
<li>Your allergen control policy should list the allergens in use or storage at your operation.</li>
<li>If applicable, procedures should address identification and segregation of allergens during storage and handling as based on a risk assessment conducted by the operation.</li>
</ul></h6><hr>

<h3 class="ffo"> 10.13 Record Keeping</h3>
<h4> 10.13.1 </h4>
<?php echo $PHA19; ?><br>
</p>
<pagebreak />

<p>
<h2 class="ffo"> Section 11: Final Product Transport</h2>
<hr>
<h3 class="ffo"> 11.1 Produce Transportation from Packinghouse to Customer</h3>
<h4> 11.1.1 </h4>
<?php echo $FTP0; ?><br>
<h5>Best Practice Information</h5>
<h6 class="bpi">SUITABILITY OF VEHICLES USED TO TRANSPORT PRODUCE<ul>
<li>Personnel responsible for loading of produce should be trained to inspect the cargo areas of vehicles used to transport produce from the field.</li>
<li>Vehicles used to transport produce should be clean, functional and free of objectionable odors before loading, in compliance with current industry practices or regulatory requirements for that commodity.</li>
<li>Refrigeration units, if used, must be in working order.</li>
<li>Unless vehicles are dedicated to transport of produce, procedure requires review of transport history for immediate past 3 loads, or that trailer must first be sufficiently cleaned to prevent produce contamination.</li>
<li>Procedures should include prohibition of raw animal or animal product transport, or other materials that may be a source of contamination with pathogens.</li>
<li>Trash should not come in contact with produce. Trash removed from field packing operations should be handled and transported out of the field in a manner that does not pose a hazard of contamination of produce.</li>
<li>Cargo areas and containers that have been used to transport trash, animals, raw animal products or other items that may be a source of contamination with pathogens must first be cleaned and sanitized to ensure that contamination of produce does not occur.</li>
</ul></h6><hr>
<h4> 11.1.2 </h4>
<?php echo $FTP1; ?><br>
<hr>	  
<h5>Best Practice Information</h5>
<h6 class="bpi">LOADING AND UNLOADING PROCEDURES<ul>
<li>Personnel responsible for the loading and unloading of produce should take steps to minimize the potential of physical damage to produce, which can introduce and/or promote the growth of pathogens.</li>
Loading/unloading equipment should be clean and well maintained and of suitable type to avoid contamination of produce1. You should consider all vehicle types that come into contact with produce (cars, trucks, pallet jacks, carts, trolleys and forklifts).</li>
Potential sources of contamination include soil, dirt, organic fertilizer, spills, trash, animals, raw animal products, pallet covers and other materials that come in contact with produce.</li>
</ul></h6><hr>
<h3 class="ffo"> 11.2 Temperature Control for Transport Vehicles</h3>
<h4> 11.2.1 </h4>
<?php echo $FTP2; ?><br>
<h5>Best Practice Information</h5>
<h6 class="bpi">TRANSPORTATION TEMPERATURE CONTROL PROCEDURES<ul>
<li>A written policy is required for transporters to maintain specified temperature(s) during transit. These temperature ranges should be predetermined for the commodities being transported.</li>
<li>Prior to loading, vehicle(s) should be pre-cooled to the temperature appropriate to the type of produce being transported.</li>
<li>Refrigerated transport vehicles should have properly maintained and fully functional refrigeration equipment. Your operation should have a written policy that refrigerated transportation equipment be controlled by a thermostatic device as necessary to maintain temperatures in the cargo area for the particular type of produce being transported.</li>
<li>When prevailing regulations, your customers or current industry standards for the commodity/(ies) being transported require temperature of product be taken and recorded prior to or upon loading, you should have a written procedure for when and how to measure these product temperatures.</li>
</ul></h6><hr>
<h3 class="ffo"> 11.3 Record Keeping</h3>
<h4> 11.3.1 </h4>
<?php echo $FTP3; ?><br>
</p>
<pagebreak />

<h1 class="ffo">Attach Section 1 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 2 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 3 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 4 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 5 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 6 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 7 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 8 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 9 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 10 documents here</h1><pagebreak />
<h1 class="ffo">Attach Section 11 documents here</h1><pagebreak />


            <?php
        }

        ?>

	</body>
</html>
