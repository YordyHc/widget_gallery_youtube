import { redondeo, formatearFecha } from "../utils/formatUtils";

function VideoModal({ video, canal, onClose }) {
  if (!video) return null;
  const logoUrl = canal.logoUrl;
  return (
    <div className="modal-overlay" onClick={onClose}>
      <button className="modal-close" onClick={onClose}>
        <i className="fa-solid fa-xmark"></i>
      </button>
      <div className="modal-content" onClick={(e) => e.stopPropagation()}>
        <div className="video-iframe-container">
          <iframe
            width="100%"
            height="400"
            src={`https://www.youtube.com/embed/${video.id}?autoplay=1`}
            frameBorder="0"
            allow="autoplay; encrypted-media"
            allowFullScreen
            title={video.title}
          ></iframe>
        </div>
        <div className="modal-info">
          <h3 className="md_title">{video.title}</h3>
          <div className="md-stats">
            <p className="md-info">
              {redondeo(video.viewCount)} vistas{" "}
              <i className="fa-solid fa-eye"></i>
            </p>
            <p className="md-info likes">
              <i className="fa-solid fa-thumbs-up"></i>{" "}
              {redondeo(video.likeCount)}
            </p>
          </div>
          <div className="profile-md">
            <a
              href={`https://www.youtube.com/channel/${canal.idcanal}`}
              target="_blank"
              rel="noopener noreferrer"
            >
              {logoUrl && (
                <img className="logo" src={logoUrl} alt="Logo del canal" />
              )}
            </a>
            <div className="pf-data">
              <strong>
                <h6>
                  <a
                    href={`https://www.youtube.com/channel/${canal.idcanal}`}
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    {canal.title}
                  </a>
                </h6>
              </strong>
              <p className="md-info-fecha">
                publicado en {formatearFecha(video.publishedAt)}
              </p>
              <p className="md-description">{video.description}</p>
            </div>
            <a
              className="subscribe-btn"
              href={`https://www.youtube.com/channel/${canal.idcanal}`}
              target="_blank"
              rel="noopener noreferrer"
            >
              <i className="fa-brands fa-youtube"></i>Youtube{" "}
              {redondeo(canal.subscriberCount)}
            </a>
          </div>
        </div>
      </div>
    </div>
  );
}

export default VideoModal;
