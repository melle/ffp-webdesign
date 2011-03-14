<form method="get" id="searchForm" name="searchForm" action="<?php bloginfo('home'); ?>/">
<div>
	<input type="text" class="suchBox" onblur="this.value='Suchbegriff eingeben...'" onclick="this.value=''" value="<?php 
	if (0 == strlen(get_search_query()))
	{
	    echo "Suchbegriff eingeben...";
	}
	else
	{
	    the_search_query(); 
	}    
	?>" name="s" id="s" />
	<input type="hidden" id="searchsubmit" value="Suche" />
</div>
</form>
