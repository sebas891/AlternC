# Every hour, do ssl actions
33 * * * *	   root		/usr/lib/alternc/update_ssl.php

@reboot	  root	      mkdir -p /var/run/alternc/ssl && chown alterncpanel:alterncpanel /var/run/alternc/ssl 
