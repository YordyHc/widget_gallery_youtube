import { useEffect, useState } from "react";
import ChannelHeader from "./components/ChannelHeader";
import VideoGallery from "./components/VideoGallery";
import "./index.css";

function App() {
  const [channel, setChannel] = useState(null);
  const [videos, setVideos] = useState([]);

  useEffect(() => {
    fetch("/data/channel.json")
      .then((res) => res.json())
      .then((data) => setChannel(data))
      .catch((err) => console.error("Error loading channel.json:", err));

    fetch("/data/videos.json")
      .then((res) => res.json())
      .then((data) => {
        const formattedVideos = data.items.map((item) => ({
          videoId: item.id.videoId,
          title: item.snippet.title,
          thumbnail: item.snippet.thumbnails.high.url,
          views: Math.floor(Math.random() * 1000000), // Simulado
          duration: "4:00", // Simulado
        }));

        setVideos(formattedVideos);
      })
      .catch((err) => console.error("Error loading videos.json:", err));
  }, []);

  if (!channel) return <p>Cargando...</p>;

  return (
    <>
      <ChannelHeader channel={channel} />
      <VideoGallery videos={videos} />
    </>
  );
}

export default App;
