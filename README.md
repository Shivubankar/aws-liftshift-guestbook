# 🗂️ AWS Lift-and-Shift Guestbook App

This project demonstrates a **Lift-and-Shift migration** of a PHP-MySQL Guestbook application to an **AWS EC2 instance**. It simulates how legacy on-premise applications can be containerized or directly migrated to the cloud using manual and scripted steps.

---

## 🛠️ Tech Stack

- Frontend: PHP
- Backend: MySQL
- Web Server: Apache2
- OS: Ubuntu 24.04 LTS (Free-tier EC2)
- Cloud: AWS EC2
- Tool: `scp`, `ssh`, `mysql`, `apache2`, `vim`, `systemctl`

---

## 📁 Project Structure
aws-liftshift-guestbook/
│
├── guestbook/              # PHP Frontend code
│   └── index.php
├── guestbook.sql           # SQL dump of the MySQL database
├── guestbook.tar.gz        # Compressed version of the PHP app for transfer
└── README.md               # You’re reading this 📘


---

## 🚀 Deployment Steps

### ✅ EC2 Setup

1. Launch Ubuntu EC2 Instance (Free-tier)
2. Allow inbound ports `22`, `80` in Security Group
3. SSH into instance:
   ```bash
   ssh -i linux-key.pem ubuntu@<EC2-IP>


Web Server & PHP Setup
sudo apt update
sudo apt install apache2 php libapache2-mod-php -y


 MySQL Setup
sudo apt install mysql-server -y
sudo systemctl start mysql
sudo mysql_secure_installation

Database Import
mysql -u root -p < guestbook.sql

Create user and assign:
CREATE USER 'guestuser'@'localhost' IDENTIFIED BY 'guestpass';
GRANT ALL PRIVILEGES ON guestbook.* TO 'guestuser'@'localhost';
FLUSH PRIVILEGES;


Deploy PHP App
tar -xvzf guestbook.tar.gz
sudo mv guestbook /var/www/html/
sudo chown -R www-data:www-data /var/www/html/guestbook
sudo systemctl restart apache2


🌐 Access App
http://<EC2-Public-IP>/guestbook


✍️ Author
👨‍💻 Shivakumar S H  
🔗 [GitHub - Shivubankar](https://github.com/Shivubankar)  
📧 shivubankar59@gmail.com



🧠 What You Learn from This Project
	•	How to migrate a legacy app from on-prem to AWS
	•	Use of scp, ssh, mysql, and Linux services
	•	Apache-PHP-MySQL stack configuration
	•	Importance of guestbook.sql and guestbook.tar.gz in cloud migrations

📦 Future Improvements
	•	Containerize the app using Docker
	•	Automate with Ansible or Terraform
	•	Deploy on Kubernetes with LoadBalancer + Ingress


