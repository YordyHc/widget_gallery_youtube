import VideoCard from "./VideoCard";

function VideoGallery({ videos }) {
  return (
    <div className="video-gallery">
      {videos.map((video) => (
        <VideoCard key={video.videoId} video={video} />
      ))}
    </div>
  );
}

export default VideoGallery;
