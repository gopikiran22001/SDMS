import smtplib
from email.mime.text import MIMEText
import sys

recipients =sys.argv[1]
otp=sys.argv[2]
subject = "Reset password"
body = "Your One Time Password is "+otp+"."
sender = "student.management.team.elite@gmail.com"
password = "kixxvpccyvcyzbis"


def send_email(subject, body, sender, recipients, password):
    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['From'] = sender
    msg['To'] = recipients
    with smtplib.SMTP_SSL('smtp.gmail.com', 465) as smtp_server:
       smtp_server.login(sender, password)
       smtp_server.sendmail(sender, recipients, msg.as_string())
    print("Message sent!")


send_email(subject, body, sender, recipients, password)