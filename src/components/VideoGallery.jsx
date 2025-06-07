import { useState } from "react";
import VideoCard from "./VideoCard";

function VideoGallery({ videos }) {
  const [currentPage, setCurrentPage] = useState(0);
  const [modalVideo, setModalVideo] = useState(null);

  const itemsPerPage = 3;
  const totalPages = Math.ceil(videos.length / itemsPerPage);

  const startIndex = currentPage * itemsPerPage;
  const currentVideos = videos.slice(startIndex, startIndex + itemsPerPage);

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
            className={`page-btn ${index === currentPage ? "active" : ""}`}
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
            <h2>{modalVideo.title}</h2>
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
            <p>{modalVideo.description}</p>
          </div>
        </div>
      )}
    </div>
  );
}

export default VideoGallery;
