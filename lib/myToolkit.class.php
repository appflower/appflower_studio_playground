<?php
/**
 * custom toolkit
 *
 * @author radu
 */
class myToolkit{
	/**
     * Internal function which determines the remote IP address.
     * If Propel objects are changed via a CLI script (batch) the local
     * loopback address will be returned.
     *
     * @return string
     */
    public static function getIP()
    {
        $ip = false; // No IP found

        /**
         * User is behind a proxy and check that we discard RFC1918 IP addresses.
         * If these address are behind a proxy then only figure out which IP belongs
         * to the user.
         */
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']); // Put the IP's into an array which we shall work with.
            $no = count($ips);
            for ($i = 0 ; $i < $no ; $i++) {

                /**
                 * Skip RFC 1918 IP's 10.0.0.0/8, 172.16.0.0/12 and
                 * 192.168.0.0/16
                 */
                if (!eregi('^(10|172\.16|192\.168)\.', $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                } // End if

            } // End for

        } // End if
        return ($ip ? $ip : isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1'); // Return with the found IP, the remote address or the local loopback address

    } // End function
    
    /**
     * strip odds chars from a text, the text will be available for url
     *
     * @param string $text
     * @return string
     * @author radu
     */
    public static function stripText($text)
	{
		$text = strtolower($text);
		
		// strip all non word chars
		$text = preg_replace('/\W/', ' ', $text);
		
		// replace all white space sections with a dash
		$text = preg_replace('/\ +/', '-', $text);
		
		// trim dashes
		$text = preg_replace('/\-$/', '', $text);
		$text = preg_replace('/^\-/', '', $text);
		
		return $text;
	}
	
	/**
	 * download a given file from an action
	 *
	 * @param string $file
	 * @param file $output_name
	 * @author radu
	 */
	public static function downloadFile($file,$output_name='file'){

	   //First, see if the file exists
	   if (!is_file($file)) { return false ; }
	
	   //Scoatem informatii despre fisier
	   $len = filesize($file);
	   $filename = basename($file);
	   $file_extension = strtolower(substr(strrchr($filename,"."),1));
	   $filename=$output_name.'.'.$file_extension;
	   $isImage = false;
	   //Setam Content-Type-urile pentru  fisierul in cauza
	   switch( $file_extension ) {
	     case "pdf": $ctype="application/pdf"; break;
	     //case "zip": $ctype="application/zip"; break;
	     case "doc": $ctype="application/msword"; break;
	     //case "xls": $ctype="application/vnd.ms-excel"; break;     
         case "png": $ctype="image/png"; $isImage = true; break;
         case "jpg": $ctype="image/jpg"; $isImage = true; break;
         case "jpeg": $ctype="image/jpeg"; $isImage = true; break;
         case "gif": $ctype="image/gif"; $isImage = true; break;
	     default: $ctype="application/force-download";
	   }
	
	   //Scriem headerele
	   header("Pragma: public");
	   header("Expires: 0");
	   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	   header("Cache-Control: public");
	   
       //Folosim Content-Type-ul din switch
	   header("Content-Type: $ctype");
       
       if ($isImage) {
         print file_get_contents($file);
         die;
       }
       
	   //Fortam downloadul
	   $header="Content-Disposition: attachment; filename=".$filename.";";
	   header($header);
	   header("Content-Description: File Transfer");       
       header("Content-Transfer-Encoding: binary");
	   header("Content-Length: ".$len);
	   @readfile($file);
	   exit;
	}
	
	public static function generateRandomColor()
	{
		return '#'.dechex(rand(0,15)) . dechex(rand(0,15)) . dechex(rand(0,15)) . dechex(rand(0,15)) . dechex(rand(0,15)) . dechex(rand(0,15));
	}
	
	/**
	 * load signatures to db
	 */
	public static function xml_entity_decode($string) {
	  return str_replace (
	    array ( '&amp;' , '&quot;', '&apos;' , '&lt;' , '&gt;', '&apos;' ),
	    array ( '&', '"', "'", '<', '>', '\xef\xbf\xbd' ),
	    $string
	  );
	}
	
	public static function traverse($tree, $prefix='') {
	       echo $prefix.'element: '.$tree->tagName."\n";
	       foreach ($tree->childNodes as $node) {
	               if (!($node instanceof DOMElement)) {
	                       continue;
	               }
	               self::traverse($node, '    '.$prefix);
	       }
	}
	
	public static function signatures2db($xml_file,$customer_id)
	{	
		// Create XML DOM document and load XML file.
		$xml = new DOMDocument();
		$xml->load($xml_file);
				
		// Start by parsing all log signatures.
		$xml_logs = $xml->getElementsByTagName('log_signature');
		
		// Parse all log signatures.
		foreach ($xml_logs as $xml_log) {
		  // Use existing object from db if community_id exists, else create an new.
		  $community_ids = $xml_log->getElementsByTagName('community_id');
		  $community_id  = $community_ids->item(0)->nodeValue;
		
		  if($community_id!='') {
		  			  	
		    // Load the XML data into memory.
		    // Event details
		    $publisher_ids      = $xml_log->getElementsByTagName('publisher');
		   	$publisher_id       = $publisher_ids->item(0)->nodeValue;
		    $names              = $xml_log->getElementsByTagName('name');
		    $name               = myToolkit::xml_entity_decode($names->item(0)->nodeValue);
		    $source_names       = $xml_log->getElementsByTagName('source_name');
		    $source_name        = myToolkit::xml_entity_decode($source_names->item(0)->nodeValue);
		    $source_type_ids    = $xml_log->getElementsByTagName('source_type_id');
		    $source_type_id     = $source_type_ids->item(0)->nodeValue;
		    $category_names     = $xml_log->getElementsByTagName('category_name');
		    $category_name      = myToolkit::xml_entity_decode($category_names->item(0)->nodeValue);
		    $category_group_ids = $xml_log->getElementsByTagName('category_group_id');
		    $category_group_id  = $category_group_ids->item(0)->nodeValue;
		    $confidentiality_ids= $xml_log->getElementsByTagName('confidentiality_id');
		    $confidentiality_id = $confidentiality_ids->item(0)->nodeValue;
		    $integrity_ids      = $xml_log->getElementsByTagName('integrity_id');
		    $integrity_id       = $integrity_ids->item(0)->nodeValue;
		    $availability_ids   = $xml_log->getElementsByTagName('availability_id');
		    $availability_id    = $availability_ids->item(0)->nodeValue;
		    $comments           = $xml_log->getElementsByTagName('comment');
		    $comment            = myToolkit::xml_entity_decode($comments->item(0)->nodeValue);
		    $xrefs              = $xml_log->getElementsByTagName('xref');
		    $xref               = myToolkit::xml_entity_decode($xrefs->item(0)->nodeValue);
		
		    // Log Signature details
		    $patterns       = $xml_log->getElementsByTagName('pattern');
		    if($patterns->item(0)) { $pattern = myToolkit::xml_entity_decode($patterns->item(0)->nodeValue); } else { $pattern = ''; }
		    $reporting_ips  = $xml_log->getElementsByTagName('reporting_ip');
		    if($reporting_ips->item(0)) { $reporting_ip = myToolkit::xml_entity_decode($reporting_ips->item(0)->nodeValue); } else { $reporting_ip = ''; }
		    $attacking_ips  = $xml_log->getElementsByTagName('attacking_ip');
		    if($attacking_ips->item(0)) { $attacking_ip = myToolkit::xml_entity_decode($attacking_ips->item(0)->nodeValue); } else { $attacking_ip = '';}
		    $services       = $xml_log->getElementsByTagName('service');
		    if($services->item(0)) { $service = myToolkit::xml_entity_decode($services->item(0)->nodeValue); } else { $service = ''; }
		    $usernames      = $xml_log->getElementsByTagName('username');
		    if($usernames->item(0)) { $username = myToolkit::xml_entity_decode($usernames->item(0)->nodeValue); } else { $username = ''; }
		    $messages       = $xml_log->getElementsByTagName('message');
		    if($messages->item(0)) { $message = myToolkit::xml_entity_decode($messages->item(0)->nodeValue); } else { $message = ''; }
		    $log_samples    = $xml_log->getElementsByTagName('log_sample');
		    if($log_samples->item(0)) { $xml_log_sample = myToolkit::xml_entity_decode($log_samples->item(0)->nodeValue); } else { $xml_log_sample = ''; }
		
		    // Skip to next signature, if signature isnt complete.
		    if((strlen($pattern) < 1) or (strlen($name) < 1) or (strlen($source_name) < 1)) {
		      continue;
		    }
		
		    // Select the Event with the found CommunityId.
			$c = new Criteria();
			$c->add(EventInfoPeer::ID, $community_id);
		    $event = EventInfoPeer::doSelectOne($c);
		
		    // If no match, create a new object.
		    if(!$event) {
		      $event = new EventInfo();
		
		      // We want to assign an id.
		      $event->setName('');
		      $event->save(); 
		    }
		
		    $event->setCustomerId($customer_id);
		    $event->setApprovedForShare(false);		    
		
		    // Select the Log Signature corresponding to the event.
		    $c = new Criteria();
		    $c->add(LogSignaturePeer::EVENT_INFO_ID, $event->getId());
		    $log = LogSignaturePeer::doSelectOne($c);
		
		    // If no match, create a new object.
		    if(!$log) {
		      $log  = new LogSignature();
		
		      // We want to assign an id.
		      $log->setMPattern('');
		      $log->save();
		    }
		
		    // Select the Log Sample corresponding to the log signature.
		    $c = new Criteria();
		    $c->add(LogSamplePeer::ID, $log->getLogSampleId());
		    $log_sample = LogSignaturePeer::doSelectOne($c);
		
		    // If no match, create a new object.
		    if(!$log_sample) {
		      $log_sample  = new LogSample();
		    }
		
		    // Save event details.
		   	$event->setVendorId(0);
		    $event->setPublisherId($publisher_id);
		    $event->setName($name);
		    $event->setConfidentialityId($confidentiality_id);
		    $event->setIntegrityId($integrity_id);
		    $event->setAvailabilityId($availability_id);
		    $event->setComment($comment);
		    $event->setXref($xref);
		    
		    // Find the source name, else create it.
		    if($source_name) {
		      $c = new Criteria();
		      $c->add(EventSourceNamePeer::NAME, $source_name);
		      $db_source_name = EventSourceNamePeer::doSelectOne($c);
		
		      if(!$db_source_name) {
		        $db_source_name = new EventSourceName();
		        $db_source_name->setName($source_name);
		        $db_source_name->setSourceTypeId($source_type_id);
		        $db_source_name->save();
		      }
		      
		      $event->setSourceNameId($db_source_name->getId());
		    }    
		
		    // Find the event category, else create it.
		    if($category_name) {
		      $c = new Criteria();
		      $c->add(EventCategoryPeer::NAME, $category_name);
		      $db_event_category = EventCategoryPeer::doSelectOne($c);
		
		      if(!$db_event_category) {
		        $db_event_category = new EventCategory();
		        $db_event_category->setName($category_name);
		        $db_event_category->setPublisherId($publisher_id);
		        $db_event_category->setGroupId($category_group_id);
		        $db_event_category->save();
		      }
		      
		      $event->setCategoryId($db_event_category->getId());
		    }
		    
		    $event->save();
		    
		    // Save the log sample.
		    // $log_sample->setMessage($xml_log_sample);
		    $log_sample->save();
		    
		    // Save log signature details.
		    $log->setEventInfoId($event->getId());
		    $log->setMPattern($pattern);
		    $log->setAttackingIp($attacking_ip);
		    $log->setService($service);
		    $log->setUsername($username);
		    $log->setDataField($message);
		    $log->setLogSampleId($log_sample->getId());
		    
		    $log->save();
		  
		    //print "Updating (LOG) signature ".$event->getId()." source_name: $source_name\n";
		  }
		
		  // Cleanup scope.
		  $db_source_name = '';
		  $db_event_category = '';
		  $publisher_id = '';
		  $name = '';
		  $source_name = '';
		  $source_names = '';
		  $category_name = '';
		  $confidentiality_id = '';
		  $availability_id = '';
		  $integrity_id = '';
		  $comment = '';
		  $xref = '';
		  
		  unset($event);
		  unset($log);
		  unset($log_sample);
		}
		
		
		
		
		// Start by parsing all log firewall signatures.
		$xml_logs = $xml->getElementsByTagName('log_fw_signature');
		
		// Parse all log signatures.
		foreach ($xml_logs as $xml_log) {
		  // Use existing object from db if community_id exists, else create an new.
		  $community_ids = $xml_log->getElementsByTagName('community_id');
		  $community_id  = $community_ids->item(0)->nodeValue;
		
		  if($community_id!='') {
		    // Load the XML data into memory.
		    // Event details
		    $publisher_ids      = $xml_log->getElementsByTagName('publisher');
		   	$publisher_id       = $publisher_ids->item(0)->nodeValue;
		   	$names              = $xml_log->getElementsByTagName('name');
		    $name               = myToolkit::xml_entity_decode($names->item(0)->nodeValue);
		    $source_names       = $xml_log->getElementsByTagName('source_name');
		    $source_name        = myToolkit::xml_entity_decode($source_names->item(0)->nodeValue);
		    $source_type_ids    = $xml_log->getElementsByTagName('source_type_id');
		    $source_type_id     = $source_type_ids->item(0)->nodeValue;
		    $comments           = $xml_log->getElementsByTagName('comment');
		    $comment            = myToolkit::xml_entity_decode($comments->item(0)->nodeValue);
		    $xrefs              = $xml_log->getElementsByTagName('xref');
		    $xref               = myToolkit::xml_entity_decode($xrefs->item(0)->nodeValue);
		
		    // Log Signature details
		    $patterns       = $xml_log->getElementsByTagName('pattern');
		    if($patterns->item(0)) { $pattern = myToolkit::xml_entity_decode($patterns->item(0)->nodeValue); } else { $pattern = ''; }
		    $fw_policies    = $xml_log->getElementsByTagName('fw_policy');
		    if($fw_policies->item(0)) { $fw_policy = $fw_policies->item(0)->nodeValue; } else { $fw_policy = ''; }
		    $fw_interfaces  = $xml_log->getElementsByTagName('fw_interface');
		    if($fw_interfaces->item(0)) { $fw_interface = myToolkit::xml_entity_decode($fw_interfaces->item(0)->nodeValue); } else { $fw_interface = '';}
		    $fw_source_ips  = $xml_log->getElementsByTagName('fw_source_ip');
		    if($fw_source_ips->item(0)) { $fw_source_ip = myToolkit::xml_entity_decode($fw_source_ips->item(0)->nodeValue); } else { $fw_source_ip = ''; }
		    $fw_destination_ips   = $xml_log->getElementsByTagName('fw_destination_ip');
		    if($fw_destination_ips->item(0)) { $fw_destination_ip = myToolkit::xml_entity_decode($fw_destination_ips->item(0)->nodeValue); } else { $fw_destination_ip = ''; }
		    $fw_destination_ports = $xml_log->getElementsByTagName('fw_destination_port');
		    if($fw_destination_ports->item(0)) { $fw_destination_port = myToolkit::xml_entity_decode($fw_destination_ports->item(0)->nodeValue); } else { $fw_destination_port = ''; }
		    $fw_ip_protocols= $xml_log->getElementsByTagName('fw_ip_protocol');
		    if($fw_ip_protocols->item(0)) { $fw_ip_protocol = myToolkit::xml_entity_decode($fw_ip_protocols->item(0)->nodeValue); } else { $fw_ip_protocol = ''; }
		    $log_samples    = $xml_log->getElementsByTagName('log_sample');
		    if($log_samples->item(0)) { $xml_log_sample = myToolkit::xml_entity_decode($log_samples->item(0)->nodeValue); } else { $xml_log_sample = ''; }
		
		    // Skip to next signature, if signature isnt complete.
		    if((strlen($pattern) < 1) or (strlen($name) < 1) or (strlen($source_name) < 1)) {
		      continue;
		    }
		
		    // Select the Event with the found CommunityId.
			$c = new Criteria();
			$c->add(EventInfoPeer::ID, $community_id);
		    $event = EventInfoPeer::doSelectOne($c);
		
		    // If no match, create a new object.
		    if(!$event) {
		      $event = new EventInfo();
		
		      // We want to assign an id.
		      $event->setName('');
		      $event->save(); 
		    }
		
		    $event->setCustomerId($customer_id);
		    $event->setApprovedForShare(false);
		
		    // Select the Log Firewall Signature corresponding to the event.
		    $c = new Criteria();
		    $c->add(LogFirewallSignaturePeer::EVENT_INFO_ID, $event->getId());
		    $log = LogFirewallSignaturePeer::doSelectOne($c);
		
		    // If no match, create a new object.
		    if(!$log) {
		      $log  = new LogFirewallSignature();
		
		      // We want to assign an id.
		      $log->setMPattern('');
		      $log->save();
		    }
		
		    // Select the Log Sample corresponding to the log signature.
		    $c = new Criteria();
		    $c->add(LogSamplePeer::ID, $log->getLogSampleId());
		    $log_sample = LogSignaturePeer::doSelectOne($c);
		
		    // If no match, create a new object.
		    if(!$log_sample) {
		      $log_sample  = new LogSample();
		    }
		
		    // Save event details.
		     // Save event details.
		    $event->setVendorId(0);
		    $event->setPublisherId($publisher_id);
		    $event->setName($name);
		    $event->setComment($comment);
		    $event->setXref($xref);
		    
		    // Find the source name, else create it.
		    if($source_name) {
		      $c = new Criteria();
		      $c->add(EventSourceNamePeer::NAME, $source_name);
		      $db_source_name = EventSourceNamePeer::doSelectOne($c);
		
		      if(!$db_source_name) {
		        $db_source_name = new EventSourceName();
		        $db_source_name->setName($source_name);
		        $db_source_name->setSourceTypeId($source_type_id);
		        $db_source_name->save();
		      }
		      
		      $event->setSourceNameId($db_source_name->getId());
		    }    
		
		    $event->save();
		    
		    // Save the log sample.
		    // $log_sample->setMessage($xml_log_sample);
		    $log_sample->save();
		    
		    // Save log signature details.
		    $log->setEventInfoId($event->getId());
		    $log->setMPattern($pattern);
		    $log->setFirewallStateId($fw_policy);
		    $log->setFirewallInterface($fw_interface);
		    $log->setSourceIp($fw_source_ip);
		    $log->setDestinationIp($fw_destination_ip);
		    $log->setDestinationPort($fw_destination_port);
		    $log->setIpProtocol($fw_ip_protocol);
		    $log->setLogSampleId($log_sample->getId());
		    
		    $log->save();
		  
		    //print "Updating (FW) signature ".$event->getId()." source_name: $source_name and pattern: $pattern\n";
		  }
		
		  // Cleanup scope.
		  $db_source_name = '';
		  $publisher_id = '';
		  $name = '';
		  $source_name = '';
		  $source_names = '';
		  $category_name = '';
		  $integrity_id = '';
		  $comment = '';
		  $xref = '';
		  
		  unset($event);
		  unset($log);
		  unset($log_sample);
		}
	}
}

?>