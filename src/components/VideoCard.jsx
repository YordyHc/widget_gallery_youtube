function VideoCard({ video }) {
  return (
    <div className="video-card">
      <img src={video.thumbnail} alt={`Miniatura de ${video.title}`} />
      <button className="play-button">waa</button>
      <span className="video-duration">{video.duration}</span>
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
