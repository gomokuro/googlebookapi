yum_package "httpd" do
	action :install
end

#httpsのためのモジュール
yum_package 'mod_ssl' do
  action [:install]
end

template "httpd.conf" do
 path "/etc/httpd/conf/httpd.conf"
 source "httpd.conf.erb"
 mode 0644
end



