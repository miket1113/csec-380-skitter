From ubuntu:latest

RUN apt-get update -y
RUN apt-get install -y python3 python3-pip python3-dev build-essential

RUN mkdir /myApp
WORKDIR /myApp

COPY app/requirements.txt /myApp/
RUN pip3 install -r requirements.txt

COPY app/follow.py /myApp/

ENTRYPOINT ["python3"]
CMD ["follow.py"]
