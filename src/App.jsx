import { useEffect, useState } from "react";
import ChannelHeader from "./components/ChannelHeader";
import VideoGallery from "./components/VideoGallery";
import "./index.css";

function App() {
  const [channel, setChannel] = useState(null);
  const [videos, setVideos] = useState([]);

  useEffect(() => {
    // Cargar datos del canal
    fetch("/data/channel.json")
      .then((res) => res.json())
      .then((data) => setChannel(data))
      .catch((err) => console.error("Error loading channel.json:", err));

    // Cargar datos de videos y estadísticas en paralelo
    Promise.all([
      fetch("/data/videos.json").then((res) => res.json()),
      fetch("/data/stats.json").then((res) => res.json()),
    ])
      .then(([videosData, statsData]) => {
        const videoInfo = videosData.items.map((video) => {
          const videoId = video.id.videoId;
          const stats = statsData.items.find((stat) => stat.id === videoId);

          return {
            videoId,
            thumbnail: video.snippet.thumbnails.high.url,
            title: video.snippet.title,
            fecha: video.snippet.publishedAt,
            description: video.snippet.description,
            views: stats?.statistics?.viewCount || "0",
            likes: stats?.statistics?.likeCount || "0",
            comments: stats?.statistics?.commentCount || "0",
          };
        });

        setVideos(videoInfo);
      })
      .catch((err) => console.error("Error loading videos or stats:", err));
  }, []);

  if (!channel || videos.length === 0) {
    return <p>Cargando...</p>;
  }

  return (
    <>
      <ChannelHeader channel={channel} />
      <VideoGallery videos={videos} />
    </>
  );
}

export default App;
