function VideoCard({ video }) {
  return (
    <div className="video-card">
      <img src={video.thumbnail} alt={`Miniatura de ${video.title}`} />
      <div className="info">
        <div className="title">{video.title}</div>
        <div className="meta">
          {video.views.toLocaleString()} vistas • {video.duration}
        </div>
      </div>
    </div>
  );
}

export default VideoCard;
