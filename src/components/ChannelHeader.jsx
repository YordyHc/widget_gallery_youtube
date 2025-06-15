import { redondeo } from "../utils/formatUtils";
function ChannelHeader({ channel }) {
  if (!channel) return <div>Información del canal no disponible</div>;

  const idcanal = channel.idcanal;
  const betterBanner = channel.bannerImage;
  const logoUrl = channel.logoUrl;
  const title = channel.title;
  const subs = channel.subscriberCount;
  const views = channel.viewCount;
  const videoCount = channel.videoCount;

  return (
    <div className="channel-header">
      {betterBanner && (
        <>
          <img
            className="channel-banner"
            src={betterBanner}
            alt="Banner del canal"
            onError={(e) => {
              e.target.onerror = null;
              e.target.src = bannerUrl;
            }}
          />
        </>
      )}

      <div className="profile">
        <br />
        <br />
        <br />
        <br />
        <br />
        <a
          href={`https://www.youtube.com/channel/${idcanal}`}
          target="_blank"
          rel="noopener noreferrer"
        >
          {logoUrl && (
            <img className="logo" src={logoUrl} alt="Logo del canal" />
          )}
        </a>
        <div className="pf-data">
          <br />
          <h2>
            <a
              href={`https://www.youtube.com/channel/${idcanal}`}
              target="_blank"
              rel="noopener noreferrer"
            >
              {title}
            </a>
          </h2>
          <p className="stats">
            {redondeo(Number(subs))} suscriptores •{" "}
            {redondeo(Number(videoCount))} videos • {redondeo(Number(views))}{" "}
            vistas
          </p>
        </div>
        <a
          className="subscribe-btn"
          href={`https://www.youtube.com/channel/${idcanal}`}
          target="_blank"
          rel="noopener noreferrer"
        >
          <i className="fa-brands fa-youtube"></i>Youtube {redondeo(subs)}
        </a>
      </div>
    </div>
  );
}

export default ChannelHeader;
