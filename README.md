# WIDGET GALLERY YOUTUBE

Un **widget visual interactivo** para mostrar la galería de videos de un canal de YouTube, integrando datos del canal y visualización en un carrusel con modal.

![Captura de pantalla 2025-06-17 011403](https://github.com/user-attachments/assets/23e921df-5425-4e65-bac3-ea63b9f44cf1)

## 🌐 Ejemplo desplegado

👉 [widget-youtube.vercel.app](https://widget-youtube.vercel.app/)

---

## 📚 Tabla de Contenidos

- [🚀 Características](#-características)
- [🔧 Tecnologías utilizadas](#-tecnologías-utilizadas)
- [🔄 Evolución del proyecto](#-evolución-del-proyecto)
- [⚙️ Instalación](#-Instalación)
- [🔧 Configuración del canal](#-configuración-del-canal)
- [🧑‍💻 Créditos](#-créditos)
- [📝 Licencia](#-licencia)

---

## 🚀 Características

- Visualización de datos del canal de YouTube:

  - Imagen de portada
  - Logo
  - Nombre del canal
  - Suscriptores, videos y likes

- Galería de videos con:

  - Miniatura
  - Título
  - Descripción (si aplica)
  - Fecha de publicación
  - Likes, vistas y comentarios

- Modal interactivo para reproducir los videos

<div align="center">
  <img src="https://github.com/user-attachments/assets/e96f01a7-5f46-48de-b61d-63f74b1efdb2" alt="Vista previa del widget" width="800" />
</div>

---

## 🔧 Tecnologías utilizadas

![React](https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![Node.js](https://img.shields.io/badge/Node.js-339933?style=for-the-badge&logo=node.js&logoColor=white)
![npm](https://img.shields.io/badge/npm-CB3837?style=for-the-badge&logo=npm&logoColor=white)

---

## 🔄 Evolución del proyecto

Este proyecto originalmente fue desarrollado con:

- PHP
- HTML
- JavaScript
- CSS

Y fue **reescrito desde cero con React y Vite**, aplicando principios de componentes reutilizables, arquitectura moderna y mejoras en rendimiento, diseño y mantenibilidad.

---

## ⚙️ Instalación

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/tu_usuario/widget-gallery-youtube.git
   cd widget-gallery-youtube
   ```

2. **Instalar dependencias**

   ```bash
   npm install
   ```

> [!IMPORTANT]
> _Este comando funciona en terminales bash, zsh, PowerShell o CMD._

3. **Ejecutar en entorno de desarrollo**

   ```bash
   npm run dev
   ```

   Accede a `http://localhost:5173/` en tu navegador.

---

## 🔧 Configuración del canal

Para personalizar el widget con el canal que desees:

1. Abre el archivo:

   ```
   src/config/appConfig.js
   ```

2. Reemplaza el valor de `handle` con el _username_ del canal de YouTube:

   ```js
   const appConfig = {
     handle: "@nombreDeUsuario",
   };
   ```

> [!NOTE]
> Puedes encontrar el `@username` del canal que quieres en la página principal del mismo.

3. Guarda los cambios realizados y Accede a `http://localhost:5173/` en tu navegador.

---

## ☁️ Despliegue en Vercel

### Paso a paso:

> [!IMPORTANT]
> _Los comandos funcionan en terminales bash, zsh, PowerShell o CMD._

#### 1. **Instalar la CLI de Vercel**

```bash
npm install -g vercel
```

#### 2. **Iniciar sesión con GitHub (Recomendado)**

```bash
vercel login
```

- Escoge la opcion de continuar con Github.
- Si estas autentificado con tu cuenta de github, mostrará un mensaje de exito, si no lo estas:
  - Ingresa tu **correo asociado a GitHub**.
  - Se te enviará un enlace de verificación por email
- Una vez autenticado, Vercel detectará tu cuenta de GitHub.

#### 3. **Inicializar despliegue**

Desde la terminal en la raíz de tu proyecto:

```bash
vercel
```

Durante la primera ejecución, Vercel te hará algunas preguntas:

- ¿Deseas vincular este directorio a un proyecto existente? → `n`
- Nombre del proyecto → _(presiona Enter para usar el nombre del directorio)_
- ¿En qué directorio está tu salida de build? → _(Dejarlo con "./")_
- ¿Quieres sobrescribir la configuración? → `n`

#### 4. **(Opcional) Build y despliegue manual**

```bash
npm run build
vercel --prod
```

#### 5. **Resultado**

Verás tu proyecto online en una URL del tipo: `https://nombre-proyecto.vercel.app`

> [!IMPORTANT]
> No confundir el preview Deployment con el dominio.

---

## 🧑‍💻 Créditos

Proyecto realizado por **Yordy Huaman C.**

---

## 📝 Licencia

MIT License – [LICENSE](./LICENSE)
