# WIDGET GALLERY YOUTUBE

Un widget para galeria de un canal de youtube

![Captura de pantalla 2025-02-25 184359](https://github.com/user-attachments/assets/45b23817-c756-4b3f-920f-0b0010f1018d)

---

### CARACTERISTICAS

- Espacio donde se presentan los datos del canal de youtube, como la imagen de portada, logo, nombre, cantidad de subscriptores, videos y likes.

- Los videos del canal son presentados en un carrusel y cada componente presenta la minuatura, titulo, descripcion (sí posee), fecha de publicacion, catidad de likes, vistas y comentarios.
- El video es visualisado en una ventana modal

---

### ¿DESEAS USAR LA PLANTILLA?

1. **Descargar el repositorio**:

- Clona o descarga el repositorio en tu computadora.

2. **Instalar las dependencias del proyecto**

- Ingresa a la carpeta del proyecto mediante una terminal y ejecuta `npm install`

> [!IMPORTANT] > `npm install` es un comando para la terminal de Powershell, busca un equivalente para la terminal de tu preferencia

3. **Ejecutar el proyecto**

- En la terminal, ejecuta el comando `npm run dev`.

- Una vez cargado, en el navegador de preferencia ingrese `http://localhost:5173/`, el proyecto debe ejecutarse con seguridad.

4. **Asignar el canal de youtube de su preferencia**:

- Dirígete a la ruta `config/appConfig.js`, encuentra "config" en la raíz del proyecto.
- Reemplaze el valor de la variable `handle` con el username del canal de youtube que desée.
- `handle` aparecerá como parte de un bloque de código JS, algo como esto:

  ```js
  const appConfig = {
    handle: "@username",
  };
  ```

  > [!TIP]
  > Encuentra el @username en el inicio del canal de youtube
