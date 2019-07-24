FROM airdb/php71
MAINTAINER Dean dean@airdb.com

RUN apt-get install -y python-pip nginx \
	&& pip install -U coscmd

ENV PHP_VERSION 7.1
COPY ./ /srv
COPY config/nginx.conf /etc/nginx/
RUN chown -R www-data.www-data /srv/data
RUN echo '<?php echo("Hello.\n"); ?>' > /srv/dean.php

COPY config/www.conf /etc/php/7.1/fpm/pool.d/
#RUN sed -i -e 's@;chdir.*@chdir = /srv@g' \
#		   -e '/;php_admin_flag/s/;//' \
#		   -e '/;php_admin_value\[error_log\]/s/;//' \
#		   /etc/php/${PHP_VERSION}/fpm/pool.d/www.conf

RUN sed -i '/php_mysqli/s/;extension=php_mysqli.dll/extension=php_mysqli.so/g' /etc/php/${PHP_VERSION}/fpm/php.ini


# RUN coscmd config  -a $AK -s $SK -r $AZ -b $BUCKET
#RUN mkdir -p /var/www \
#	&& chown www-data.www-data /var/www/ \
#	&& cp /root/.cos.conf /var/www/
