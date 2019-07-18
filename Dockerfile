FROM airdb/php71
MAINTAINER Dean dean@airdb.com

ENV PHP_VERSION 7.1
COPY ./ /srv
RUN echo '<?php echo("Hello.\n"); ?>' > /srv/dean.php

COPY config/www.conf /etc/php/7.1/fpm/pool.d/
#RUN sed -i -e 's@;chdir.*@chdir = /srv@g' \
#		   -e '/;php_admin_flag/s/;//' \
#		   -e '/;php_admin_value\[error_log\]/s/;//' \
#		   /etc/php/${PHP_VERSION}/fpm/pool.d/www.conf

RUN sed -i '/php_mysqli/s/;extension=php_mysqli.dll/extension=php_mysqli.so/g' /etc/php/${PHP_VERSION}/fpm/php.ini
