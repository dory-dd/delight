# Nginxイメージをベースにします。
FROM nginx:stable-alpine

# Nginxのデフォルト設定ファイルを削除し、カスタム設定ファイルをコピーします。
RUN rm /etc/nginx/conf.d/default.conf
COPY nginx-config.conf /etc/nginx/conf.d/default.conf

# ポート80を公開します。
EXPOSE 80

# Nginxを起動します。
CMD ["nginx", "-g", "daemon off;"]