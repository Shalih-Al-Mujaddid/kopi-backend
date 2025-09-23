import React, { useEffect, useState } from 'react';
import Banner from './Banner';

interface BannerData {
  id: number;
  title: string;
  title_secondary?: string;
  subtitle?: string;
  image: string;
  link?: string;
  text_color?: string;
  is_active: boolean;
}

const BannerList: React.FC = () => {
  const [banners, setBanners] = useState<BannerData[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    fetchBanners();
  }, []);

  const fetchBanners = async () => {
    try {
      const response = await fetch('/api/banners');
      if (!response.ok) {
        throw new Error('Failed to fetch banners');
      }
      const data = await response.json();
      setBanners(data.data);
    } catch (err) {
      setError(err instanceof Error ? err.message : 'An error occurred');
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return (
      <div className="flex justify-center items-center h-64">
        <div className="text-brown-600 text-lg">Loading banners...</div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="flex justify-center items-center h-64">
        <div className="text-red-600 text-lg">Error: {error}</div>
      </div>
    );
  }

  const activeBanners = banners.filter(banner => banner.is_active);

  if (activeBanners.length === 0) {
    return (
      <div className="flex justify-center items-center h-64">
        <div className="text-brown-600 text-lg">No active banners found</div>
      </div>
    );
  }

  return (
    <div className="space-y-8">
      <div className="text-center mb-8">
        <h2 className="text-3xl font-bold text-brown-700 mb-2">Our Banners</h2>
        <p className="text-brown-600">Discover our featured content with beautiful brown-themed styling</p>
      </div>

      <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        {activeBanners.map((banner) => (
          <Banner
            key={banner.id}
            title={banner.title}
            titleSecondary={banner.title_secondary}
            subtitle={banner.subtitle}
            image={banner.image}
            link={banner.link}
            textColor={banner.text_color}
            isActive={banner.is_active}
          />
        ))}
      </div>
    </div>
  );
};

export default BannerList;
