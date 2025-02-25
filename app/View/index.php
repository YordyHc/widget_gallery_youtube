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
            width: 100%;  /
            height: 34vh; 
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            object-position: center; 
            transition: transform 0.4s ease; 
        }

        @media (max-width: 768px) {
            .header-container img {
                transform: scale(3.3); 
            }
        }

        @media (max-width: 480px) {
            .header-container img {
                transform: scale(1.7); 
            }
        }
        .profile {
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: -50px; 
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
            content: "▶\FE0E"; 
            color: white;
            font-size: 24px;
            font-family: Arial, sans-serif;
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
            left: 5px; 
        }

        .gallery-next {
            right: 5px; 
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
            height: 237px;
            position: relative;
            cursor: pointer;
        }

        .video-title {
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis; 
            width: 100%; 
            display: block; 
            font-size: 16px; 
            line-height: 1.2em; 
        }

        .video-info { font-size: 14px; color: gray; }
        .controls { margin-top: 20px; display: flex; justify-content: center; align-items: center; gap: 10px; }
        .nav-btn { background: white; border: 1px solid #ddd; padding: 10px; border-radius: 50%; cursor: pointer; }
        .pagination { margin-top: 20px; }
        .pagination button { margin: 5px; padding: 8px 12px; border: 1px solid #ddd; background: white; cursor: pointer; }
        .pagination .active { background: black; color: white; }
        .modal {
            display: none; 
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
            overflow: hidden;
        }
        
       
        .close {
            position: absolute;
            top: 69px; 
            right: 16px; 
            font-size: 20px;
            cursor: pointer;
            z-index: 100; 
            background: rgba(255, 255, 255, 0.555);
            padding: 10px 15px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .close:hover{
            background: #fff;
        }

        
        .iframe-container {
            width: 100%;
            height: 450px; 
            position: relative;
            overflow: hidden; 
        }
        
        
        .iframe-container iframe {
            position: absolute;
            top: 0%; 
            left: 0%; 
            width: 100%;
            height: 100%;
            border: none;
        }
        
        
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

                
                <div class="iframe-container">
                    <iframe id="videoFrame" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                
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
            modal.style.display = "flex"; 
            videoFrame.src = "https://www.youtube.com/embed/" + id_video + "?si=bAtHCHmwT3C25Gry&autoplay=1&rel=0";
            document.getElementById("modal_titulo").innerText = titulo;
            document.getElementById("md_views").innerText = vista+' vistas';
        }

        closeBtn.onclick = function() {
            modal.style.display = "none";
            videoFrame.src = ""; 
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                videoFrame.src = ""; 
            }
        }
    </script>
    <script src="assets/js/script.js"></script>
</body>
</html>
