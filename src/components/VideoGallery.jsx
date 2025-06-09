import { useState } from "react";
import VideoCard from "./VideoCard";

function VideoGallery({ videos, perfil }) {
  const [currentPage, setCurrentPage] = useState(0);
  const [modalVideo, setModalVideo] = useState(null);

  const itemsPerPage = 3;
  const totalPages = Math.ceil(videos.length / itemsPerPage);

  const startIndex = currentPage * itemsPerPage;
  const currentVideos = videos.slice(startIndex, startIndex + itemsPerPage);

  const channelData = perfil.items?.[0];
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

  return (
    <div className="gallery-container container-fluid">
      <button className="gallery-nav-btn gallery-prev" onClick={handlePrev}>
        ≪
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
        ≫
      </button>

      {/* PAGINACIÓN */}
      <div className="pagination">
        {Array.from({ length: totalPages }, (_, index) => (
          <button
            key={index}
            className={`paginat-btn ${index === currentPage ? "active" : ""}`}
            onClick={() => setCurrentPage(index)}
          >
            {index + 1}
          </button>
        ))}
      </div>

      {/* MODAL */}
      {modalVideo && (
        <div className="modal-overlay" onClick={() => setModalVideo(null)}>
          <div className="modal-content" onClick={(e) => e.stopPropagation()}>
            <button className="modal-close" onClick={() => setModalVideo(null)}>
              ×
            </button>
            <div className="video-iframe-container">
              <iframe
                width="100%"
                height="400"
                src={`https://www.youtube.com/embed/${modalVideo.videoId}?autoplay=1`}
                frameBorder="0"
                allow="autoplay; encrypted-media"
                allowFullScreen
                title={modalVideo.title}
              ></iframe>
            </div>
            <div className="modal-info">
              <h3 className="md_title">{modalVideo.title}</h3>
              <div className="md-stats">
                <p className="video-info">{modalVideo.views} vistas </p>
                <p className="video-info">{modalVideo.likes}</p>
              </div>
              <div className="profile">
                <a href={`https://www.youtube.com/channel/${title}`}>
                  {logoUrl && (
                    <img className="logo" src={logoUrl} alt="Logo del canal" />
                  )}
                </a>
                <div className="pf-data">
                  <br />
                  <h2>
                    <a href={`https://www.youtube.com/channel/${title}`}>
                      {title}
                    </a>
                  </h2>
                  <p className="video-description">{modalVideo.description}</p>
                </div>
                <a
                  className="subscribe-btn"
                  href={`https://www.youtube.com/channel/${title}`}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  Youtube {stats?.subscriberCount}
                </a>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}

export default VideoGallery;
