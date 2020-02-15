#!/usr/bin/env bash

sudo apt update
sudo apt upgrade

sudo apt autoremove --auto-remove --purge virtualbox*
sudo apt install /path/to/.deb/file/

sudo apt-get remove --auto-remove vagrant
rm -r ~/.vagrant.d
#NOTE: Above steps does not remove machines available under workingdir/.vagrant/ folder

#These are the steps to install vagrant 2.0.2:
wget https://releases.hashicorp.com/vagrant/2.0.2/vagrant_2.0.2_x86_64.deb
sudo dpkg -i vagrant_2.0.2_x86_64.deb
vagrant version

#AFTER VG INSTALL

vagrant plugin install vagrant-vbguest
vagrant vbguest

# IF An error occurred during installation of VirtualBox Guest Additions 4.3.36. Some functionality may not work as intended.


#vagrant up

