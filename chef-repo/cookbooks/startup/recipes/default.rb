service 'httpd' do
 action [ :enable, :start]
end

service 'mariadb' do
 action [ :enable, :start]
end

file "/etc/localtime" do
  content IO.read("/usr/share/zoneinfo/Japan")
end

