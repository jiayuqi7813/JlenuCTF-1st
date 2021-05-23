FROM dasctfbase/web_python3

COPY requirements.txt .
RUN pip install -r requirements.txt

COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh

RUN useradd -s /bin/bash ctf

WORKDIR /app
COPY app .

RUN chown -R ctf:ctf uploads/

EXPOSE 8080

USER ctf

ENTRYPOINT ["/entrypoint.sh"]
