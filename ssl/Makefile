# ----------------------------------------------------------------------
# LICENSE
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License (GPL)
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# To read the license please visit http://www.gnu.org/copyleft/gpl.html
# ----------------------------------------------------------------------
# Purpose of file: Install the files of alternc-ssl packages
# ----------------------------------------------------------------------

install:
	install -m 0644 -g root -o root ssl.sql $(DESTDIR)/usr/share/alternc/install/
	install -m 0755 -g root -o root alternc-ssl.install.php $(DESTDIR)/usr/lib/alternc/install.d/alternc-ssl

# incron
	install -m 0755 -g root -o root ssl_alias_manager.sh $(DESTDIR)/usr/lib/alternc/
	install -m 0644 -g root -o root alternc-ssl.incron.d $(DESTDIR)/etc/incron.d/alternc-ssl

	install -m 0644 -g 1999 -o root panel/class/m_ssl.php $(DESTDIR)/usr/share/alternc/panel/class/
	install -m 0644 -g 1999 -o root panel/admin/*.php $(DESTDIR)/usr/share/alternc/panel/admin/
	install -m 0644 -g 1999 -o root panel/admin/images/* $(DESTDIR)/usr/share/alternc/panel/admin/images/

# FIXME: how can we do that properly ??
#	install -m 0644 -g 1999 -o root panel/admin/styles/* $(DESTDIR)/usr/share/alternc/panel/admin/styles/

	install -m 0644 -g 1999 -o root templates/* $(DESTDIR)/etc/alternc/templates/apache2/
	install -m 0644 -g 1999 -o root ssl.conf $(DESTDIR)/etc/alternc/templates/apache2/mods-available/
	install -m 0644 -g 1999 -o root openssl.cnf $(DESTDIR)/etc/alternc/
	install -m 0755 -g 1999 -o root hosting_vhost-ssl.sh $(DESTDIR)/etc/alternc/functions_hosting/
	ln -s hosting_vhost-ssl.sh $(DESTDIR)/etc/alternc/functions_hosting/hosting_panel-ssl.sh
	ln -s hosting_vhost-ssl.sh $(DESTDIR)/etc/alternc/functions_hosting/hosting_vhost-mixssl.sh
	ln -s hosting_vhost-ssl.sh $(DESTDIR)/etc/alternc/functions_hosting/hosting_roundcube-ssl.sh
	ln -s hosting_vhost-ssl.sh $(DESTDIR)/etc/alternc/functions_hosting/hosting_squirrelmail-ssl.sh
	ln -s hosting_vhost-ssl.sh $(DESTDIR)/etc/alternc/functions_hosting/hosting_php52-ssl.sh
	ln -s hosting_vhost-ssl.sh $(DESTDIR)/etc/alternc/functions_hosting/hosting_php52-mixssl.sh
	
# api
	install -m 0644 -g root -o root api/Ssl.php $(DESTDIR)/usr/share/php/Alternc/Api/Object/
