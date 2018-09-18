FROM httpd:alpine

RUN apk update && apk upgrade && apk add bash
COPY index.html /usr/local/apache2/htdocs/index.html
