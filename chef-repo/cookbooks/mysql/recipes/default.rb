bash 'php' do
	user 'root'
	code <<-EOC
	sudo amazon-linux-extras install mariadb10.5
	EOC
end
