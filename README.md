![swarm-logo](https://github.com/user-attachments/assets/708cf989-0c33-4129-8725-1b4e6f02442e)
<p>
    <strong>Exhibition website built on <a href="https://getkirby.com/">Kirby</a></strong><br />
    <strong>CSS powered by <a href="https://tailwindcss.com">Tailwind</a></strong><br />
</p>

Swarm is an exhibition website builder that allows Designers, Artists, and Visual Creators to showcase works online.\
Open-source and powered by Kirby 4. You can learn more about Kirby at [getkirby.com](https://getkirby.com)

<p>
  <a href="https://swarm-demo.danilvladimirov.co.uk/">
    <img src="https://img.shields.io/static/v1?label=&message=View%20Demo&style=for-the-badge&color=black" />
  </a>
</p>

# Features

Create a website for a group or solo exhibition, upload work, and share it with the world. Let participants register, create, and publish their projects independently (perfect for showcasing student work at end-of-year exhibitions) or manage everything yourself. Add exhibition details on the About page, include external links, and publish your site!

- Simple content management — Powered by [Kirby](https://getkirby.com), accessible at `yourwebsite.com/panel`
- Project page — Add project name, title, description, images, videos, and external links
- User registration — Allow (or disallow) participants to sign up and upload their work
- Customisable design — Set background and text colors, upload a favicon and OG image
- Project categories — Organise exhibition works with custom categories
- SEO management powered by [Kirby SEO](https://plugins.andkindness.com/seo)
- CSS powered by [Tailwind CSS](https://tailwindcss.com)

</br>

![swarm-preview](https://github.com/user-attachments/assets/27c297ed-d023-4013-afb0-ed479e31ac87)

# Installation

1. Download the zip archive with the clone of this repository, extract it to the web server you want to run it on.
2. Go to `/panel` and follow the installation instructions.
3. Upload and share your work!

### Requirements

- PHP 8.2 or higher
- A webserver
- Projects to share!

# Local configuration

Download the zip archive with the copy of this repository, and extract it to your local machine. The easiest way to run Kirby locally is to use PHP's built-in server with Kirby's router. Go to extracted folder in terminal and run this line:

```
php -S localhost:8000 kirby/router.php
```

Get more information at [Kirby website](https://getkirby.com/docs/guide/quickstart)

### Tailwind CSS

Make sure that you have Node.js installed on your machine. 

First, install Tailwind dependency:

```
npm install
```

Use `watch` to observe changes and generate a CSS file on every change:

```
npm run watch
```

Use `build` to generate a final minified CSS file:

```
npm run build
```

## License

Swarm is essentially a theme for Kirby 4 — built to make the most of Kirby’s flexibility. It follows the same licensing terms as Kirby 4, outlined in the [Kirby End User License Agreement](https://getkirby.com/license).
Kirby 4 is not free software. You can use it for evaluation, but to run it on a live site, you’ll need to purchase a license from [getkirby.com](https://getkirby.com).

Everything in this repository (apart from Kirby’s core code and Kirby SEO plugin) is open-source under the [MIT License](https://opensource.org/licenses/MIT).
That means you’re free to modify and share it, as long as you include the original license and copyright notice.

Kirby also offers free licenses for students and select educational projects. Learn more at [Kirby website](https://getkirby.com/buy).

## Credits

- [Kirby](https://getkirby.com) for the CMS
- [Tailwind CSS](https://tailwindcss.com) for the CSS framework
- [Kirby SEO](https://plugins.andkindness.com/seo) for SEO management plugin

Designed and developed by [@danil-vladimirov](https://github.com/danil-vladimirov)
