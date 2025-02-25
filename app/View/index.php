<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos del Canal de YouTube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .header-container {
            width: 100%;  /* Ancho total de la pantalla */
            height: 34vh;  /* Ajustable según necesidad */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Mantiene el área cubierta sin franjas negras */
            object-position: center; /* Mantiene el centro de la imagen */
            transition: transform 0.4s ease; /* Suaviza la animación del zoom */
        }

        @media (max-width: 768px) {
            .header-container img {
                transform: scale(3.3); /* Aplica un zoom cuando la pantalla es más pequeña */
            }
        }

        @media (max-width: 480px) {
            .header-container img {
                transform: scale(1.7); /* Aumenta más el zoom para centrarse en el personaje */
            }
        }
        .profile {
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: -50px; /* Para superponer la imagen de perfil */
        }

        .profile img { 
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid white;
        }

        .profile h2 {
            font-size: 24px;
            margin: 0;
        }
        a {
            text-decoration: none;
            color: #000000;
        }
        a:hover {
            text-decoration: underline;
            color: #000000;
        }
        .stats {
            font-size: 14px;
            color: gray;
            margin-top: 5px;
        }
        .subscribe-btn {
            
            display: flex;
            align-items: center;
            gap: 5px;
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .subscribe-btn img {
            width: 16px;
            height: 16px;
        }

        .subscribe-btn:hover {
            background-color: #cc0000;
        }
        .gallery-container {
            position: relative;
            width: 100%;
            max-width: 1550px;
            margin: auto;
        }

        .gallery {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            position: relative;
        }
        .thumbnail {
            width: 100%;
            height: 100%;
            display: block;
        }
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(255, 0, 0);
            border: none;
            border-radius: 12%;
            width: 80px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .video:hover {
            button{
                background-color: rgba(255, 0, 0, 0.719);
            }
            .video-title{
                text-decoration: underline;
                
            }
        }
        .play-button::before {
            content: "▶\FE0E"; /* Agrega U+FE0E para evitar el fondo azul */
            color: white;
            font-size: 24px;
            font-family: Arial, sans-serif; /* Asegura una fuente sin emoji */
        }
        .video-duration {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-size: 12px;
            padding: 3px 6px;
            border-radius: 4px;
        }
        .gallery-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background:#ede6e6;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .gallery-nav-btn:hover {
            background: rgba(255, 255, 255, 1);
        }

        .gallery-prev {
            left: 5px; /* Ajusta según sea necesario */
        }

        .gallery-next {
            right: 5px; /* Ajusta según sea necesario */
        }

        @media (max-width: 768px) {
            .gallery-prev {
                left: 5px;
            }
            .gallery-next {
                right: 5px;
            }
        }

        .video {
            width: 420px;
            height: 237px; /* Define el ancho del contenedor */
            position: relative;
            cursor: pointer;
        }

        .video-title {
            white-space: nowrap; /* Evita que el texto se divida en varias líneas */
            overflow: hidden; /* Esconde el texto que se desborda */
            text-overflow: ellipsis; /* Muestra "..." cuando el texto es demasiado largo */
            width: 100%; /* Asegura que el texto ocupe todo el ancho disponible */
            display: block; /* Asegura que el texto esté en bloque y se ajuste correctamente */
            font-size: 16px; /* Tamaño de fuente para el título */
            line-height: 1.2em; /* Ajusta el interlineado */
        }

        .video-info { font-size: 14px; color: gray; }
        .controls { margin-top: 20px; display: flex; justify-content: center; align-items: center; gap: 10px; }
        .nav-btn { background: white; border: 1px solid #ddd; padding: 10px; border-radius: 50%; cursor: pointer; }
        .pagination { margin-top: 20px; }
        .pagination button { margin: 5px; padding: 8px 12px; border: 1px solid #ddd; background: white; cursor: pointer; }
        .pagination .active { background: black; color: white; }
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: white;
            width: 75%;
            max-width: 800px;
            height: auto;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden; /* Oculta cualquier desbordamiento */
        }
        
        /* Botón de cerrar */
        .close {
            position: absolute;
            top: 69px; /* Sube la 'X' fuera del modal */
            right: 16px; /* La mueve un poco fuera del modal */
            font-size: 20px;
            cursor: pointer;
            z-index: 100; /* Asegura que esté sobre todo */
            background: rgba(255, 255, 255, 0.555);
            padding: 10px 15px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .close:hover{
            background: #fff;
        }

        
        /* Contenedor del iframe con recorte */
        .iframe-container {
            width: 100%;
            height: 450px; /* Ajusta la altura del recorte */
            position: relative;
            overflow: hidden; /* Oculta las partes no deseadas */
        }
        
        /* Ajusta el iframe para que ocupe más espacio y se recorte */
        .iframe-container iframe {
            position: absolute;
            top: 0%; /* Recorta la parte superior */
            left: 0%; /* Recorta los lados */
            width: 100%;
            height: 100%;
            border: none;
        }
        
        /* Contenido extra debajo del iframe */
        .modal-extra-content {
            padding: 20px;
            text-align: left;
            width: 100%;
        }
    </style>
    <script>
        let videos = <?php echo json_encode(array_values($videos)); ?>;
        let currentIndex = 0;
        const videosPerPage = 3;

        function renderVideos() {
            const gallery = document.querySelector('.gallery');
            gallery.innerHTML = '';
            for (let i = currentIndex; i < currentIndex + videosPerPage && i < videos.length; i++) {
                let id_vid = videos[i]["id"];
                let imagen = videos[i]["thumbnail"];
                let duracion = videos[i]["duration"];
                let titulo = videos[i]["title"];
                let fecha = videos[i]["publishedAt"];
                let vista = videos[i]["views"];
                let likes = videos[i]["likes"];
                let coment = videos[i]["comments"];
                
                gallery.innerHTML += `
                    <div class="video" onclick="playvideo(\'${id_vid}\',\'${titulo}\',\'${vista}\')">
                        <img src="${imagen}" alt="Miniatura 3" class="thumbnail">
                        <button class='play-button'></button>
                        <span class='video-duration'>${duracion}</span>
                        <p class="video-title"><strong>${titulo}</strong></p>
                        <p class="video-info">${fecha}</p><br><br>
                        <p class="video-info">${vista} vistas • ${likes} likes • ${coment} comentarios</p>
                    </div>`;
            }
            updatePagination();
        }

        function updatePagination() {
            const pagination = document.querySelector('.pagination');
            pagination.innerHTML = '';
            let totalPages = Math.ceil(videos.length / videosPerPage);
            for (let i = 0; i < totalPages; i++) {
                pagination.innerHTML += `<button class="${i * videosPerPage === currentIndex ? 'active' : ''}" onclick="goToPage(${i})">${i + 1}</button>`;
            }
        }

        function goToPage(page) {
            currentIndex = page * videosPerPage;
            renderVideos();
        }

        function nextPage() {
            if (currentIndex + videosPerPage < videos.length) {
                currentIndex += videosPerPage;
                renderVideos();
            }
        }

        function prevPage() {
            if (currentIndex - videosPerPage >= 0) {
                currentIndex -= videosPerPage;
                renderVideos();
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderVideos();
        });

        function playVideo(videoId) {
            alert("Reproduciendo video: " + videoId);
            // Aquí puedes abrir una ventana modal o redirigir al video en YouTube
        }
    </script>
</head>
<body><br>
    <div class="container-fluid ">
        <div class="container-fluid">
            <div class="header-container" >
                <img src="<?= $datos['img_portada'] ?>" class="rounded-top"alt="Banner">
            </div><br><br>
            <div class="profile"><br><br><br><br><br>
                <img src="<?= $datos['img_perfil']?>"  alt="Perfil">
                <h2><a href="https://www.youtube.com/channel/<?= $datos['id_canal']?>"><?= $datos['nom_can'] ?></a></h2><br><br>
                <p class="stats"><?= $datos['suscriptores'] ?> Suscriptores • 11K Videos • 188 Vistas</p>
                <button class="subscribe-btn btn">
                    <img src="youtube-icon.png" alt="YouTube"> Youtube 32M
                </button>
                <br><br><br>
            </div><br>
            <div class="gallery-container">
                <button class="gallery-nav-btn gallery-prev" onclick="prevPage()"><-</button>
                <div class="gallery"></div>
                <button class="gallery-nav-btn gallery-next" onclick="nextPage()">-></button>
            </div><br><br><br><br><br><br><br>
            <div class="controls">
                <div class="pagination"></div>
            </div>
        </div>
        <br><br>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>

                <!-- Contenedor del video con recorte -->
                <div class="iframe-container">
                    <iframe id="videoFrame" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <!-- Contenido extra debajo del video -->
                <div class="modal-extra-content">
                    <p id="modal_titulo" style="font-size: 25px"></p>
                    <p id="md_views"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var modal = document.getElementById("myModal");
        var closeBtn = document.getElementsByClassName("close")[0];
        var videoFrame = document.getElementById("videoFrame");

        function playvideo(id_video, titulo, vista) {
            modal.style.display = "flex"; // Mostrar la modal
            videoFrame.src = "https://www.youtube.com/embed/" + id_video + "?si=bAtHCHmwT3C25Gry&autoplay=1&rel=0";
            document.getElementById("modal_titulo").innerText = titulo;
            document.getElementById("md_views").innerText = vista+' vistas';
        }

        // Cerrar modal al hacer clic en la 'X'
        closeBtn.onclick = function() {
            modal.style.display = "none";
            videoFrame.src = ""; // Detener el video al cerrar
        }

        // Cerrar modal si el usuario hace clic fuera del contenido
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                videoFrame.src = ""; // Detener el video al cerrar
            }
        }
    </script>
    <script src="assets/js/script.js"></script>
</body>
</html>
