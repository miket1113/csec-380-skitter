FROM nginx:alpine
RUN mkdir -p /etc/nginx/ssl/localhost
COPY conf/TLS/localhost.crt /etc/nginx/ssl/localhost/localhost.crt
COPY conf/TLS/localhost.key /etc/nginx/ssl/localhost/localhost.key
COPY conf/nginx.conf /etc/nginx/nginx.conf
