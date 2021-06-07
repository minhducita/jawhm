<?php

/*************************************************************

 Simple site crawler to create a search engine XML Sitemap.
 Version: 2.1
 License: GPL v2
 Free to use, without any warranty.
 Written by Elmar Hanlhofer https://www.plop.at

 ChangeLog:
 ----------
 Version 2.1 2016/10/07 by Elmar Hanlhofer
 
     * strpos fix (swap arguments) for first anchor - by William
     * First anchor check optimized - by Elmar Hanlhofer

 Version 2.0 2016/08/11 by Elmar Hanlhofer
 
     * Most program parts rewritten
     * Using quotes on define command
     * Supporting single and double quotes in href
     * Notices disabled

 Version 1.0 2015/10/14 by Elmar Hanlhofer
 
     * CLI / Website mode added
     * Multiple extension support added
     * Support for quoted URLs with spaces added
     * Skip mailto links
     * Converting special chars in the URLs for the XML file
     * Added user agent
     * Minor code updates

 Version 0.2 2013/01/16  

     * curl support - by Emanuel Ulses
     * write url, then scan url - by Elmar Hanlhofer

 Version 0.1 2012/02/01 by Elmar Hanlhofer

     * Initital release

*************************************************************/

    


    // Set true or false to define how the script is used.
    // true:  As CLI script.
    // false: As Website script.
    define ("CLI", false);

    // When your web server does not send the Content-Type header, then set
    // this to 'true'. But I don't suggest this.
    define ("IGNORE_EMPTY_CONTENT_TYPE", true);


/*************************************************************
    End of user defined settings.
*************************************************************/


function GetListId ()
{
    //$mem_id = @$_SESSION['mem_id'];
	//$mem_name = @$_SESSION['mem_name'];
	//$mem_level = @$_SESSION['mem_level'];
	
	//if ($mem_id <> '')
	{
		try {
			$ini = parse_ini_file( BASE_PATH . '/components/pdo_qa.ini', FALSE);
			$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->query('SET CHARACTER SET utf8');
			$stt = $db->prepare('SELECT id, slug FROM category WHERE status = "1" ');
			//$stt->bindValue(':id', $mem_id);
			$stt->execute();
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				
				$id[] = $row['slug'];
				
			}
			$db = NULL;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		
		return $id;
		
	}
}

function GetQuotedUrl ($str)
{
    $quote = substr ($str, 0, 1);
    if (($quote != "\"") && ($quote != "'")) // Only process a string 
    {                                        // starting with singe or
        return $str;                         // double quotes
    }                                                 

    $ret = "";
    $len = strlen ($str);    
    for ($i = 1; $i < $len; $i++) // Start with 1 to skip first quote
    {
        $ch = substr ($str, $i, 1);
        
        if ($ch == $quote) break; // End quote reached

        $ret .= $ch;
    }
    
    return $ret;
}

function GetHREFValue ($anchor)
{
    $split1  = explode ("href=", $anchor);
    $split2 = explode (">", $split1[1]);
    $href_string = $split2[0];

    $first_ch = substr ($href_string, 0, 1);
    if ($first_ch == "\"" || $first_ch == "'")
    {
        $url = GetQuotedUrl ($href_string);
    }
    else
    {
        $spaces_split = explode (" ", $href_string);
        $url          = $spaces_split[0];
    }
    return $url;
}

function GetEffectiveURL ($url)
{
    // Create a curl handle
    $ch = curl_init ($url);

    // Send HTTP request and follow redirections
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_USERAGENT, AGENT);
    curl_exec($ch);

    // Get the last effective URL
    $effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    // ie. "http://example.com/show_location.php?loc=M%C3%BCnchen"

    // Decode the URL, uncoment it an use the variable if needed
    // $effective_url_decoded = curl_unescape($ch, $effective_url);
    // "http://example.com/show_location.php?loc=München"

    // Close the handle
    curl_close($ch);

    return $effective_url;
}

function ValidateURL ($url_base, $url)
{
    global $scanned;
        
    $parsed_url = parse_url ($url);
        
    $scheme = $parsed_url["scheme"];
        
    // Skip URL if different scheme or not relative URL (skips also mailto)
    if (($scheme != SITE_SCHEME) && ($scheme != "")) return false;
        
    $host = $parsed_url["host"];
                
    // Skip URL if different host
    if (($host != SITE_HOST) && ($host != "")) return false;
    

    if ($host == "")    // Handle URLs without host value
    {
        if (substr ($url, 0, 1) == '#') // Handle page anchor
        {
            echo "Skip page anchor: $url" . NL;
            return false;
        }
    
        if (substr ($url, 0, 1) == '/') // Handle absolute URL
        {
            $url = SITE_SCHEME . "://" . SITE_HOST . $url;
        }
        else // Handle relative URL
        {
        
            $path = parse_url ($url_base, PHP_URL_PATH);
            
            if (substr ($path, -1) == '/') // URL is a directory
            {
                // Construct full URL
                $url = SITE_SCHEME . "://" . SITE_HOST . $path . $url;
            }
            else // URL is a file
            {
                $dirname = dirname ($path);

                // Add slashes if needed
                if ($dirname[0] != '/')
                {
                    $dirname = "/$dirname";
                }
    
                if (substr ($dirname, -1) != '/')
                {
                    $dirname = "$dirname/";
                }

                // Construct full URL
                $url = SITE_SCHEME . "://" . SITE_HOST . $dirname . $url;
            }
        }
    }

    // Get effective URL, follow redirected URL
    $url = GetEffectiveURL ($url); 

    // Don't scan when already scanned    
    if (in_array ($url, $scanned)) return false;
    
    return $url;
}

// Skip URLs from the $skip_url array
function SkipURL ($url)
{
    global $skip_url;

    if (isset ($skip_url))
    {
        foreach ($skip_url as $v)
        {           
            if (substr ($url, 0, strlen ($v)) == $v) return true; // Skip this URL
        }
    }

    return false;            
}

function initXml()
{
	$init = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" .
                 "<!-- Created by Minh Quyen - JAWHMvn -->\n" .
                 "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n" .
                 "        xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n" .
                 "        xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\n" .
                 "        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n" .
                 "  <url>\n" .
                 "    <loc>" . SITE . "/</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n" .
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_aus.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_kor.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_uk.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_ywn.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_pol.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_nz.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_fra.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_ire.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_hkg.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_prt.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_can.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_deu.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_dnk.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_nor.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n" .
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_svk.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n".
				 "  <url>\n" .
                 "    <loc>" . SITE . "/qa_aut.html</loc>\n" .
                 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                 "  </url>\n";
				 
	return $init;
}

function Scan ($url)
{
    global $scanned, $pf;

    $scanned[] = $url;  // Add to URL to scanned array

	$data = initXml();
	
	$pf = fopen (OUTPUT_FILE, "w");
    if (!$pf)
    {
        echo "Cannot create " . OUTPUT_FILE . "!" . NL;
        return;
    }
    //fwrite ($pf, );
	
	
	
    //echo SITE; exit;
    $listId = GetListId ();
    if ( count($listId) === 0) return true;  // Return on empty page
    
	// FOR PC LINK
    foreach ($listId as $id)
    {
        $id = trim ($id);
        
        $next_url = SITE.'/qa/category/'.$id;
		//if(SkipURL ($next_url)) continue;
		
		// Add URL to sitemap
		$data .= " <url>\n" .
				"    <loc>" . $next_url ."</loc>\n" .
				"    <changefreq>" . FREQUENCY . "</changefreq>\n" .
				"    <priority>" . PRIORITY . "</priority>\n" .
				"  </url>\n";
		/*
		fwrite ($pf, "  <url>\n" .
					 "    <loc>" . htmlentities ($next_url) ."</loc>\n" .
					 "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
					 "    <priority>" . PRIORITY . "</priority>\n" .
					 "  </url>\n"); 
        */
    }
	
	$data .= "</urlset>\n";
	
	fwrite($pf, $data);
	fclose ($pf);
	
    return true;
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}


    // Program start
    define ("VERSION", "2.1");                                            
    define ("AGENT", "Mozilla/5.0 (compatible; Plop PHP XML Sitemap Generator/" . VERSION . ")");
    define ("NL", CLI ? "\n" : "<br>");
    define ("SITE_SCHEME", parse_url (SITE, PHP_URL_SCHEME));
    define ("SITE_HOST"  , parse_url (SITE, PHP_URL_HOST));

    error_reporting (E_ERROR | E_WARNING | E_PARSE);

    
    $scanned = array();
    Scan (GetEffectiveURL (SITE));
    
    //fwrite ($pf, "</urlset>\n");
	
	Redirect( SITE . "/qa/sitemap.xml");
?>
