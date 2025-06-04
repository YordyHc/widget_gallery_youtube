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
        <img
          className="channel-banner"
          src={betterBanner}
          alt="Banner del canal"
          onError={(e) => {
            e.target.onerror = null;
            e.target.src = bannerUrl; // fallback a la versión sin filtros
          }}
        />
      )}

      {logoUrl && <img className="logo" src={logoUrl} alt="Logo del canal" />}
      <h1>{title}</h1>
      <p>{description}</p>
      <p>
        <strong>{Number(stats?.subscriberCount).toLocaleString()}</strong>{" "}
        suscriptores • <strong>{stats?.videoCount}</strong> videos •{" "}
        <strong>{Number(stats?.viewCount).toLocaleString()}</strong> vistas
      </p>
    </div>
  );
}

export default ChannelHeader;
