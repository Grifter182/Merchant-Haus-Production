import { ContentfulContentSource } from '@stackbit/cms-contentful';

import { defineStackbitConfig } from '@stackbit/types';

export default defineStackbitConfig({
    "stackbitVersion": "~0.6.0",
    "nodeVersion": "18",
    "ssgName": "custom",
    "contentSources": [
        new ContentfulContentSource({
            spaceId: process.env.CONTENTFUL_SPACE_ID as string,
            environment: process.env.CONTENTFUL_ENVIRONMENT || 'master',
            previewToken: process.env.CONTENTFUL_PREVIEW_TOKEN as string,
            accessToken: process.env.CONTENTFUL_MANAGEMENT_TOKEN as string
        }),
    ],
    "postInstallCommand": "npm i --no-save @stackbit/types @stackbit/cms-contentful"
})