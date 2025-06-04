function ChannelHeader({ channel }) {
  const channelData = channel.items?.[0];

  if (!channelData) return <div>Información del canal no disponible</div>;

  const bannerUrl = channelData.brandingSettings?.image?.bannerExternalUrl;
  const betterBanner =
    bannerUrl + "=w2560-fcrop64=1,00000000ffffffff-nd-c0xffffffff-rj-k-no";
  const logoUrl = channelData.snippet?.thumbnails?.medium?.url;
  const title = channelData.snippet?.title || "Sin título";
  const description = channelData.snippet?.description || "Sin descripción";
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
          <br />
          <br />
        </>
      )}

      <div className="profile">
        <br />
        <br />
        <br />
        <br />
        <br />
        {logoUrl && <img className="logo" src={logoUrl} alt="Logo del canal" />}
        <div>
          <br />
          <h2>
            <a href={`https://www.youtube.com/channel/${title}`}>{title}</a>
          </h2>
          <p className="stats">
            {Number(stats?.subscriberCount)} suscriptores • {stats?.videoCount}
            videos • {Number(stats?.viewCount)} vistas
          </p>
        </div>
        <a
          className="subscribe-btn btn-danger"
          href={`https://www.youtube.com/channel/${title}`}
        >
          Youtube 32M
        </a>
      </div>
    </div>
  );
}

export default ChannelHeader;
