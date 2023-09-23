# ベースイメージを選択します。PHPとFastCGIサポートが含まれている公式のイメージを使用します。
FROM php:8.2-fpm

# 必要なパッケージをインストールします。
# RUN apt-get update && apt-get install -y php-mbstring

# 必要なPHP拡張機能をインストールします（必要に応じて変更できます）。
RUN docker-php-ext-install pdo pdo_mysql

# PHP-FPMエラーログを有効にし、ログの出力先を指定します。
RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini
RUN echo "error_log = /dev/stdout" >> /usr/local/etc/php/php.ini

# FastCGI設定を有効にします。
RUN echo "cgi.fix_pathinfo=0" >> /usr/local/etc/php/php.ini

# PHP-FPMを起動します。
CMD ["php-fpm"]
