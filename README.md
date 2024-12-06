# Proyecto GamerFest

**Integrantes del equipo:**
- **Alomoto Carla** (Scrum Manager)
- **Flores Steeven**
- **Guanoluisa Fernando**
- **Brayan Pallango**

## Instrucciones para insertar un usuario desde la terminal

1. Ejecuta el siguiente comando:
   ```bash
   php artisan make:filament-user
   ```
2. Ingresa los datos del usuario y asigna una contraseña.
3. Accede a `127.0.0.1:8000/admin` e inicia sesión con las credenciales creadas.

## Configuración de la foto de perfil

1. Ejecuta el siguiente comando para crear el enlace simbólico:
   ```bash
   php artisan storage:link
   ```
2. Dirígete a `http://127.0.0.1:8000/admin/my-profile`.
3. En la página de perfil, sube la foto y guarda los cambios.

## Activación de la autenticación en dos pasos

1. Accede a `http://127.0.0.1:8000/admin/my-profile`.
2. Dirígete al apartado de **Two Factor Authentication**.
3. Activa la autenticación en dos pasos y escanea el código QR con una app de autenticación (como Google Authenticator).
4. Ingresa el código generado por la app para confirmar la configuración.
5. Al cerrar sesión y volver a iniciar sesión, se te pedirá el código de autenticación generado por la app.

> **Nota:** Asegúrate de tener correctamente configurado el archivo `.env` para que la autenticación funcione adecuadamente.
