# benchmark-laravel-lumen

Laravel 5.1とLumen 5.1のベンチマーク比較用のサンプルコードです。

## インストールしておくもの

* Vagrant <https://www.vagrantup.com/downloads.html>
* VirtualBox <https://www.virtualbox.org/wiki/Downloads>
* Homestead <http://laravel.com/docs/5.1/installation>

## 環境の準備

適当なディレクトリにこのリポジトリをgit cloneしてください。ここでは、ホームディレクトリ~/にcloneしたものとして話を進めます。  

	git clone git@github.com:medpeer-inc/benchmark-laravel-lumen.git

リポジトリのHomestead.yamlをローカルの~/.homestead/.にコピーしてください。

	cp ~/benchmark-laravel-lumen/Homestead.yaml ~/.homestead/.

ローカルの/etc/hostsに下記のエントリを追加してください。

	192.168.10.10	laravel.app
	192.168.10.10	lumen.app

HomesteadのVagrant環境を立ち上げて、sshログインしてください。

	vagrant up
	vagrant ssh

## サンプルデータの準備

サンプルデータのデータベースをHomestead内のMySQLに作成します。

次のコマンドでテーブルを作成してください。

	cd ~/benchmark-laravel-lumen/laravel/
	php artisan migrate

次のコマンドでサンプルデータをロードしてください。

	php artisan db:seed

## Laravelの準備

Laravelの依存パッッケージをcomposerで取得してください。 
 
	cd ~/benchmark-laravel-lumen/laravel/
	composer install

環境設定ファイルをコピーしてください。

	cp .env.example .env

アプリケーションキーを生成してください。

	php artisan key:generate
	> Application key [Z9dACvtZLvNOCPb9mLSPw7bDtxyo4uM8] set successfully.

作成したアプリケーションキーを/config/app.phpに反映してください。

    'key' => env('APP_KEY', 'Z9dACvtZLvNOCPb9mLSPw7bDtxyo4uM8'),

以上で、ブラウザから<http://laravel.app/sample>にアクセスするとjsonが返ってきます。

## Lumenの準備

Lumenの依存パッケージをcomposerで取得してください。

	cd ~/benchmark-laravel-lumen/lumen/
	composer install
	
composer install中にGithubのアクセストークンの入力を求められた場合は、<https://github.com/settings/tokens>で作成したトークンを使用してください。

	Could not fetch https://api.github.com/repos/illuminate/console/zipball/dac9a3584fb113b4476b16bfe9b363da5bb5cac6, please create a GitHub OAuth token to go over the API rate limit
	Head to https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+homestead+2015-07-09+0817
	to retrieve a token. It will be stored in "/home/vagrant/.composer/auth.json" for future use by Composer.
	Token (hidden): XXXXXXXXXXXXXXXXXX

Lumenはこれだけです。ブラウザから<http://lumen.app/samle>にアクセスするとjsonが返ってきます。
