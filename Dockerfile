FROM airdb/php71-ubuntu
MAINTAINER Dean dean@airdb.com

RUN echo '<?php echo("Hello.\n"); ?>' > /srv/index.php
COPY ./ /srv
RUN sed -i 's@;chdir.*@chdir = /srv@g' /etc/php/7.1/fpm/pool.d/www.conf
