#!/usr/bin/php
<?php
/*
 function called as a hook during alternc update_domains.sh as follow: 
 create a host:    launch_hooks "create" "$1" "$2" "$3" "$4" (type domain mail value)
 at the end of host creation:    launch_hooks "postinst" "$1" "$2" "$3" "$4" 
 enable or disable a sot:    launch_hooks "enable|disable" "$1" "$2" "$3" (type domain value)
 at host deletion: launch_hooks "delete" "$1" "$2" "$3" "$4" (type fqdn)

 also, after reloading apache : 
  run-parts --arg=web_reload /usr/lib/alternc/reload.d
 
 also, dns functions are: 
 after reconfiguring bind (rndc reconfig) : run-parts --arg=dns_reconfig  /usr/lib/alternc/reload.d
 (may need to *redo* rndc reconfig... a "before_dns_reconfig" would be better !)
 before reloading a zone : run-parts --arg=dns_reload_zone --arg="$domain" /usr/lib/alternc/reload.d
*/


// Bootstraps 
require_once("/usr/share/alternc/panel/class/config_nochk.php");


