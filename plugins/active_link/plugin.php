<?php
/**
* Builds an HTML A link with active class when matched
*
* An A link will be created and the current page URL will be searched against
* the $url parameter or the $custom_match permeter if supplied. If either of
* these matches are true the class "active" will be added to link. This is
* useful for providing adding styles to the current active link e.g. if you
* browsing the "About" page you can use the active class to add an underline
* or change the color of the "About" page link in the navigation.
*
* @param string $url URL of the A link
* @param string $name Name of the A link
* @param string $custom_match Custom text to match the current URI against
*
* @return string
*/
function active_link($url, $name, $custom_match = null)
{
	$matches_current_url = ($_SERVER["REQUEST_URI"] == $url ? true : false);

    if ($custom_match) {
        $matches_custom_match = preg_match($custom_match, $_SERVER["REQUEST_URI"]);
    } else {
        $matches_custom_match = null;
    }

    $class = null; 
	if ($matches_current_url || $matches_custom_match)
	{
		$class = ' class="active" ';
	}

	return "<a href=\"$url\"$class>$name</a>";
}