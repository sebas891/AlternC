#!/bin/bash

# Launched by incron when /tmp/generate_certif_alias exists
# regenerate the list of global aliases used by Comodo for certificate ownership validation
APACHECONF=/etc/apache2/conf.d/alternc-ssl_cert-alias.conf
TMP=/tmp/alternc-ssl_cert-alias_${$}.tmp
FILEDIR=/var/lib/alternc/ssl-cert-alias


rm -f "$TMP"
mkdir -p "$FILEDIR"

mysql --defaults-file=/etc/alternc/.my.cnf --skip-column-names -B -e "SELECT name,value FROM certif_alias;" | while read name value
do
    echo "alias $name ${FILEDIR}${name}" >>$TMP
    echo "$value" >"${FILEDIR}${name}"
done
mv -f "$TMP" "$APACHECONF"

service apache2 reload

