# NAYO Website CMS

This is a simple, flat-file CMS for managing news and events on the NAYO website.

## Features

- **News Management**: Create, edit, and delete news articles
- **Markdown Support**: Write content using Markdown
- **Image Uploads**: Add featured images to your articles
- **Tags**: Categorize your content with tags
- **Clean URLs**: SEO-friendly URLs for all content

## Getting Started

1. **Login**
   - Access the admin panel at `/admin`
   - Default password: `nayo2025` (change this in `admin/includes/auth.php`)

2. **Create a New Article**
   - Click "Add New" in the News section
   - Fill in the title, excerpt, and content
   - Add a featured image (URL)
   - Set the publish date
   - Add tags (comma-separated)
   - Click "Save Article"

3. **Edit/Delete Articles**
   - Click the edit (pencil) icon to modify an article
   - Click the trash icon to delete an article
   - Use the eye icon to preview the article

## File Structure

```
admin/
├── includes/
│   └── auth.php          # Authentication logic
├── css/
│   └── admin.css        # Admin panel styles
├── js/
│   └── admin.js         # Admin panel scripts
├── index.php            # Admin dashboard
└── login.php            # Login page

content/
├── news/               # News articles (Markdown files)
└── events/             # Events (future use)

includes/
└── cms_functions.php   # CMS helper functions

news/
├── index.php          # News listing page
├── template.php        # Article template
└── router.php         # URL routing for news

uploads/               # For uploaded files (images, etc.)
```

## Security

- Change the default password in `admin/includes/auth.php`
- Keep the admin directory protected with .htaccess
- Regularly backup your content directory

## Customization

- **Styles**: Edit `admin/css/admin.css`
- **Templates**: Modify the template files in the `news/` directory
- **Functionality**: Extend `includes/cms_functions.php`

## Requirements

- PHP 7.4 or higher
- mod_rewrite enabled (for clean URLs)
- Write permissions on the `content/` and `uploads/` directories

## Support

For support, please contact the NAYO web development team.
