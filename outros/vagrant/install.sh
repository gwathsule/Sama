#!/usr/bin/env bash

echo -e "\n\t--- Good morning, master. Let's get to work. Installing now. ---\n"

echo -e "\n\t--- Updating packages list ---\n"
sudo apt-get update

echo -e "\n\t--- Installing base packages ---\n"
sudo apt-get install -y vim curl python-software-properties

echo -e "\n\t--- We want the bleeding edge of PHP, right master? ---\n"
sudo add-apt-repository -y ppa:ondrej/php

echo -e "\n\t--- Add repository the Git new releases ---\n"
sudo add-apt-repository -y ppa:git-core/ppa

echo -e "\n\t--- Installing Git ---\n"
sudo apt-get install -y git

#+============================================+
#|             Packages Server WEB            |
#+============================================+

echo -e "\n\t--- Updating packages list ---\n"
sudo apt-get update

echo -e "\n\t--- Installing MySQL package ---\n"
# No Prompt:
export DEBIAN_FRONTEND="noninteractive"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"
sudo apt-get install -y mysql-server

echo -e "\n\t--- Installing Apache2 package ---\n"
sudo apt-get install -y apache2

echo -e "\n\t--- Installing PHP-specific packages ---\n"
sudo apt-get install -y php7.1 php7.1-fpm libapache2-mod-php7.1 php7.1-curl php7.1-gd php7.1-mcrypt php7.1-xml php7.1-soap php7.1-zip php7.1-mysql git-core

echo -e "\n\t--- Installing Composer. ---\n"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

echo -e "\n\t--- Installing and configuring Xdebug ---\n"
# sudo apt-get install -y php5-xdebug
# cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
# xdebug.scream=1
# xdebug.cli_color=1
# xdebug.show_local_vars=1
# EOF
echo -e "\n\t--- Xdebug NOT configured yet! ---\n"

echo -e "\n\t--- Clean instalation apt-get ---\n"
apt-get --purge autoremove -y

echo -e "\n\t--- Enabling mod-rewrite ---\n"
sudo a2enmod rewrite
echo -e "\n\t--- Enabling PHP mcrypt ---\n"
sudo phpenmod mcrypt

echo -e "\n\t--- Setting document root ---\n"
sudo rm -rf /var/www/html/*
sudo mkdir -p /var/www/html/
sudo ln -fs /vagrant/ /var/www/html/

echo -e "\n\t--- Enable reporting/display errors PHP ---\n"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php/7.1/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php/7.1/apache2/php.ini

sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

echo -e "\n\t--- Configuring Command 'vhost' VirtualHost do Apache ---\n"
sudo a2enmod rewrite
wget https://gist.github.com/fideloper/2710970/raw/vhost.sh
sudo chmod guo+x vhost.sh
sudo mv vhost.sh /usr/local/bin/vhost

echo -e "\n\t--- Setting VirtualHost project ---\n"
VHOST=$(cat <<EOF
<VirtualHost *:80>
  ServerName oncontabil.dev
  DocumentRoot "/var/www/html/oncontabil/public"
  <Directory />
    Options FollowSymlinks
    AllowOverride None
  </Directory>
  <Directory "/var/www/html/oncontabil/public">
    AllowOverride All
  </Directory>

  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
)

echo "$VHOST" > /etc/apache2/sites-available/oncontabil.conf

echo -e "\n\t--- Enabling VirtualHost created ---\n"
sudo a2ensite oncontabil.conf

echo -e "\n\t--- Restarting Apache ---\n"
sudo service apache2 restart

# Laravel stuff here, if you want

echo -e "\n\t--- All set to go! Would you like to play a game? ---\n"