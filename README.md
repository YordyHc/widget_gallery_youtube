# WIDGET GALLERY YOUTUBE

Proyecto web dedicado a una galería de YouTube de un canal de YouTube mediante su ID.

### Imagen de referencia:
![Captura de pantalla 2025-02-25 184359](https://github.com/user-attachments/assets/45b23817-c756-4b3f-920f-0b0010f1018d)

---

### TECNOLOGÍAS USADAS
- **PHP**
- **HTML**
- **CSS**
- **Javascript**

---

### FRAMEWORK
- **Bootstrap 5**
  
---

### SERVICIOS A USAR
- **YouTube Data API**

---

### ¿CÓMO USAR?
Para ejecutar este proyecto en tu máquina local, sigue estos pasos:

1. **Descargar el repositorio**:
   Clona o descarga el repositorio en tu computadora.

2. **Configurar el archivo "config.php"**:
   - Dirígete al archivo `config.php` que se encuentra en la raíz del proyecto.
   - Define tu **LLAVE API YOUTUBE** en la variable `API_KEY`. Si no tienes una, puedes obtenerla siguiendo el manual:
     - [CONCEPTOS BÁSICOS DE YOUTUBE Y LA API](https://developers.google.com/youtube/v3/getting-started?hl=es-419)

3. **Obtener el ID DEL CANAL**:
   - Dirígete a la página del canal de YouTube en tu navegador.
   - Haz clic derecho en la página y selecciona **Ver código fuente de la página**.
   - Busca la palabra **"channelId"** (puedes usar **Ctrl + F** en la mayoría de los navegadores para buscarlo).
   - El **ID del canal** aparecerá como parte de un bloque de código JSON, algo como esto:
     ```json
     "channelId": "UCxxxxxxxxxxxxxxxxxx"
     ```
   - Copia el **ID del canal** y pégalo en la variable `CHANNEL_ID` dentro del archivo `config.php`.

4. **Ejecutar el proyecto**:
   Para ejecutar el proyecto en tu entorno de desarrollo local, sigue estos pasos:

---

#### Opción A: Usando XAMPP

1. **Instalar XAMPP**:
   - Si no tienes XAMPP instalado, ve a [XAMPP](https://www.apachefriends.org/es/index.html) y descarga la versión adecuada para tu sistema operativo (Windows, macOS, Linux).
   - Instala XAMPP y asegúrate de que Apache y MySQL estén corriendo.

2. **Colocar el proyecto en la carpeta "htdocs"**:
   - Dirígete a la carpeta donde instalaste XAMPP, usualmente en `C:\xampp\htdocs` (en Windows).
   - Coloca la carpeta del proyecto dentro de `htdocs` (por ejemplo, `C:\xampp\htdocs\widget-gallery`).

3. **Abrir el proyecto en tu navegador**:
   - Abre tu navegador y ve a `http://localhost/widget-gallery` (si nombraste la carpeta del proyecto "widget-gallery").
   - ¡El proyecto debería funcionar!

---

#### Opción B: Usando Laragon

1. **Instalar Laragon**:
   - Si prefieres usar Laragon, ve a [Laragon](https://laragon.org/) y descarga la última versión.
   - Instala Laragon en tu sistema.

2. **Colocar el proyecto en la carpeta "www"**:
   - Dirígete a la carpeta `www` dentro de Laragon (por lo general, `C:\laragon\www`).
   - Coloca la carpeta del proyecto dentro de `www` (por ejemplo, `C:\laragon\www\widget-gallery`).

3. **Abrir el proyecto en tu navegador**:
   - Abre tu navegador y ve a `http://localhost/widget-gallery` (si nombraste la carpeta del proyecto "widget-gallery").
   - ¡El proyecto debería funcionar!

---

