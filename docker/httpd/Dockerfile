FROM amazonlinux:2

# timezone environment
ENV TZ=Asia/Tokyo \
  # locale
  LANG=ja_JP.UTF-8 \
  LANGUAGE=ja_JP:ja \
  LC_ALL=ja_JP.UTF-8

RUN yum update -y \
 && yum install -y httpd  mod_ssl vim glibc-langpack-ja hostname

RUN amazon-linux-extras install -y epel
RUN amazon-linux-extras install -y php8.1

RUN yum clean metadata
RUN yum install -y php php-mbstring php-gd php-xml php-intl

RUN yum install -y https://dev.mysql.com/get/mysql80-community-release-el7-7.noarch.rpm
RUN yum install -y mysql-community-client

COPY ./docker/httpd/00vhost.conf /etc/httpd/conf.d/00vhost.conf
#RUN sed -ri -e 's!/var/www/html!${/var/www/html/webroot}!g' /etc/httpd/conf/httpd.conf
RUN /usr/libexec/httpd-ssl-gencerts

# composer のインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["apachectl", "-D", "FOREGROUND"]

