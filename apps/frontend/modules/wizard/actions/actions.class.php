<?php

/**
 * wizard actions.
 *
 * @package    manager
 * @subpackage wizard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class wizardActions extends CustomActions
{	
	public function preExecute() {		
		$wizardIds = array(
			"install",
			"response",
			"nadeSignature",
			"test",
			"pdf",
			"eventCorrelation",
			"supressor",
			"eventCorr"
		);

		foreach($wizardIds as $id) {
			if(strstr($this->getActionName(),$id)) {
				$this->mode = XmlParser::WIZARD;
				break;
			}
		}

		if(!isset($this->mode)) {
			$this->mode = XmlParser::PANEL;
		}

		$this->step = $this->getRequestParameter("step",1);

		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");

		if($this->getRequestParameter("skip")) {
			$session["skip"][] = $this->getRequestParameter("skip");
		} else {
			if(isset($session["skip"])) {
				while(($k = array_search($this->step,$session["skip"])) !== false) {
					unset($session["skip"][$k]);
				}
			}
		}

		$this->getUser()->getAttributeHolder()->removeNamespace('parser/wizard');
		$this->getUser()->getAttributeHolder()->add($session, 'parser/wizard');


		sfProjectConfiguration::getActive()->loadHelpers("Helper");

		$this->setLayout("layoutExtjs");
		$this->setTemplate("ext");
		
		return sfView::SUCCESS;


	}
	/**
	 * The new event correlation wizarrd begins here
	 * @return unknown_type
	 */
	public final function executeEventCorr1(){
		$this->getUser()->setAttribute('correlation_rule_id','');
		$this->getUser()->getAttributeHolder()->removeNamespace('correlation_triggers');
		$this->init = true;
		$this->title = "Welcome to the Event Correlation Rule Wizard!";
		$this->html = "<div style='padding:10px; font-size:13px'>This software will help you to create event correlation rules.<br>Please click <b>Next</b> button to begin.</div>";
		$this->current = 1;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}
	public final function executeEventCorr2()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the information for event correlation rule.</div>";
		$this->current = 2;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}
	public final function executeEventCorr3()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Add triggers to the rule.</div>";
		$this->current = 3;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}
	public final function executeEventCorr4()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Here you can specify when should the rule trigger an event.<br/>
		Two conditions can be applied each related to time and hit count.<br/>
		The condition might be like <b>if time is less than 5 seconds and hit count is greater than 2</b><br/>
		You can also configure the event message for the event to trigger.</div>";
		$this->current = 4;
		$this->id = $this->getRequestParameter('id','new');
		
		//Storing to session
		$session = $this->getUser()->getAttributeHolder()->getAll('parser/wizard');
		$this->getUser()->getAttributeHolder()->remove('parser/wizard');
		$triggers = $this->getUser()->getAttributeHolder()->getAll('correlation_triggers');
		$session[3] = $triggers;
		$this->getUser()->getAttributeHolder()->add($session,'parser/wizard');		
		
		$parser = new XmlParser($this->mode);


		$this->layout = $parser->getLayout();
	}
	public final function executeEventCorr5()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:20px;'><div style='font-size:20px;margin-bottom:10px;'>Completing Event Correlation Wizard !</div>The wizard has finished creating event correlation rule. Below is the overall summary of the rule. Please click the <b>Finish</b> button to complete if everything is ok.</div>";
		$this->current = 5;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->end = "eventCorr5";
		$this->layout = $parser->getLayout();
	}
	/*******************************************************************************/
	public final function executeEventCorrelation1()
	{
		$this->init = true;

		$this->title = "Welcome to the Event Correlation Rule Wizard!";
		$this->html = "<div style='padding:10px; font-size:13px'>This software will help you to create event correlation rules.<br>Please click <b>Next</b> button to begin.</div>";
		$this->current = 1;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeEventCorrelation2()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the information for event correlation rule.</div>";
		$this->current = 2;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeEventCorrelation3()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Specify when do you want this rule to be activated.<br/>
		Activation can be either weekly or monthly.<br/>
		For weekly activation, rule can be activated on one or more days of week.<br/>
		For activating rules on monthly basis, select one or more days of month the rule should be activated.<br/>  
		For any day of week or day of month, rules can also be activated only on specified hour like 0-13, 17-23 etc..
		</div>";
		$this->current = 3;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeEventCorrelation4()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Here you can select the events that you want to correlate.<br/>
		After selecting one or more events, you can specify if they should occur in sequence or random order.<br/>
		Any rule can be reset after certain time or certain number of hits (All events specified occur = 1 hit)</div>";
		$this->current = 4;
		$this->id = $this->getRequestParameter('id','new');		
		
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeEventCorrelation5()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Here you can specify when should the rule trigger an event.<br/>
		Two conditions can be applied each related to time and hit count.<br/>
		The condition might be like <b>if time is less than 5 seconds and hit count is greater than 2</b><br/>
		You can also configure the event message for the event to trigger.</div>";
		$this->current = 5;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);


		$this->layout = $parser->getLayout();
	}

	public final function executeEventCorrelation6()
	{
		$this->title = "Event Correlation wizard";
		$this->html = "<div style='padding:20px;'><div style='font-size:20px;margin-bottom:10px;'>Completing Event Correlation Wizard !</div>The wizard has finished creating event correlation rule. Please click the <b>Finish</b> button to complete.</div>";
		$this->current = 6;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->end = "eventCorrelation6";
		$this->layout = $parser->getLayout();
	}


	/*
	 * PDF WIZARD
	 */

	public final function executePdf1()
	{
		$this->init = true;

		$this->title = "Welcome to the Report Wizard!";
		$this->html = "<div style='padding:10px; font-size:13px'>This software will help you to create reports in HTML, XML, CSV and PDF format.<br>Please click <b>Next</b> button to begin.</div>";
		$this->current = 1;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}


	public final function executePdf2()
	{
		$this->title = "Report Wizard - Report Overall Settings";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide some basic information about this report and choose its type.
		  <br /><br />  
          The introduction text will be printed on a separate page and should provide iformation about the report. 
          The description text is for your own records only. Date and time values will be adjusted according to
          the selected time zone.</div>";

		$this->id = $this->getRequestParameter('id','new');

		if($this->id != "new") {
			$object = PdfReportsPeer::retrieveByPK($this->id);
		} else {
			$object = null;
		}

		$this->current = 2;
		$this->zone = ($object) ? $object->getTimeZonesId() : (($timezone = TimeZonesPeer::getDefaultZone()) ? $timezone->getId() : '');
		$this->type = ($object) ? $object->getReportType() : 1;
		$this->atype = ($object) ? $object->getAssetList() : 1;


		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}


	public final function executeChooseReportType() {
		
		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");
		$type = $session[2]["fields"]["report_type_value"];
		$this->forward404Unless($type);

		$this->forward("wizard","pdf".($type+2));

	}

	public final function executePdf3()
	{
		$this->title = "Report Wizard - Time Range";
		$this->html = "<div style='padding:10px; font-size:13px'>Please define the period the report should cover.
  		  <br /><br />
          In case of static reports you may define an interval and such a report will be generated only once. On
          the other hand, danymic reports are generated periodically based on the occuring date you set here. </div>";

		$this->current = 3;
		
		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");

		if(isset($session[3]["fields"])) {
			if(isset($session[3]["fields"]["extraction_period_value"])) {
				unset($session[3]["fields"]["extraction_period_value"]);
				$this->getUser()->getAttributeHolder()->removeNamespace('parser/wizard');
				$this->getUser()->getAttributeHolder()->add($session, 'parser/wizard');
			}
		}


		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}


	public final function executePdf4()
	{
		$this->title = "Report Wizard - Time Range";
		$this->html = "<div style='padding:10px; font-size:13px'>Please define the period the report should cover.
  		  <br /><br />
          In case of static reports you may define an interval and such a report will be generated only once. On
          the other hand, danymic reports are generated periodically based on the occuring date you set here. </div>";

		$this->current = 4;

		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");

		if(isset($session[3]["fields"])) {
			if(isset($session[3]["fields"]["extraction_from"])) {
				unset($session[3]["fields"]["extraction_from"]);
				unset($session[3]["fields"]["extraction_to"]);
				$this->getUser()->getAttributeHolder()->removeNamespace('parser/wizard');
				$this->getUser()->getAttributeHolder()->add($session, 'parser/wizard');
			}
		}


		$this->id = $this->getRequestParameter('id','new');

		if($this->id != "new") {
			$object = PdfReportsPeer::retrieveByPK($this->id);
		} else {
			$object = null;
		}

		$this->period = ($object) ? $object->getExtractionPeriod() : 0;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}


	public final function executePdf5()
	{
		$this->title = "Report Wizard - Systems";
		$this->html = "<div style='padding:10px; font-size:13px'>Please select one ore more devices.
          <br /><br />
          The report will be generated using event data related to the selected hardware. Click to the checkbox next to the group
          name to select all devices in that group, unchecking the box will deselect those devices. By clicking to the
          name of a group, you can open and collapse the list.</div>";

		$this->current = 5;
		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");

		if(isset($session[3]["fields"]["extraction_period_value"])) {
			$this->prev = 4;
		} else {
			$this->prev = 3;
		}

		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}


	public final function executePdf6()
	{
		
		$this->title = "Report Wizard - Events";
		$this->html = "<div style='padding:10px; font-size:13px'>Please choose one or more event types.
  		  <br /><br />
          The report will include only those type of events you select here. Click to the checkbox next to the group
          name to select all events in that group. Repeat the previous step to clear selection. By clicking to the
          name of a group, you can open and collapse the list.</div>";

		$this->current = 6;

		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}


	public final function executePdf6a()
	{
		$this->title = "Report Wizard - Event Search Parameters";
		$this->html = "<div style='padding:10px; font-size:13px'>You selected Custom Event Report type, which requires additional parameters to be defined.
		<br /><br/> 
		Please define one or more parameters using the form below, then press /Next/ to continue.
		</div>";

		$this->current = "6a";
		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");

		if(isset($session["6b"])) {
			$this->ps = "6b";
		} else if(isset($session["6c"])) {
			$this->ps = "6c";
		} else {
			$this->ps = 6;
		}

		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executePdf6b()
	{

		$this->title = "Report Wizard - Firewall Search Parameters";
		$this->html = "<div style='padding:10px; font-size:13px'>You selected Custom Firewall Report type, which requires additional parameters to be defined.
		<br /><br/> 
		Please define one or more parameters using the form below, then press /Next/ to continue.</div>
		";

		$this->current = "6b";
		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");

		if(isset($session["6c"])) {
			$this->ps = "6c";
		} else {
			$this->ps = 6;
		}

		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}


	public final function executePdf6c()
	{
		$this->title = "Report Wizard - Log Search Parameters";
		$this->html = "<div style='padding:10px; font-size:13px'>You selected Custom Log Report type, which requires additional parameters to be defined.
		<br /><br/> 
		Please define one or more parameters using the form below, then press /Next/ to continue.
		</div>";

		$this->current = "6c";

		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	
	public final function executePdf7()
	{		
		
		$this->title = "Report Wizard - Order of Widgets";
		$this->html = "<div style='padding:10px; font-size:13px'>On this screen you can define the order of widgets (data types selected in previous step).
		<br /><br/> 
		The widgets will be printed in this order. 
		</div>";

		$this->current = 7;

		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}
	
	
	public final function executePdf8()
	{
			
		$types = array("event" => "a", "firewall" => "b", "log" => "c");
		$this->id = $this->getRequestParameter('id','new');

		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");

		if(isset($session[6]["redirect"]) && !empty($session[6]["redirect"])) {
			$item = $types[array_shift($session[6]["redirect"])];
			$url = "wizard/pdf6".$item."?";

			if(!empty($session[6]["redirect"])) {
				foreach($session[6]["redirect"] as $r) {
					$url .= $r."=true&";
				}
			}

			$this->getUser()->getAttributeHolder()->removeNamespace('parser/wizard');
			$this->getUser()->getAttributeHolder()->add($session, 'parser/wizard');

			$this->redirect(trim($url,"&")."&id=".$this->id);
		}


		if(isset($session["6a"])) {
			$this->ps = "6a";
		} else if(isset($session["6b"])) {
			$this->ps = "6b";
		} else if(isset($session["6c"])) {
			$this->ps = "6c";
		} else {
			$this->ps = 6;
		}

		$this->title = "Report Wizard - Notifiers";
		$this->html = "<div style='padding:10px; font-size:13px'>You may define as many email addresses as you need on this screen.
        <br /><br />  
        If you intend to specify more than one emails, please separate them with comma (,).
  		<br /><br />
        Upon generation, the report will be automatically sent to these recipients. Please note that this step
        is completely optional! You can leave all fields blank if you do not want associate notifiers with this
        report.</div>";

		$this->current = 8;
		$this->last = true;
		$this->end = "pdf9";

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}
	
	
	public final function executePdf9()
	{

		$this->title = "Report Wizard - Success!";
		$this->html = "<div style='padding:10px; font-size:13px'><b>Congratulations!</b><br>Your report has been saved successfuly. You may close this wizard now.</div>";
		$this->current = 9;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}


	public final function executePdfTimeRange()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}
	
	
	public final function executePdfOrdering()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}

	public final function executePdfTimeRange2()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}

	public final function executePdfAssets()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}

	public final function executePdfDataTypes()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}

	public final function executePdfNotifiers()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}

	public final function executePdfBasicSettings()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}




	/*
	 * NADE SIGNATURE WIZARD
	 */

	public final function executeNadeSignature1()
	{
		$this->init = true;

		$this->title = "Welcome to the nade signature creation wizard!";
		$this->html =
"<div style='padding:10px; font-size:13px'>This wizard will guide you through the process of creating <b>NADE</b> signatures.
<br/>
<b>Network Anomaly Detection Engine (NADE)</b> supports custom rules written to detect any abnormalities in
network connections.
<br/>
Using this wizard, you can build rules to count for total number of connections, total number of unique source ip, 
destination ip, port etc. Every rule has a threshold value of count defined which if crossed, an event is triggered.<br><br>Please click <b>Next</b> button to begin.</div>";

		$this->current = 1;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeNadeSignature2()
	{
		$this->title = "Nade signature wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Configure the rule name and its threat level.</div>";
		$this->current = 2;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeNadeSignature3()
	{
		$this->title = "Nade signature wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Configure the network connection to match for and analysis time window.</div>";
		$this->current = 3;
		$this->id = $this->getRequestParameter('id','new');
		$this->next = ($this->id == "new") ? 4 : 5;
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeNadeSignature4()
	{
		$this->title = "Nade signature wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Configure responder to count something and a threshold value for the count.
		<br/>Multiple values can be added using Add New button.</div>";

		$this->current = 4;
		$this->id = $this->getRequestParameter('id','new');

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeNadeSignature5()
	{
		$this->title = "Nade signature wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Select the active response.</div>";
		$this->current = 5;
		$this->id = $this->getRequestParameter('id','new');

		$this->last = true;
		$this->end = "nadeSignatureFinal";

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeNadeSignatureFinal()
	{
		$this->title = "Nade signature final preview";
		$this->html = "Instructions for step 2";
		$this->current = 6;
		$this->id = $this->getRequestParameter('id','new');
		$this->end = "@nadesignature";
		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();
	}

	public final function executeFinalPreview()
	{
		$this->html = 'Users final preview will be displayed here';
		$this->title = 'Fianl Preview';
	}


	// Test Wizard

	public final function executeTest1()
	{
		
		$this->init = true;

		$this->title = "Test";
		$this->html = "Instructions for step 1";
		$this->current = 1;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	public final function executeTest2()
	{

		$this->title = "Test";
		$this->html = "Instructions for step 2";
		$this->current = 2;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	
	public final function executeTest3()
	{
		
		$this->title = "Test";
		$this->html = "Instructions for step 3";
		$this->current = 3;

		$this->last = true;
		$this->end = "test4";
		
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}
	
	public final function executeTest4()
	{
		
		$this->title = "Test";
		$this->html = "Instructions for step 4";
		$this->current = 4;
		
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}


	/*
	 *
	 * INSTALL WIZARD ACTIONS
	 *
	 *
	 */


	public final function executeInstall1()
	{
			
		$this->init = true;

		$this->title = "Welcome to the LogInspect Setup Wizard!";
		$this->html = "<div style='padding:10px; font-size:13px'>This software will help you setup <strong>LogInspect</strong> on this computer.<br/><br/>You will need your serial number and activation key to register the product, although this step is optional.<br/><br/>Please click to the <strong>Next</strong> button to begin and follow on-screen instructions.</div>";
		$this->current = 1;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}


	public final function executeInstall2()
	{

		$this->title = "Install Wizard - End-User License Agreement";
		$this->html = "<div style='padding:10px; font-size:13px'>Please read carefully the End-User Licence Agreement.</div>";
		$this->current = 2;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	public final function executeInstall3()
	{

		$this->title = "Install Wizard - Network And Time Settings";
		$this->html = "<div style='padding:10px; font-size:13px'>Network and Time settings for the appliance.</div>";
		$this->current = 3;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	public final function executeInstall4()
	{

		$this->title = "Install Wizard - Email Settings";
		$this->html = "<div style='padding:10px; font-size:13px'>Email setting.</div>";
		$this->current = 4;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	public final function executeInstall5()
	{

		$this->title = "Install Wizard - Admin User Settings";
		$this->html = "<div style='padding:10px; font-size:13px'>Please choose admin password and time zone.</div>";
		$this->current = 5;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	public final function executeInstall6()
	{

		$this->title = "Install Wizard - User Management";
		$this->html = "<div style='padding:10px; font-size:13px'>Create new user.</div>";
		$this->current = 6;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	public final function executeInstall7()
	{

		$this->title = "Install Wizard - Product Registration";
		$this->html = "<div style='padding:10px; font-size:13px'>Please register product by providing the informations below.</div>";
		$this->current = 7;

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}


	public final function executeInstall8()
	{

		$this->title = "Install Wizard - Product License Key";
		$this->html = "<div style='padding:10px; font-size:13px'>Please use your software number and hardware number at <a href='http://www.immunesecurity.com/cms/en/register' target='_blank' style='color:#0000ff'>http://www.immunesecurity.com/cms/en/register</a> to get your activation key.</div>";
		$this->current = 8;

		$this->last = true;
		$this->end = "install9";

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}

	public final function executeInstall9()
	{

		$fp = fopen("/usr/www/manager/data/.installed","w");

		if(!$fp) {
			throw new Exception("Cannot finish wizard, file write error!");
		}

		fwrite($fp,"This file is generated by the system, DO NOT delete it!");
		fclose($fp);
		
		$ntp = NetPeer::retrieveByPK(1);
		if($ntp->getNtpEnabled() && $ntp->getNtpServer()){
			Net::ntpServer($ntp->getNtpServer());
			Net::ntpStart();
		}
		$this->title = "Install Wizard - Setup has been finished!";
		$this->html = "<div style='padding:10px; font-size:13px'><div style='font-size:20px'>Installation Complete !</div>LogInspect has been <strong>successfuly</strong> configured and is fully operational.<br/><br/>Please go to the <a href='/login' style='color:#0000ff'><b>login</b></a> page and sign in!</div>";
		$this->current = 8;
		
		
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}


	public final function executeEula()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}


	public final function executeEmailSetup()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}
	
	
	public final function executeUpload()
	{

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}

	public final function executeAdminSetup()
	{
		$default = TimeZonesPeer::getDefaultZone();
		$this->zone = $default ? $default->getId() : '';

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}


	public final function executeUserSetup()
	{

		$this->id = $this->getRequestParameter('id','');
		$this->zone = "";
		$this->op = "";

		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}


	public final function executeTimeSetup()
	{
		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}


	/*
	 *
	 * ACTIVE RESPONSE WIZARD ACTIONS
	 *
	 */


	public final function executeResponse0()
	{
		$this->init = true;

		$this->title = "Welcome to the ActiveResponse Wizard!";
		$this->html = "<div style='padding:10px; font-size:13px'>This wizard will help you to create active response.<br>Please click <b>Next</b> button to begin.</div>";
		$this->current = 1;
		$this->id = $this->getRequestParameter("id","new");

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}


	public final function executeChooseResponse() {

		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");
		$type = $session[2]["fields"]["event_response_module_type_id_value"];
		$this->forward404Unless($type);



		$this->forward("wizard","response".($type+1));

	}


	public final function executeResponse1()
	{

		$this->title = "ActiveResponse Wizrad - Basics";
		$this->html = "<div style='padding:10px; font-size:13px'>Please choose the type of connector and provide its name and description.</div>";
		$this->current = 2;

		$this->id = $this->getRequestParameter("id","new");
		$this->event_response_module_type_id = $this->getRequestParameter("event_response_module_type_id","");

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

	}


	public final function executeResponse2()
	{
		$this->last = true;

		$this->title = "ActiveResponse Wizard - Email Connector";
		$this->html = "Instructions for email connector";
		$this->current = 3;
		$this->end = "@connectors";

		$this->id = $this->getRequestParameter("id","new");
			
		if($this->id && $this->id != "new") {
			$c = new Criteria();
			$c->add(EventResponseModuleSmtpPeer::EVENT_RESPONSE_MODULE_CONNECTOR_ID,$this->id);
			$object = EventResponseModuleSmtpPeer::doSelectOne($c);;
			$this->cid = $object->getId();
		} else {
			$this->cid = 0;
		}

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();

		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");
		$this->getUser()->setFlash("connector",$session[2]["fields"]["event_response_module_type_id_value"]);

	}


	public final function executeResponse3()
	{

		$this->last = true;

		$this->title = "ActiveResponse Wizard - HTTP Connector";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the information for http copnnector.</div>";
		$this->current = 3;
		$this->end = "@connectors";

		$this->id = $this->getRequestParameter("id","new");

		if($this->id && $this->id != "new") {
			$c = new Criteria();
			$c->add(EventResponseModuleHttpPeer::EVENT_RESPONSE_MODULE_CONNECTOR_ID,$this->id);
			$object = EventResponseModuleHttpPeer::doSelectOne($c);
			$this->cid = $object->getId();
			$this->method = $object->getMethod();
		} else {
			$this->cid = $this->method = 0;
		}

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();


	}


	public final function executeResponse4()
	{
		$this->title = "ActiveResponse Wizard - SSH Connector";
		$this->html = "Instructions for ssh copnnector";
		$this->current = 3;

		$this->id = $this->getRequestParameter("id","new");

		if($this->id && $this->id != "new") {
			$c = new Criteria();
			$c->add(EventResponseModuleSshPeer::EVENT_RESPONSE_MODULE_CONNECTOR_ID,$this->id);
			$object = EventResponseModuleSshPeer::doSelectOne($c);
			$this->cid = $object->getId();
		} else {
			$this->cid = 0;
		}
		$this->selected = $this->cid ? $object->getType(): '';
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeChooseSshResponse()
	{
		$session = $this->getUser()->getAttributeHolder()->getAll('parser/wizard');
		$type = $session[3]["fields"]["type_value"];
		$this->forward404Unless($type);
		
		$this->forward("wizard","response".($type+4));
	}

	public final function executeResponse5()
	{
		$this->last = true;

		$this->title = "ActiveResponse Wizard - Password for SSH Connection";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the password for SSH Connection.</div>";
		$this->current = 4;
		$this->end = "@connectors";

		$this->id = $this->getRequestParameter("id","new");

		if($this->id && $this->id != "new") {
			$c = new Criteria();
			$c->add(EventResponseModuleSshPeer::EVENT_RESPONSE_MODULE_CONNECTOR_ID,$this->id);
			$object = EventResponseModuleSshPeer::doSelectOne($c);
			$this->cid = $object->getId();
		} else {
			$this->cid = $this->method = 0;
		}

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}



	public final function executeResponse6()
	{
		$this->last = true;

		$this->title = "ActiveResponse Wizard - SSH Connector";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the certificate for SSH Connection.</div>";
		$this->current = 4;
		$this->end = "@connectors";

		$this->id = $this->getRequestParameter("id","new");

		if($this->id && $this->id != "new") {
			$c = new Criteria();
			$c->add(EventResponseModuleSshPeer::EVENT_RESPONSE_MODULE_CONNECTOR_ID,$this->id);
			$object = EventResponseModuleSshPeer::doSelectOne($c);
			$this->cid = $object->getId();
		} else {
			$this->cid = 0;
		}

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}

	public final function executeResponse7()
	{
		$this->last = true;

		$this->title = "ActiveResponse Wizard - SSH Connector";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the certificate and paraphrase for SSH Connection.</div>";
		$this->current = 4;
		$this->end = "@connectors";

		$this->id = $this->getRequestParameter("id","new");

		if($this->id && $this->id != "new") {
			$c = new Criteria();
			$c->add(EventResponseModuleSshPeer::EVENT_RESPONSE_MODULE_CONNECTOR_ID,$this->id);
			$object = EventResponseModuleSshPeer::doSelectOne($c);
			$this->cid = $object->getId();
		} else {
			$this->cid = 0;
		}

		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();
	}
	

	public final function executeSaveJson() {

		$session = $this->getUser()->getAttributeHolder()->getAll("parser/wizard");
		$post = $this->getRequest()->getParameterHolder()->getAll();
		$step = $this->getRequestParameter("step");
		$props = explode(",",$this->getRequestParameter("props",""));

		$data = $redirect = array();
		
		$i = 0;
		
		foreach(json_decode($post["selections"]) as $object) {
			if($object->_parent) {
				$data["items"][$object->_parent]["entries"][$i] = array("id" => $object->_id);

				if(trim($props[0]) != "") {
					foreach($props as $prop) {
						$data["items"][$object->_parent]["entries"][$i][$prop] = $object->$prop;
					}
				}
				
				if($step == 6 && $object->_id == 29) {
					$data["redirect"][] = "event";
				}
				if($step == 6 && $object->_id == 28) {
					$data["redirect"][] = "firewall";
				}
				if($step == 6 && $object->_id == 30) {
					$data["redirect"][] = "log";
				}
			} 
			$i++;
		}
		
		$session[$step] = $data;

		$this->getUser()->getAttributeHolder()->removeNamespace('parser/wizard');
		$this->getUser()->getAttributeHolder()->add($session, 'parser/wizard');

		$this->setLayout(false);

		$result = array('success' => true, 'message' => 'Selection saved!');
		$result = json_encode($result);
		return $this->renderText($result);

	}


	public function paramsToArray($set,$sep = "&") {

		$params = explode($sep,$set);

		foreach($params as $p) {
			$temp = explode("=",$p);
			for($n = 0; $n < sizeof($set); $n+=2)
			{
				$args[trim($temp[$n])] = (isset($temp[$n+1])) ? trim($temp[$n+1]) : null;
			}
		}

		return $args;
	}

	public final function executeFinalize()
	{
		
		
		$connectorTypes = array(1 => "smtp","http","ssh");
		$format_json = $this->getRequestParameter("jf",true);

		if($format_json === "false") {
			$format_json = false;
		}

		$this->id = $this->getRequestParameter("id");
		
		if(!$this->id) {
			$this->id = $this->getRequestParameter("amp;id");
		}
		
		$this->current = $this->getRequestParameter("last");
		
		$this->forward404Unless($this->current);

		$this->end = $this->getRequestParameter("end");
		
		if(!$this->end) {
			$this->end = $this->getRequestParameter("amp;end");
		}
		
		$this->forward404Unless($this->end);

		$session = $this->context->getUser()->getAttributeHolder()->getAll("parser/wizard");
		
		if(isset($session[2]["fields"]["event_response_module_type_id_value"])) {
			$connector = $connectorTypes[$session[2]["fields"]["event_response_module_type_id_value"]];
			$con_id = $session[2]["fields"]["event_response_module_type_id_value"];
		} else {
			$con_id = false;
		}

		$tables = $session["datastore"]["tables"];
		$files = (isset($session["datastore"]["files"])) ? $session["datastore"]["files"] : array();
		$fk_ok = false;

		unset($session["datastore"]);
		
		foreach($tables as $k => $t)
		{
			if(isset($t["attributes"]["ignore"]) && in_array($t["attributes"]["ignore"], $session["skip"]))
			{
				unset($tables[$k]);
			}
		}

		$ids = $json_strings = array();
		$c = new Criteria();
		$i = 0;
		$json_table = null;

		foreach($session as $sk => $item)
		{
			if($sk == "skip")
			{
				continue;
			}

			if(!isset($item["fields"]))
			{
				$j = 1;

				foreach($tables as $table_name => $table)
				{
					if($j == $sk-1)
						break;
					$j++;
				}

				if(!$table || empty($table))
				{
					throw new Exception("Table cannot be found!");
				}

				unset($tables[$table_name]);

				$class = $table["attributes"]["class"];

				if((!isset($table["attributes"]["select"]) && !isset($table["attributes"]["insert"])) || (isset($table["attributes"]["insert"]) && $table["attributes"]["insert"] === "new"))
				{
					$fk_ok = true;
				}
				else if(isset($table["attributes"]["insert"]) && preg_match("/[a-z]+=[a-z0-9]+/i",$table["attributes"]["insert"]))
				{
					$tmp = explode("=",$table["attributes"]["insert"]);
					$fk = $tmp[1];
					$fk_ok = true;
				}

				foreach($item as $v)
				{
					$object = new $class();
					foreach($table["fields"] as $field)
					{
						$f = "set".sfInflector::camelize((isset($field["as"])) ? $field["as"] : $field["to"]);
						if(isset($v["fields"][$field["to"]]))
						{
							$set = $v["fields"][$field["to"]];
						}
						if(isset($v["fields"][$field["to"]."_value"]))
						{
							$set = $v["fields"][$field["to"]."_value"];
						}

						if(!isset($set))
						{
							throw new Exception("Cannot find value: ".$field["to"]);
						}

						$object->$f(trim($set));
					}
					if(isset($tmp))
					{
						$f = "set".sfInflector::camelize($tmp[0]);
						$object->$f(trim($fk));
					}
					$object->save();
				}
					
				unset($session[$sk]);
				continue;
			}

		}


		foreach($tables as $key => $table)
		{

			$class = $table["attributes"]["class"];
			$cont = false;
			$tmp = null;

			if(isset($table["attributes"]["condition"]))
			{
				$tmp = explode("=",$table["attributes"]["condition"]);
				if($con_id != $tmp[1])
				{
					continue;
				}
			}


			if($this->id === "new")
			{
				$table["attributes"]["insert"] = $table["attributes"]["select"];
				unset($table["attributes"]["select"]);
			}

			if((!isset($table["attributes"]["select"]) && !isset($table["attributes"]["insert"])) || (isset($table["attributes"]["insert"]) && $table["attributes"]["insert"] === "new"))
			{
				$object = new $class();
				$fk_ok = true;
			}
			else if(isset($table["attributes"]["select"]) && is_numeric($table["attributes"]["select"]))
			{
				$object = call_user_func(array($class."Peer","retrieveByPk"),$table["attributes"]["select"]);
			}
			else if(isset($table["attributes"]["select"]) && preg_match("/[a-z]+=[\$]{0,1}[a-z0-9]+/i",$table["attributes"]["select"]))
			{
				$tmp = explode("=",$table["attributes"]["select"]);
				$c->clear();

				if(substr($tmp[1],0,1) == "$")
				{
					if(!isset($ids[substr($tmp[1],1)-1]))
					{
						throw new Exception("Invalid index specified!");
					}

					$fk = $ids[substr($tmp[1],1)-1]["id"];
					$c->add(constant($class."Peer::".strtoupper($tmp[0])),$fk);

				}
				else
				{
					$c->add(constant($class."Peer::".strtoupper($tmp[0])),$tmp[1]);
				}

				$object = call_user_func(array($class."Peer","doSelectOne"),$c);

			}
			else if(isset($table["attributes"]["insert"]) && preg_match("/[a-z]+=[\$]{1}[a-z0-9]+/i",$table["attributes"]["insert"]))
			{
				$tmp = explode("=",$table["attributes"]["insert"]);

				if(!isset($ids[substr($tmp[1],1)-1]))
				{
					throw new Exception("Invalid index specified!");
				}

				$fk = $ids[substr($tmp[1],1)-1]["id"];
				$object = new $class();
				$fk_ok = true;

			}
			unset($session['skip']);

			foreach($table["fields"] as $field)
			{
				$f = $orig_f = "set".sfInflector::camelize((isset($field["as"])) ? $field["as"] : $field["to"]);
				$set = null;

				foreach($session as $sk => $v)
				{
					if(isset($v["fields"][$field["to"]]))
					{
						$set = $v["fields"][$field["to"]];
						break;
					}
					if(isset($v["fields"][$field["to"]."_value"]))
					{
						$set = $v["fields"][$field["to"]."_value"];
						break;
					}

				}

				/*if(!isset($set))
				{
					throw new Exception("Cannot find value: ".$field["to"]);
				}*/

				if(isset($field["json"]))
				{
					if($connector && !isset($json_strings[$key]["type"]))
					{
						$json_strings[$key] = array("type" => $connector);
					}
					if(strstr($set,"&") || strstr($set,"="))
					{

						if($format_json) {
							if(strstr($set,"&")) {
								$args = $this->paramsToArray($set);
							} else {
								$args = $this->paramsToArray($set,"\n");
							}
						} else {
							$args = $set;
						}
							

						$json_strings[$key][($field["json"] == "self") ? $field["to"] : $field["json"]] = $args ? $args : '';
					}
					else
					{
						$json_strings[$key][($field["json"] == "self") ? $field["to"] : $field["json"]] = $set ? $set : '';
					}

				}
				if(strstr($set,","))
				{
					$x = explode(",",$set);
					foreach($x as $id)
					{
						$f = $orig_f;
						$object = new $class();
						$object->$f(trim($id));
						$f = "set".sfInflector::camelize($tmp[0]);
						$object->$f(trim($fk));
						$object->save();
					}
					$cont = true;
				}

				if(!$cont)
				{
					$object->$f(trim($set));
				}

			}

			if($cont)
			{
				continue;
			}

			if(substr($tmp[1],0,1) == "$")
			{
				$f = "set".sfInflector::camelize($tmp[0]);
				$object->$f(trim($fk));
			}

			$object->save();

			if(method_exists($object,"getId"))
			{
				$ids[$i]["id"] = $object->getId();
				if(!$json_table && isset($table["attributes"]["json"]))
				{
					$json_table[$i]["id"] = $ids[$i]["id"];
					$json_table[$i]["name"] = $class;
					$json_table[$i]["field"] = $table["attributes"]["json"];
				}
			}

			$i++;
		}
	
		// Handle files..
		
		foreach($session as $sk => $item) {
			if(isset($item["file"])) {
				$j = 1;

				foreach($files as $file_name => $file)
				{
					if($j == $sk-1)
						break;
					$j++;
				}

				if(!$file || empty($file))
				{
					throw new Exception("File cannot be found!");
				}
				
				if(!is_writable($file["attributes"]["to"])) {
					throw new Exception("Upload location: ".$file["attributes"]["to"]." is not writable!");
				}
				
				@chmod($file["attributes"]["to"],0777);
				
				if(isset($file["attributes"]["newname"])) {
					$path = $file["attributes"]["to"]."/".$file["attributes"]["newname"];	
				} else {
					$path = $file["attributes"]["to"]."/".$item["fields"]["file_name"];
				}
		
				if(file_exists($path) && $file["attributes"]["overwrite"] !== "true") { 
					throw new Exception("File ".$path." already exists!");
				} 
				
				if(copy($item["fields"]["file_tmp_name"],$path) === false) {
					throw new Exception("Unable to move uploaded file!");
				} else {
					if(isset($file["attributes"]["json"])) {
						$json_strings['EventResponseModuleSsh'][$file["attributes"]["json"]] = $path;
					}
					unlink($item["fields"]["file_tmp_name"]);
				}
						
			}
			
		}
		
		if(!empty($json_strings))
		{
			foreach($json_strings as $strings)
			{
				$table = array_shift($json_table);
				$object = call_user_func(array($table["name"]."Peer","retrieveByPK"),$table["id"]);
				$f = "set".sfInflector::camelize($table["field"]);
				$object->$f(json_encode($strings));
				$object->save();
			}
		}


		if(!strstr($this->end,"/") && !strstr($this->end,"@"))
		{
			$this->end = "wizard/".$this->end;
		}


		return $this->redirect($this->end);

	}



	public final function executeHeader()
	{
		$parser = new XmlParser($this->mode);
		$this->layout = $parser->getLayout();

	}
	public static function getOrdered()
	{
		return array('set' => 'Yes', 'sequence' => 'No');
	}

	public static function getCondition()
	{
		return array( 'lesser_than' => 'Less Than', 'greater_than' => 'Greater Than' , 'equal_to' => 'Equal To');
	}
	
	
	/*
	 *                        Actions for Rulex (Supressor wizard)
	 */

	public final function executeSupressor1()
	{
		$this->init = true;
		$this->title = "Welcome to the Supressor Rule Wizard!";
		$this->html = "<div style='padding:10px; font-size:13px'>This wizard will help you to create Supressor rule.<br>Please click <b>Next</b> button to begin.</div>";
		$this->current = 1;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();		
	}
	
	public final function executeSupressor2()
	{
		$this->title = "Supressor Rule wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the information about the rule name and the breif comment about the rule being created.</div>";
		$this->current = 2;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();		
	}
	
	public final function executeSupressor3()
	{
		$this->title = "Supressor Rule wizard";
		$this->html = "<div style='padding:10px; font-size:13px'>Please provide the information for event to supress and the attributes related with the selected event.</div>";
		$this->current = 2;
		$this->id = $this->getRequestParameter('id','new');
		if($this->id != 'new') {
			$supressor = RulexSupressorRulePeer::retrieveByPk($this->id);
			$this->forward404Unless($supressor);
			
			$this->event_id = $supressor->getEventId();
			$this->threat_level = $supressor->getThreatLevel() ? $supressor->getThreatLevel() : ''; 
		} else {
			$this->event_id = '';
			$this->threat_level = '';
		}		
		$parser = new XmlParser($this->mode);

		$this->layout = $parser->getLayout();		
	}
	
	public final function executeSupressor4()
	{
		$this->title = "Supressor Rule wizard";
		$this->html = "<div style='padding:20px;'><div style='font-size:20px;margin-bottom:10px;'>Completing Supressor Rule Wizard !</div>The wizard has finished creating supressor rule. Please click the <b>Finish</b> button to complete.</div>";
		$this->current = 4;
		$this->id = $this->getRequestParameter('id','new');
		$parser = new XmlParser($this->mode);

		$this->end = "executeSupressor4";
		$this->layout = $parser->getLayout();
	}
	
}
