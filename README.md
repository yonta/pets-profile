# 概要

「Petprofile」ペットの紹介ができるウェブサービス。

# 使い方

## レポジトリの準備

- レポジトリのクローン

```console
$ git clone https://github.com/asyano/pets-profile.git
```

- 不要データの削除

```console
$ docker rmi `docker images -q`
```

## PHPの準備

- PHP 7.3のインストール

``` console
$ sudo apt -y install software-properties-common
$ sudo add-apt-repository -y ppa:ondrej/php
$ sudo apt update
$ sudo apt -y install php7.3 php7.3-bcmath php7.3-mbstring php7.3-mysql php7.3-xml
```

- composerのインストール

``` console
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

## OSの設定

- メモリを開放する

``` console
$ sudo sh -c "echo 3 > /proc/sys/vm/drop_caches"
```

- swap領域の設定

``` console
$ sudo dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
$ sudo chmod 600 /var/swap.1
$ sudo mkswap /var/swap.1
$ sudo swapon /var/swap.1
$ sudo cp -p /etc/fstab /etc/fstab.ORG
$ sudo sh -c "echo '/var/swap.1 swap swap defaults 0 0' >> /etc/fstab"
```

## MySQLの準備

- 日本語文字化け対策

``` console
$ cat /etc/mysql/mysql.conf.d/mysqld.cnf | sed -e '/utf8/d' | sed -e '/sql_mode/d' | sed -e '$acharacter-set-server=utf8\nsql_mode=STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' | sudo tee /etc/mysql/mysql.conf.d/mysqld.cnf
```

- ユーザーの追加

``` console
$ sudo mysql -u root
mysql> GRANT ALL PRIVILEGES ON *.* TO 'dbuser'@'localhost' IDENTIFIED BY 'dbpass' WITH GRANT OPTION;
mysql> exit
```

- 再起動

``` console
$ sudo service mysql restart
```

- データベースの作成

``` console
$ sudo mysql -u root
mysql> CREATE DATABASE `pet-profile`;
mysql> exit
```

## Pets-profileの準備

- マイグレーション

``` console
$ cd [your/pets-profile/dir]
$ php artisan migrate
```

- プレビュー
    - 下記コマンドの後、AWS Cloud9から「Preview」 -> 「Preview running application」

``` console
$ php artisan serve --host=$IP --port=$PORT
```

# 使ったもの

- AWS Cloud9
- MySQL
- html
    - Bootstrap
- php
    - Laravel
    - Composer
    - blade

以上。？？？
