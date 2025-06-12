function ChannelHeader({ channel }) {
  const channelData = channel.items?.[0];

  if (!channelData) return <div>Información del canal no disponible</div>;

  const idcanal = channelData.id;
  const bannerUrl = channelData.brandingSettings?.image?.bannerExternalUrl;
  const betterBanner =
    bannerUrl + "=w2560-fcrop64=1,00000000ffffffff-nd-c0xffffffff-rj-k-no";
  const logoUrl = channelData.snippet?.thumbnails?.medium?.url;
  const title = channelData.snippet?.title || "Sin título";
  //const description = channelData.snippet?.description || "Sin descripción";
  const stats = channelData.statistics;

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
            {redondeo(Number(stats?.subscriberCount))} suscriptores •{" "}
            {redondeo(stats?.videoCount)} videos •{" "}
            {redondeo(Number(stats?.viewCount))} vistas
          </p>
        </div>
        <a
          className="subscribe-btn"
          href={`https://www.youtube.com/channel/${idcanal}`}
          target="_blank"
          rel="noopener noreferrer"
        >
          <i className="fa-brands fa-youtube"></i>Youtube{" "}
          {redondeo(stats?.subscriberCount)}
        </a>
      </div>
    </div>
  );
}

export default ChannelHeader;

function redondeo(dato) {
  if (dato >= 10000000) {
    return (dato / 1000000).toFixed(1) + "M";
  } else if (dato >= 1000000) {
    return (dato / 1000000).toFixed(2) + "M";
  } else if (dato >= 1000) {
    return (dato / 1000).toFixed(1) + "K";
  } else {
    return dato.toString();
  }
}
