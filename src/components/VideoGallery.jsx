import { useState } from "react";
import VideoCard from "./VideoCard";

function VideoGallery({ videos }) {
  const [currentPage, setCurrentPage] = useState(0);
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
          <VideoCard key={video.videoId} video={video} />
        ))}
      </div>
      <button className="gallery-nav-btn gallery-next" onClick={handleNext}>
        ≫
      </button>
      <br />
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
      <br />
    </div>
  );
}

export default VideoGallery;
