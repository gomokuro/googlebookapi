# coding: utf-8
bash 'php' do
	user 'root'
	code <<-EOC
	sudo amazon-linux-extras install php8.1
	EOC
 end
 
 bash 'php-mbstring' do
	user 'root'
	code <<-EOC
	sudo yum install -y install php-mbstring
	EOC
 end
 
 bash 'php-gd' do
   user 'root'
   code <<-EOC
   sudo yum install -y install php-gd
   EOC
 end
 
 bash 'php-xml' do
	user 'root'
	code <<-EOC
	sudo yum install -y install php-xml
	EOC
 end
 
 bash 'php-intl' do
   user 'root'
   code <<-EOC
   sudo yum install -y install php-intl
   EOC
 end
 
 #yum_package 'libwebp' do
 #  action [:install]
 #end
 
 #yum_package 'gd-last' do
 #  action [:install]
 #end
 
 
 # php.ini設定
 template "php.ini" do
   path "/etc/php.ini"
   source "php.ini.erb"
   mode 0644
   #action :nothing
 end
 
 bash 'add_composer' do
	user 'root'
	code <<-EOC
	   curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer
	EOC
	creates "/bin/composer"
 end
 