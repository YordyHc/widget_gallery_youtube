import { useState } from "react";
import VideoCard from "./VideoCard";
import VideoModal from "./VideoModal";

function VideoGallery({ videos, perfil }) {
  const [currentPage, setCurrentPage] = useState(0);
  const [modalVideo, setModalVideo] = useState(null);

  const itemsPerPage = 3;
  const totalPages = Math.ceil(videos.length / itemsPerPage);

  const startIndex = currentPage * itemsPerPage;
  const currentVideos = videos.slice(startIndex, startIndex + itemsPerPage);

  const channelData = perfil.items?.[0];
  const idcanal = channelData.id;
  const logoUrl = channelData.snippet?.thumbnails?.medium?.url;
  const title = channelData.snippet?.title || "Sin título";
  //const description = channelData.snippet?.description || "Sin descripción";
  const stats = channelData.statistics;

  const handlePrev = () => {
    setCurrentPage((prev) => Math.max(prev - 1, 0));
  };

  const handleNext = () => {
    setCurrentPage((prev) => Math.min(prev + 1, totalPages - 1));
  };

  const paginacionBotones = Array.from({ length: totalPages }, (_, index) => (
    <button
      key={index}
      className={`paginat-btn ${index === currentPage ? "active" : ""}`}
      onClick={() => setCurrentPage(index)}
    >
      {index + 1}
    </button>
  ));

  return (
    <div className="gallery-container container-fluid">
      <button className="gallery-nav-btn gallery-prev" onClick={handlePrev}>
        <i className="fa-solid fa-angle-left"></i>
      </button>

      <div className="gallery">
        {currentVideos.map((video) => (
          <VideoCard
            key={video.videoId}
            video={video}
            onPlay={() => setModalVideo(video)}
          />
        ))}
      </div>

      <button className="gallery-nav-btn gallery-next" onClick={handleNext}>
        <i className="fa-solid fa-angle-right"></i>
      </button>

      {/* PAGINACIÓN */}
      <div className="pagination">{paginacionBotones}</div>

      {/* MODAL */}
      <VideoModal
        video={modalVideo}
        canal={{ id: idcanal, logoUrl, title, stats }}
        onClose={() => setModalVideo(null)}
      />
    </div>
  );
}

export default VideoGallery;
