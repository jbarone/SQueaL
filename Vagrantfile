# -*- mode: ruby -*-
# vi: set ft=ruby :

project_name = "squeal"

Vagrant.configure("2") do |config|

  config.vm.box = "scotch/box"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.hostname = project_name + ".local"
  config.vm.synced_folder ".", "/var/www",
    :mount_options => ["dmode=777", "fmode=1777"]

  config.vm.provision "shell",
    inline: "mysql -uroot -proot < /var/www/database_setup.sql"
  config.vm.provision "shell",
    inline: "sudo /etc/init.d/apparmor teardown"

end
