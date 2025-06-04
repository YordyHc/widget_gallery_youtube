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
      .then((data) => setVideos(data))
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
