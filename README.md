# 内容

- 「Petprofile」ペットの紹介ができるウェブサービス。

# Getting Started

1. `git clone https://github.com/asyano/pets-profile.git`
1. 不要データの削除 ```docker rmi `docker images -q` ```
1. php7.3のインストール
    - リポジトリの追加`sudo apt -y install software-properties-common`
    - リポジトリを利用可能にする`sudo add-apt-repository -y ppa:ondrej/php`
    - `sudo apt update`
    - `sudo apt -y install php7.3 php7.3-bcmath php7.3-mbstring php7.3-mysql php7.3-xml`
    - `php -v`
1. composerのインストール
    - `curl -sS https://getcomposer.org/installer | php`
    - `sudo mv composer.phar /usr/local/bin/composer`
    - `composer about`
1. メモリを開放する
    - `sudo sh -c "echo 3 > /proc/sys/vm/drop_caches"`
1. swap領域の設定
    - ```sudo dd if=/dev/zero of=/var/swap.1 bs=1M count=1024```
    - ```sudo chmod 600 /var/swap.1```
    - `sudo mkswap /var/swap.1`
    - `sudo swapon /var/swap.1`
    - `sudo cp -p /etc/fstab /etc/fstab.ORG`
    - `sudo sh -c "echo '/var/swap.1 swap swap defaults 0 0' >> /etc/fstab"`
1. MYSQLの設定
    - 一つ上のディレクトリへ移動
    - 日本語文字化け対策`cat /etc/mysql/mysql.conf.d/mysqld.cnf | sed -e '/utf8/d' | sed -e '/sql_mode/d' | sed -e '$acharacter-set-server=utf8\nsql_mode=STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' | sudo tee /etc/mysql/mysql.conf.d/mysqld.cnf`
    - ユーザーの追加 `sudo mysql -u root`↓
    - `GRANT ALL PRIVILEGES ON *.* TO 'dbuser'@'localhost' IDENTIFIED BY 'dbpass' WITH GRANT OPTION;`↓
    - `exit`
1. サーバー の再起動
    - `sudo service mysql restart`
1. データベースの作成
    - ログイン `sudo mysql -u root`
    - 作成 ```CREATE DATABASE `pet-profile`; ```
    - ログアウト `exit`
1. マイグレーション
    - Pets-profileディレクトリに戻る
    - `php artisan migrate`
1. Preview
    - `php artisan serve --host=$IP --port=$PORT`
    - 「Preview」 -> 「Preview running application」

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
