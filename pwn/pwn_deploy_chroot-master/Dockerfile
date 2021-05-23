FROM ubuntu:18.04

RUN sed -i 's/archive.ubuntu.com/mirrors.aliyun.com/g' /etc/apt/sources.list && apt update && apt-get install -y lib32z1 xinetd && rm -rf /var/lib/apt/lists/ && rm -rf /root/.cache && apt-get autoclean && rm -rf /tmp/* /var/lib/apt/* /var/cache/* /var/log/*
#apt update && apt-get install -y lib32z1 xinetd && rm -rf /var/lib/apt/lists/ && rm -rf /root/.cache && apt-get autoclean && rm -rf /tmp/* /var/lib/apt/* /var/cache/* /var/log/*

COPY ./pwn.xinetd /etc/xinetd.d/pwn

COPY ./service.sh /service.sh

RUN chmod +x /service.sh

# useradd and put flag
RUN useradd -m easysender && useradd -m strlenvsread && useradd -m whiterabbit && echo 'flag{30237463-8223-4796-8e1f-c24aafbb58f4}' > /home/easysender/flag.txt && echo 'flag{160c4769-04cf-4c2a-b59e-ff43905a8028}' > /home/strlenvsread/flag.txt && echo 'flag{4dff74fa-14db-4147-9fd7-9f5efa028c63}' > /home/whiterabbit/flag.txt

# copy bin
COPY ./bin/easysender /home/easysender/easysender
COPY ./catflag /home/easysender/bin/sh
COPY ./bin/strlenvsread /home/strlenvsread/strlenvsread
COPY ./catflag /home/strlenvsread/bin/sh
COPY ./bin/whiterabbit /home/whiterabbit/whiterabbit
COPY ./catflag /home/whiterabbit/bin/sh


# chown & chmod
RUN chown -R root:easysender /home/easysender && chmod -R 750 /home/easysender && chmod 740 /home/easysender/flag.txt && chown -R root:strlenvsread /home/strlenvsread && chmod -R 750 /home/strlenvsread && chmod 740 /home/strlenvsread/flag.txt && chown -R root:whiterabbit /home/whiterabbit && chmod -R 750 /home/whiterabbit && chmod 740 /home/whiterabbit/flag.txt

# copy lib,/bin 
RUN cp -R /lib* /home/easysender && cp -R /usr/lib* /home/easysender && mkdir /home/easysender/dev && mknod /home/easysender/dev/null c 1 3 && mknod /home/easysender/dev/zero c 1 5 && mknod /home/easysender/dev/random c 1 8 && mknod /home/easysender/dev/urandom c 1 9 && chmod 666 /home/easysender/dev/* && cp /bin/sh /home/easysender/bin && cp /bin/ls /home/easysender/bin && cp /bin/cat /home/easysender/bin && cp -R /lib* /home/strlenvsread && cp -R /usr/lib* /home/strlenvsread && mkdir /home/strlenvsread/dev && mknod /home/strlenvsread/dev/null c 1 3 && mknod /home/strlenvsread/dev/zero c 1 5 && mknod /home/strlenvsread/dev/random c 1 8 && mknod /home/strlenvsread/dev/urandom c 1 9 && chmod 666 /home/strlenvsread/dev/* && cp /bin/sh /home/strlenvsread/bin && cp /bin/ls /home/strlenvsread/bin && cp /bin/cat /home/strlenvsread/bin && cp -R /lib* /home/whiterabbit && cp -R /usr/lib* /home/whiterabbit && mkdir /home/whiterabbit/dev && mknod /home/whiterabbit/dev/null c 1 3 && mknod /home/whiterabbit/dev/zero c 1 5 && mknod /home/whiterabbit/dev/random c 1 8 && mknod /home/whiterabbit/dev/urandom c 1 9 && chmod 666 /home/whiterabbit/dev/* && cp /bin/sh /home/whiterabbit/bin && cp /bin/ls /home/whiterabbit/bin && cp /bin/cat /home/whiterabbit/bin

CMD ["/service.sh"]
