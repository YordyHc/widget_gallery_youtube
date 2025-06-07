function VideoCard({ video, onPlay }) {
  return (
    <div className="video">
      <div className="miniatura" onClick={onPlay}>
        <img
          src={video.thumbnail}
          className="thumbnail"
          alt={`Miniatura de ${video.title}`}
        />
        <button className="play-button" onClick={onPlay}></button>
        <span className="video-duration">{video.duration}</span>
      </div>
      <p className="video-title">
        <strong>{video.title}</strong>
      </p>
      <p className="video-info">{video.fecha}</p>
      <p className="video-description">{video.description}</p>
      <p className="video-info">
        {video.views} vistas • {video.likes} likes • {video.comments}{" "}
        comentarios
      </p>
    </div>
  );
}

export default VideoCard;
