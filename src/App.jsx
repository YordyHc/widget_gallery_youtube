import { useEffect, useState } from "react";
import ChannelHeader from "./components/ChannelHeader";
import VideoGallery from "./components/VideoGallery";
import "bootstrap/dist/css/bootstrap.min.css";
import "./index.css";
import "./assets/galeria.css";

function App() {
  const [channel, setChannel] = useState(null);
  const [videos, setVideos] = useState([]);

  const channelId = "UCCfPkh8osJPC2pPq283kKXg"; // ID del canal
  const BACKEND_BASE_URL = "http://localhost:8000/api/youtube/youtube";

  useEffect(() => {
    // Cargar datos del canal
    fetch(`${BACKEND_BASE_URL}/channel-info/?channelId=${channelId}`)
      .then((res) => res.json())
      .then((data) => setChannel(data))
      .catch((err) => console.error("Error al cargar canal:", err));
    fetch(
      `${BACKEND_BASE_URL}/videos-info/?channelId=${channelId}&maxResults=10`
    )
      .then((res) => res.json())
      .then((data) => setVideos(data.videos))
      .catch((err) => console.error("Error al cargar videos:", err));
  }, []);

  if (!channel || videos.length === 0) {
    return <p>Cargando...</p>;
  }

  return (
    <>
      <ChannelHeader channel={channel} />
      <VideoGallery videos={videos} perfil={channel} />
    </>
  );
}

export default App;
