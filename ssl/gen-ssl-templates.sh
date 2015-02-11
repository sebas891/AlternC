#!/bin/bash

# this script regenerate the SSL-* templates from the ORIGINAL non-ssl in parent folder
# launch it if you know that some templates has been changed in parent folder.

function convert {
    src=$1
    dst=$2
    cat $src |
    sed -e 's#:80#:443#' \
	-e "s#</VirtualHost>#  SSLEngine On\n  SSLCertificateFile %%CRT%%\n  SSLCertificateKeyFile %%KEY%%\n  %%CHAINLINE%%\n\n</VirtualHost>#i" \
	>$dst
}
for template in panel url vhost
do
    convert "../etc/alternc/templates/apache2/${template}.conf" "templates/${template}-ssl.conf"
done

convert "../roundcube/templates/apache2/roundcube.conf" "templates/roundcube-ssl.conf"
convert "../squirrelmail/templates/apache2/squirrelmail.conf" "templates/squirrelmail-ssl.conf"
