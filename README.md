# 📮 Proyecto: Envío de Postales Digitales 📬

¡Bienvenido a **Envío de Postales Digitales**! 🌍💌  
Este proyecto te permite crear y enviar postales personalizadas a cualquier persona en el mundo a través del correo electrónico. 🎨✉️  

---

## 🚀 Características  
✅ Selecciona una imagen llamativa para tu postal 📸  
✅ Agrega un mensaje personalizado con estilo ✍️  
✅ Escribe el destinatario y su correo 📩  
✅ Envía la postal con un solo clic! 🚀  

---

## 🛠️ Requisitos  
🔹 Servidor local con XAMPP instalado 🖥️  
🔹 Servidor Apache y módulo PHP activados 🌐  
🔹 Biblioteca PHPMailer para envío de correos 📧  
🔹 Conexión a Internet activa 📡  

---

## 📌 Instalación  
1️⃣ Asegúrate de que XAMPP esté instalado en tu sistema.  
   - Descárgalo desde: [https://www.apachefriends.org/es/index.html](https://www.apachefriends.org/es/index.html)
   - Instala y ejecuta el Panel de Control de XAMPP.

2️⃣ Clona este repositorio en la carpeta `htdocs` de XAMPP:  
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/RoyDuran/Aplicaci-n-Enviar-Postales.git
   ```  

3️⃣ Asegúrate de que la ruta del proyecto sea:  
   ```
   C:\xampp\htdocs\Aplicaci-n-Enviar-Postales
   ```

4️⃣ Configura el archivo de correo `config.php` con tus credenciales SMTP:  
   ```php
   define('SMTP_HOST', 'smtp.tudominio.com');
   define('SMTP_USER', 'tuemail@dominio.com');
   define('SMTP_PASS', 'tucontraseña');
   define('SMTP_PORT', 587);
   ```  

---

## 🎨 Uso  
1️⃣ Inicia XAMPP y activa **Apache** y **MySQL**.  
2️⃣ Accede a tu navegador y abre la URL:  
   ```
   http://localhost/Aplicaci-n-Enviar-Postales/
   ```  
3️⃣ Selecciona una imagen para tu postal.  
4️⃣ Escribe un mensaje especial.  
5️⃣ Introduce el correo del destinatario.  
6️⃣ Haz clic en **Enviar** y sorprende a alguien! 💖  

---

## 🔧 Tecnologías Utilizadas  
🟢 PHP  
🟠 HTML / CSS / JavaScript  
🔵 PHPMailer  

---

## 👨‍💻 Autor  
📌 **[RoyDuran](https://github.com/tuusuario)**  

📜 **Licencia:** Proyecto bajo la licencia MIT 📄


