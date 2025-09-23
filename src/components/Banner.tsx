import React from 'react';

interface BannerProps {
  title: string;
  titleSecondary?: string;
  subtitle?: string;
  image: string;
  link?: string;
  textColor?: string;
  isActive: boolean;
}

const Banner: React.FC<BannerProps> = ({
  title,
  titleSecondary,
  subtitle,
  image,
  link,
  textColor = '#8B4513',
  isActive
}) => {
  if (!isActive) return null;

  const bannerStyle = {
    color: textColor,
  };

  const BannerContent = () => (
    <div className="relative overflow-hidden rounded-lg shadow-lg">
      <img
        src={image}
        alt={title}
        className="w-full h-64 md:h-80 object-cover"
      />
      <div className="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <div className="text-center p-6" style={bannerStyle}>
          <h1 className="text-3xl md:text-5xl font-bold mb-2">
            {title}
          </h1>
          {titleSecondary && (
            <h2 className="text-xl md:text-3xl font-semibold mb-2 opacity-90">
              {titleSecondary}
            </h2>
          )}
          {subtitle && (
            <p className="text-lg md:text-xl opacity-80">
              {subtitle}
            </p>
          )}
        </div>
      </div>
    </div>
  );

  if (link) {
    return (
      <a href={link} className="block">
        <BannerContent />
      </a>
    );
  }

  return <BannerContent />;
};

export default Banner;
