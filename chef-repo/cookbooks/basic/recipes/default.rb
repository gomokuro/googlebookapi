yum_package 'wget' do
  action [:install]
end

yum_package 'vim' do
  action [:install]
end

yum_package 'sl' do
  action [:install]
  options '--enablerepo=epel'
end

yum_package 'git' do
  action [:install]
end
