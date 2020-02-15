#!/usr/bin/env bash

export DEBIAN_FRONTEND=noninteractive

export LANGUAGE=en_US.UTF-8
export LANG=en_US.UTF-8
export LC_ALL=en_US.UTF-8
locale-gen en_US.UTF-8
dpkg-reconfigure locales

sudo rm /var/lib/apt/lists/lock #to fix problem
sudo apt-get update
sudo apt-get --allow-unauthenticated upgrade -y
apt-get -f install
sudo dpkg --configure -a

# MariaDB repo

# mb xenia, not trusty?
#sudo apt-get install software-properties-common
#sudo apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xF1656F24C74CD1D8
#sudo add-apt-repository 'deb [arch=amd64,i386] http://mirrors.hustunique.com/mariadb/repo/10.1/ubuntu xenial main'

sudo apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xcbcb082a1bb943db
sudo add-apt-repository 'deb [arch=amd64,i386] http://lon1.mirrors.digitalocean.com/mariadb/repo/10.1/ubuntu trusty main'
cat << 'EOF' > /tmp/mariadb.pref
Package: *
Pin: origin lon1.mirrors.digitalocean.com
Pin-Priority: 1000
EOF
sudo mv /tmp/mariadb.pref /etc/apt/preferences.d/mariadb.pref

# PHP 7 repo

sudo add-apt-repository -y ppa:ondrej/php

# PHP libs

sudo apt-get update
sudo apt-get install -y -q nginx --force-yes
sudo apt-get install -y -q php7.1-fpm --force-yes
sudo apt-get install -y -q php7.1-mysql --force-yes
sudo apt-get install -y -q php7.1-mbstring --force-yes
sudo apt-get install -y -q php7.1-simplexml --force-yes # composer dependency
sudo apt-get install -y -q php7.1-curl --force-yes      # composer dependency
sudo apt-get install -y -q php7.1-zip --force-yes       # composer dependency
sudo apt-get install -y -q php7.1-dom --force-yes

# Nginx

sudo rm /etc/nginx/sites-available/default
sudo touch /etc/nginx/sites-available/default
cat << 'EOF' > /tmp/default
server {
  listen 80;
  root /vagrant;
  index index.php index.html index.htm;
  # Make site accessible from any domain
  server_name _;
  location / {
    # First attempt to serve request as file, then
    # as directory, then fall back to index.html
    try_files $uri $uri/ /index.html;
  }
  location /doc/ {
    alias /usr/share/doc/;
    autoindex on;
    allow 127.0.0.1;
    deny all;
  }
  # redirect server error pages to the static page /50x.html
  #
  error_page 500 502 503 504 /50x.html;
  location = /50x.html {
    root /usr/share/nginx/html;
  }
  # pass the PHP scripts to FastCGI server listening on /tmp/php5-fpm.sock
  #
  location ~ \.php$ {
    try_files $uri =404;
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
    fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
    fastcgi_index index.php;
    include fastcgi_params;
  }
  ### phpMyAdmin ###
  location /phpmyadmin {
    root /usr/share/;
    index index.php index.html index.htm;
    location ~ ^/phpmyadmin/(.+\.php)$ {
      client_max_body_size 4M;
      client_body_buffer_size 128k;
      try_files $uri =404;
      root /usr/share/;
      # Point it to the fpm socket;
      fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
      fastcgi_index index.php;
      fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
      include /etc/nginx/fastcgi_params;
    }
    location ~* ^/phpmyadmin/(.+\.(jpg|jpeg|gif|css|png|js|ico|html|xml|txt)) {
      root /usr/share/;
    }
  }
  location /phpMyAdmin {
    rewrite ^/* /phpmyadmin last;
  }
  ### phpMyAdmin ###
}
EOF
sudo mv /tmp/default /etc/nginx/sites-available/default
sudo service nginx restart
sudo service php7.0-fpm restart

# MYSQL

sudo debconf-set-selections <<< 'mariadb-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mariadb-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get -f install
sudo apt-get install -y -q mariadb-server --force-yes
mysql -uroot -prootpass -e "SET PASSWORD = PASSWORD('');"

# Install composer

sudo apt-get install -y -q curl git --force-yes
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
sudo composer config --global github-oauth.github.com c78030c7e59d78acdc6d07cf8282d36722479e49
