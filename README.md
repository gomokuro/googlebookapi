# 概要
Google Book Api を使用したテストサイト

## Installation
Windows上でVagrantとChefを使用した環境構築を前提とします。
plaguinはvagrant-omnibusを使用しております。

VagrantとChefで、Amazon Linux2 上にPHP8.1の環境を構築します。

1. 任意のディレクトリに本リポジトリをCloneします
2. Vagrant_templateをVagrantと名前を変えます
3. PowerShell等で `vagrant up --provision` コマンドを叩きます
4. `vagrant port` でローカルのportを確認し、任意のSSHアプリでそのポートにSSH接続を行います。
SSH接続情報   id:vagrant pass:vagrant
5. `sudo su` でrootになり、`mysql` コマンドでmysql(maria)へログイン
6. mysql上で以下コマンドでデータベースを作成
```
CREATE DATABASE IF NOT EXISTS sample_search_books CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```
7. ユーザーを作成  (password等は任意に変えてください)
```
CREATE USER sample_user@localhost IDENTIFIED BY 'sample_user_pass';
```
8. GRANTで作成したユーザーに作成したDBの権限を付与
```
GRANT ALL PRIVILEGES ON sample_search_books.* TO sample_user@localhost;
```
9. exitでmysqlを抜ける
10. exitでvagrantユーザーへ戻る
11. `cd /vagrant` で共有ディレクトリへ移動し
12. `composer install` を行う
13. config/app.local.php にデータベースの接続情報をセット
```
'username' => 'sample_user',
'password' => 'sample_user_pass',
```
14. `bin/cake migrations migrate` でテーブルを構築
15. http://192.168.151.13/ に接続


## Other Installation
PHP8.1が動作する環境であれば特別複雑なことはしていないので、動作すると思います。
