FROM airdb/php71-ubuntu
MAINTAINER Dean dean@airdb.com

COPY ./ /srv
RUN echo '<?php echo("Hello.\n"); ?>' > /srv/dean.php
RUN sed -i -e 's@;chdir.*@chdir = /srv@g' \
		   -e '/;php_admin_flag/s/;//' \
		   -e '/;php_admin_value\[error_log\]/s/;//' \
		   /etc/php/7.1/fpm/pool.d/www.conf
