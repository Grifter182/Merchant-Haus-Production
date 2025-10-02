const path = require('path');
const { promises: fs } = require('fs');

const IMAGE_EXTENSIONS = new Set(['.png', '.jpg', '.jpeg', '.webp', '.gif', '.svg', '.avif']);

const DIRECTORY_MAP = {
  banner: {
    folder: path.join(process.cwd(), 'assets', 'img'),
    publicPath: 'assets/img'
  },
  integrations: {
    folder: path.join(process.cwd(), 'assets', 'integrations'),
    publicPath: 'assets/integrations'
  }
};

exports.handler = async (event) => {
  const type = (event.queryStringParameters && event.queryStringParameters.type) || '';
  const config = DIRECTORY_MAP[type];

  if (!config) {
    return {
      statusCode: 400,
      body: JSON.stringify({ error: 'Invalid asset type request.' })
    };
  }

  try {
    const entries = await fs.readdir(config.folder, { withFileTypes: true });
    const files = entries
      .filter((entry) => entry.isFile() && IMAGE_EXTENSIONS.has(path.extname(entry.name).toLowerCase()))
      .map((entry) => entry.name)
      .sort((a, b) => a.localeCompare(b, undefined, { numeric: true, sensitivity: 'base' }));

    return {
      statusCode: 200,
      headers: {
        'Content-Type': 'application/json',
        'Cache-Control': 'public, max-age=3600'
      },
      body: JSON.stringify({ files, basePath: config.publicPath })
    };
  } catch (error) {
    console.error('Failed to enumerate assets', error);
    return {
      statusCode: 500,
      body: JSON.stringify({ error: 'Unable to list assets at this time.' })
    };
  }
};
