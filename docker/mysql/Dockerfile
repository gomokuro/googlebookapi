FROM mysql/mysql-server:8.0.28

RUN microdnf install yum \
  && yum install -y glibc-langpack-ja glibc-locale-source git

ENV TZ=Asia/Tokyo \
  LANG=ja\_JP.UTF-8

COPY ./docker/mysql/my.cnf /etc/my.cnf
