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
  const [error, setError] = useState(null);

  const handle = appConfig.handle;
  const BACKEND_BASE_URL =
    "https://api-widget-youtube.onrender.com/api/youtube/youtube";

  useEffect(() => {
    if (!handle) return;

    fetch(`${BACKEND_BASE_URL}/channel-info/?forHandle=${handle}`)
      .then((res) => {
        if (!res.ok)
          throw new Error("No se pudo obtener la información del canal");
        return res.json();
      })
      .then((data) => {
        setChannel(data);
        if (data.idcanal) {
          setChannelId(data.idcanal);
        }
      })
      .catch((err) => {
        console.error("Error al cargar canal:", err);
        setError("❌ Error al cargar información del canal.");
      });
  }, []);

  useEffect(() => {
    if (!channelId) return;

    fetch(`${BACKEND_BASE_URL}/videos-info/?channelId=${channelId}`)
      .then((res) => {
        if (!res.ok) throw new Error("No se pudieron obtener los videos");
        return res.json();
      })
      .then((data) => {
        setVideos(data.videos);
      })
      .catch((err) => {
        console.error("Error al cargar videos:", err);
        setError("❌ Error al cargar los videos del canal.");
      });
  }, [channelId]);

  if (error) {
    return (
      <div className="container mt-5">
        <div className="alert alert-danger text-center" role="alert">
          {error}
        </div>
      </div>
    );
  }

  if (!channel || videos.length === 0) {
    return (
      <div className="d-flex justify-content-center align-items-center vh-100">
        <div className="text-center">
          <div className="spinner-border text-primary mb-3" role="status">
            <span className="visually-hidden">Cargando...</span>
          </div>
          <div className="fw-bold">Cargando contenido del canal...</div>
        </div>
      </div>
    );
  }

  return (
    <>
      <ChannelHeader channel={channel} />
      <VideoGallery videos={videos} perfil={channel} />
    </>
  );
}

export default App;
