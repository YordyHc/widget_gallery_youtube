import { useEffect, useState } from "react";
import ChannelHeader from "./components/ChannelHeader";
import VideoGallery from "./components/VideoGallery";
import appConfig from "./config/appConfig";
import "bootstrap/dist/css/bootstrap.min.css";
import "./index.css";
import "./assets/galeria.css";

function App() {
  const [channel, setChannel] = useState(null);
  const [videos, setVideos] = useState([]);

  const [channelId, setChannelId] = useState(null);
  const handle = appConfig.handle;
  const BACKEND_BASE_URL =
    "https://api-widget-youtube.onrender.com/api/youtube/youtube";

  useEffect(() => {
    if (!handle) return;

    fetch(`${BACKEND_BASE_URL}/channel-info/?forHandle=${handle}`)
      .then((res) => res.json())
      .then((data) => {
        setChannel(data);
        if (data.idcanal) {
          setChannelId(data.idcanal);
        }
      })
      .catch((err) => console.error("Error al cargar canal:", err));
  }, []);

  useEffect(() => {
    if (!channelId) return;

    fetch(`${BACKEND_BASE_URL}/videos-info/?channelId=${channelId}`)
      .then((res) => res.json())
      .then((data) => {
        setVideos(data.videos);
      })
      .catch((err) => console.error("Error al cargar videos:", err));
  }, [channelId]);

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
